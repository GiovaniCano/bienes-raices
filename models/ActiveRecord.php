<?php declare(strict_types=1);
namespace Model;

use Intervention\Image\ImageManagerStatic as Image;
use PDO;

class ActiveRecord {
    protected static $db;

    protected static $table = '';
    protected static $columns = [];

    protected static $errors = [];

    protected static $filesImage = '';
    protected static $previousImage = '';
    protected static $allowedImageTypes = ['image/jpeg', 'image/webp'];
    protected static $maxImageSize = 1048576*2; //2mb
    
    public static function setDB(PDO $db): void {
        self::$db = $db;
    }

    public function getErrors(): array {
        return static::$errors;
    }
    
    /** Validate the image from the $_FILES array (errors, type and size), give it a name and save the image in memory in order to be saved with $this->save()
     * @param  array $image the $_FILES array from an input[Type="file"]
     */
    public function setImage(array $image): void {        
        if($image['tmp_name'] ?? false) { //image? (error produced in $this->validate() if the param requiredImages === true)
            if($image['error'] === 0) { //error?
                if(in_array($image['type'], self::$allowedImageTypes)) { //type?
                    if($image['size'] <= self::$maxImageSize) { //size?
                        /* Valid Image */
                        self::$filesImage = $image['tmp_name'];
                        $imageName = md5( uniqid( strval(rand()), true ) );
                        self::$previousImage = $this->imagen;
                        $this->imagen = $imageName . '.jpg';
                    } else {
                        static::$errors[] = 'La imagen debe pesar menos de 2mb';
                    }
                } else {
                    static::$errors[] = 'Tipo de archivo no válido';
                }
            } else {
                static::$errors[] = 'Hubo un error al cargar esta imagen';
            }
        }
    }

    private function saveImage(): void {
        $image = Image::make(self::$filesImage)->fit(800,600);

        $imagesDir = $_SERVER['DOCUMENT_ROOT'] . '/public/user-images/' . static::$table . '/';
        if(!is_dir($imagesDir)) {
            mkdir($imagesDir);
        }

        if(self::$previousImage) {
            unlink($imagesDir . self::$previousImage);
        }

        $image->save($imagesDir . $this->imagen);
    }

    public function save(): void {
        if($this->id) {
            $this->update();
        } else {
            $this->create();
        }
    }

    private function create(): void {
        $table = static::$table;
        $attributes = $this->arrayAttributes();
        $columns = join('`, `', array_keys($attributes));
        $values = array_values($attributes);

        $questionMarks = '';
        foreach($values as $n) {
            $questionMarks .= '?, ';
        }
        $questionMarks = substr($questionMarks, 0, -2);

        $query = "INSERT INTO `${table}` (`${columns}`) VALUES (${questionMarks});";
        $stmt = self::$db->prepare($query);
        $stmt->execute($values);

        $this->saveImage();

        headerLocationOneBefore([1]);
    }

    private function update(): void {
        $table = static::$table;
        $id = intval($this->id);

        self::protectDemoRows($table, $id); //

        $attributes = $this->arrayAttributes();
        $values = array_values($attributes);

        $sets = '';
        foreach($attributes as $key => $value) {
            $sets .= "`${key}` = ?, ";
        }
        $sets = substr($sets, 0, -2);

        $query = "UPDATE `${table}` SET ${sets} WHERE id = ?;";
        $stmt = self::$db->prepare($query);
        $stmt->execute([...$values, $id]);

        if(self::$filesImage) {
            $this->saveImage();
        }

        headerLocationOneBefore([2]);
    }

    public function delete() {
        // at this moment the id was validated by the delete controller method and by find method
        $table = static::$table;
        $id = intval($this->id);

        self::protectDemoRows($table, $id); //

        $query = "DELETE FROM `${table}` WHERE id = ?;";
        $stmt = self::$db->prepare($query);
        $stmt->execute([$id]);

        $imagesDir = $_SERVER['DOCUMENT_ROOT'] . '/public/user-images/' . static::$table . '/';
        unlink($imagesDir . $this->imagen);

        headerLocationOneBefore([3]);
    }

    public static function all(): array {
        $table = static::$table;
        $query = "SELECT * FROM `${table}`;";
        $stmt = self::$db->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $array = [];
        foreach($results as $result) {
            $array[] = new static($result);
        }

        return $array;
    }
    public static function get(int $limit): array {
        $table = static::$table;
        $query = "SELECT * FROM `${table}` LIMIT ${limit};";
        $stmt = self::$db->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $array = [];
        foreach($results as $result) {
            $array[] = new static($result);
        }

        return $array;
    }
    
    /**
     * @return static header to 1 location before if the rowCount === 0
     */
    public static function find(int $id): static {
        $table = static::$table;

        $query = "SELECT * FROM `${table}` WHERE id = ?;";
        $stmt = self::$db->prepare($query);
        $stmt->execute([$id]);

        if($stmt->rowCount() === 0) {
            headerLocationOneBefore();
        }

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return new static($result);
    }

    public function syncAttributes(array $args = []): void {
        foreach($args as $key => $value) {
            if($key === 'id') { continue; }
            $this->$key = trim($value);
        }
    }
    
    /** Make an associative array with the column's names of the table as $key and $this values as $value */
    private function arrayAttributes(): array {
        $attr = [];
        foreach(static::$columns as $column) {
            $attr[$column] = $this->$column;
        }
        return $attr;
    }

    
    /*** METHODS FOR DEMO PURPOSES ***/    
    private static $tablesNprotectedIds = [
        'blog' => [2,3,4,5,6],
        'propiedades' => [5,6,7,8,9,10],
        'vendedores' => [1,2,5,6]
    ];

    public static function resetDBsAfterTimeOfSiteInactivity(int $maxTime):void {
        $time = time();
        $lastTime = self::$db->query("SELECT `time` FROM `time` WHERE id = 1;")->fetch()[0];
        // debug(time() - $lastTime, false);
        if(time() - $lastTime > $maxTime) {
            /* reset and update time */
            self::resetDBs();
            self::$db->query("UPDATE `time` SET `time` = ${time};");
        } else {
            /* update time */
            self::$db->query("UPDATE `time` SET `time` = ${time};");
        }
    }
    private static function resetDBs(): void {

        foreach(self::$tablesNprotectedIds as $table => $ids) {
            $ids = join(', ', $ids);
            /* delete images */
            $query = "SELECT `imagen` FROM `${table}` WHERE id NOT IN(${ids});";
            try {
                $stmt = self::$db->query($query);
                if($stmt->rowCount() != 0) {
                    $results = $stmt->fetchAll(PDO::FETCH_NUM);
                    foreach($results as $propiedadImagen) {
                        $imagesDir = $_SERVER['DOCUMENT_ROOT'] . '/public/user-images/' . $table . '/';
                        unlink($imagesDir . $propiedadImagen[0]);
                    }
                }
            } catch (\Throwable $th) {
                // throw $th;
            }

            /* delete rows */
            $query = "DELETE FROM `${table}` WHERE id NOT IN(${ids});";
            try {
                self::$db->query($query);
            } catch (\Throwable $th) {
                // throw $th;
            }
        }
    }
    private static function protectDemoRows(string $table, int $id): void {
        if($_SESSION['user'] === 'Admin de Prueba'){
            if(in_array($id, self::$tablesNprotectedIds[$table])) {
                headerLocationOneBefore([4]);
            }
        }
    }
}
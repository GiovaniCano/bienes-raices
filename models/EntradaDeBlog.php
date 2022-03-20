<?php declare(strict_types=1);
namespace Model;

class EntradaDeBlog extends ActiveRecord {

    protected static $table = 'blog';
    protected static $columns = [
        'titulo',
        'imagen',
        'contenido',
        'fecha',
        'autorId'
    ];

    protected static $errors = [];

    public $id;
    public $titulo;
    public $imagen;
    public $contenido;
    public $fecha;
    public $autorId;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? '';
        $this->titulo = trim($args['titulo'] ?? '');
        $this->imagen = $args['imagen'] ?? '';
        $this->contenido = trim($args['contenido'] ?? '');
        $this->fecha = $args['fecha'] ?? '';
        $this->autorId = $args['autorId'] ?? '';
    }

    public function signBlogPost() {
        $this->fecha = date('Y-m-d');
        $this->autorId = $_SESSION['userId'];
    }

    public function validate(bool $imageRequired): array {

        if(strlen($this->titulo) > 75) { $this->titulo = ''; }
        
        if(strlen($this->contenido) < 50) { 
            self::$errors[] = 'El contenido de la entrada debe tener al menos 50 caracteres';
        }

        if(!$this->titulo || !$this->contenido) {
            self::$errors = errorCamposRequeridos(self::$errors);
        }

        if($imageRequired) {
            if(!$this->imagen) {
                self::$errors = errorCamposRequeridos(self::$errors);
            }
        }

        return self::$errors;
    }

    public function getAutor(int|string $autorId): string {
        return Admin::find(intval($autorId))->nombre;
    }
}
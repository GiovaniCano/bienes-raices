<?php declare(strict_types=1);
namespace Model;

use PDO;

class Admin extends ActiveRecord{

    protected static $table = 'admins';
    protected static $columns = [
        'nombre',
        'correo',
        'password'
    ];
    
    protected static $errors = [];

    public $id;
    public $nombre;
    public $email;
    public $password;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->email = trim($args['email'] ?? '');
        $this->password = $args['password'] ?? '';
    }

    public function validate(): array {

        $validEmail = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        if(!$validEmail) {
            self::$errors[] = 'Correo no válido';
        }

        if(!$this->email || !$this->password) {
            self::$errors = errorCamposRequeridos(self::$errors);
            if($this->email === false) {
                self::$errors[] = 'email is false';
            }
        } else {
            $query = "SELECT * FROM `admins` WHERE `email` = ?;";
            $stmt = self::$db->prepare($query);
            $stmt->execute([$this->email]);

            if($stmt->rowCount() === 0) {
                self::$errors[] = 'Email no registrado';
            } else {
                /* Email exists */
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $auth = password_verify($this->password, $result['password']);

                if($auth) {
                    /* map the data */
                    foreach($result as $key => $value) {
                        $this->$key = $value;
                    }
                } else {
                    self::$errors[] = 'Contraseña incorrecta';
                }
            }
        }

        return self::$errors;
    }

    public function auth(): void {
        session_start();
        $_SESSION['userId'] = $this->id;
        $_SESSION['user'] = $this->nombre;
        $_SESSION['login'] = true;
        $_SESSION['welcomed'] = false;
        header('location: /admin');
    }
    
}
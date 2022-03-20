<?php declare(strict_types=1);
namespace Model;

class Vendedor extends ActiveRecord {

    protected static $table = 'vendedores';
    protected static $columns = [
        'nombre',
        'apellido',
        'imagen',
        'telefono'
    ];

    protected static $errors = [];

    public $id;
    public $nombre;
    public $apellido;
    public $imagen;
    public $telefono;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? '';
        $this->nombre = trim($args['nombre'] ?? '');
        $this->apellido = trim($args['apellido'] ?? '');
        $this->imagen = $args['imagen'] ?? '';
        $this->telefono = trim($args['telefono'] ?? '');
    }

    public function validate(bool $imageRequired): array {

        if(strlen($this->telefono) > 18) { $this->telefono = ''; }
        if(strlen($this->nombre) > 45) { $this->nombre = ''; }
        if(strlen($this->apellido) > 45) { $this->apellido = ''; }

        $this->telefono = filter_var($this->telefono, FILTER_VALIDATE_INT);

        if(!$this->nombre || !$this->apellido || !$this->telefono) {
            self::$errors = errorCamposRequeridos(self::$errors);
        }

        if($imageRequired) {
            if(!$this->imagen) {
                self::$errors = errorCamposRequeridos(self::$errors);
            }
        }

        return self::$errors;
    }
}
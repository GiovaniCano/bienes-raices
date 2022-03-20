<?php declare(strict_types=1);
namespace Model;

class Propiedad extends ActiveRecord {

    protected static $table = 'propiedades';
    protected static $columns = [
        'titulo',
        'precio',
        'imagen',
        'descripcion',
        'habitaciones',
        'wc',
        'estacionamientos',
        'fecha',
        'vendedorId'
    ];

    protected static $errors = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamientos;
    public $fecha;
    public $vendedorId;

    public function __construct(array $args = []) {
        $this->id = $args['id'] ?? '';
        $this->titulo = trim($args['titulo'] ?? '');
        $this->precio = trim($args['precio'] ?? '');
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = trim($args['descripcion'] ?? '');
        $this->habitaciones = trim($args['habitaciones'] ?? '');
        $this->wc = trim($args['wc'] ?? '');
        $this->estacionamientos = trim($args['estacionamientos'] ?? '');
        $this->fecha = date('y-m-d');
        $this->vendedorId = trim($args['vendedorId'] ?? '');
    }

    public function validate(bool $imageRequired): array {

        if(strlen($this->titulo) > 75) { $this->titulo = ''; }
        if(strlen($this->precio) > 9) { $this->precio = ''; }
        if(strlen($this->habitaciones) > 2) { $this->habitaciones = ''; }
        if(strlen($this->wc) > 2) { $this->wc = ''; }
        if(strlen($this->estacionamientos) > 2) { $this->estacionamientos = ''; }
        if(strlen($this->vendedorId) > 4) { $this->vendedorId = ''; }

        $this->precio = filter_var($this->precio, FILTER_VALIDATE_INT);
        $this->habitaciones = filter_var($this->habitaciones, FILTER_VALIDATE_INT);
        $this->wc = filter_var($this->wc, FILTER_VALIDATE_INT);
        $this->estacionamientos = filter_var($this->estacionamientos, FILTER_VALIDATE_INT);
        $this->vendedorId = filter_var($this->vendedorId, FILTER_VALIDATE_INT);
        
        if(strlen($this->descripcion) < 50) { 
            self::$errors[] = 'La descripción debe tener al menos 50 caracteres';
        }

        if(!$this->titulo 
            || !$this->precio 
            || !$this->descripcion
            || !$this->habitaciones
            || !$this->wc
            || !$this->estacionamientos
            || !$this->vendedorId
        ) {
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
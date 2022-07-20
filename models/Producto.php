<?php 

namespace Model;

class Producto extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'precio', 'idcategoria'];

    public $id;
    public $nombre;
    public $precio;
    public $idcategoria;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->idcategoria = $args['idcategoria'] ?? '';

    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre del Servicio es Obligatorio';
        }
        if(!$this->precio) {
            self::$alertas['error'][] = 'El Precio del Servicio es Obligatorio';
        }
        if(!is_numeric($this->precio)) {
            self::$alertas['error'][] = 'El precio no es válido';
        }

        return self::$alertas;
    }
}
<?php

namespace Model;

class Venta extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'ventas';
    protected static $columnasDB = ['id', 'id_usuario', 'fecha'];

    public $id;
    public $id_usuario;
    public $total;
    public $fecha;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
    }
}
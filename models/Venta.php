<?php

namespace Model;

class Venta extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'ventas';
    protected static $columnasDB = ['id', 'dni_usuario', 'fecha'];

    public $id;
    public $dni_usuario;
    public $total;
    public $fecha;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_usuario = $args['dni'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
    }
}
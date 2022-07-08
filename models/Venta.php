<?php

namespace Model;

class Venta extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'ventas';
    protected static $columnasDB = ['id', 'id_usuario', 'total', 'fecha'];

    public $id;
    public $id_usuario;
    public $total;
    public $fecha;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_usuario = $args['usuarioId'] ?? '';
        $this->total = $args['total'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
    }
}
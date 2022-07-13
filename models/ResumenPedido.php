<?php

namespace Model;

class ResumenPedido extends ActiveRecord {
    protected static $tabla = 'carrito';
    protected static $columnasDB = ['ventaId', 'id_producto', 'cantidad', 'total', 'id_usuario', 'producto', 'nombre'];

    public $ventaId;
    public $id_producto;
    public $cantidad;
    public $total;
    public $id_usuario;
    public $producto;
    public $nombre;

    public function __construct()
    {
        $this->ventaId = $args['ventaId'] ?? null;
        $this->id_producto = $args['id_producto'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->total = $args['total'] ?? '';
        $this->id_usuario = $args['id_usuario'] ?? '';
        $this->producto = $args['producto'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
    }
}
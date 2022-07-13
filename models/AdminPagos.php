<?php

namespace Model;

class AdminPagos extends ActiveRecord {
    protected static $tabla = 'adminpagos';
    protected static $columnasDB = ['ventaId', 'cantidad', 'total', 'nombre', 'telefono', 'email'];

    public $ventaId;
    public $cantidad;
    public $total;
    public $nombre;
    public $telefono;
    public $email;

    public function __construct()
    {
        $this->ventaId = $args['ventaId'] ?? null;
        $this->cantidad = $args['cantidad'] ?? '';
        $this->total = $args['total'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
    }
}
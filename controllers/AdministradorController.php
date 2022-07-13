<?php

namespace Controllers;

use Model\AdminPagos;

use MVC\Router;

class AdministradorController
{

    public static function home(Router $router)
    {
        session_start();

        $arreglo = [];

        $consulta = "SELECT c.ventaId , sum(c.cantidad) as cantidad, SUM(c.total) as total, u.nombre, u.telefono, u.email ";
        $consulta .= "FROM ventas v ";
        $consulta .= "INNER JOIN carrito c ON v.id = c.ventaId ";
        $consulta .= "INNER JOIN usuarios u ON u.id = c.id_usuario ";
        $consulta .= "INNER JOIN productos p ON p.id = c.id_producto ";
        $consulta .= "group by c.ventaId ";

        $ventas = AdminPagos::SQL($consulta);

        //debuguear($ventas);

        $router->renderAdmin('home/index', [
            'ventas' => $ventas
        ]);
    }
}

<?php

namespace Controllers;

use Model\AdminPagos;
use Classes\Email;
use Model\Usuario;
use Model\DetalleVentaForId;
use Model\Producto;
use Model\Categorias;
use MVC\Router;

class ProductoController
{
    public static function viewProducto(Router $router)
    {
        session_start();
        isAuth();
        $arreglo = [];

        $consulta = "SELECT p.id, p.nombre, p.precio, c.nombre as categoria, c.descripcion ";
        $consulta .= "FROM productos p ";
        $consulta .= "INNER JOIN categorias c ON c.id = p.idcategoria ";
        $consulta .= "ORDER BY p.id desc ";

        $arreglo = Producto::SQL($consulta);

        $router->renderAdmin('home/viewProducto', [
            'arreglo' => $arreglo
        ]);
    }

    public static function editProducto(Router $router)
    {
        session_start();
        isAuth();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $producto = new Producto($_POST);
            $resultado = $producto->guardar();
            debuguear($resultado);
        }

        $id = $_GET['id'];
        $producto = Producto::where('id', $id);
        $categoria = Categorias::where('id', $producto->idcategoria);
        $categorias = Categorias::all();
        //debuguear($categoria);

        $router->renderAdmin('home/editProducto', [
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'categoria' => $categoria->nombre,
            'descripcion' => $categoria->descripcion,
            'categorias' => $categorias
        ]);
    }

    public static function addProducto(Router $router)
    {
        session_start();
        isAuth();

        $categorias = Categorias::all();
        //debuguear($categoria);

        $router->renderAdmin('home/addProducto', [
            'categorias' => $categorias
        ]);
    }
}

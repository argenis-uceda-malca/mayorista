<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;

class PageController{
    public static function inicio(Router $router) {
        session_start();
        
        /*$consulta= "SELECT * FROM  productos" ;
        $productos = Producto::SQL($consulta);*/
        $productos = Producto::all();

        $router->render('home/index', [
            'productos' => $productos
        ]);
    }

}

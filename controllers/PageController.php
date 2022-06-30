<?php 

namespace Controllers;

use MVC\Router;

class PageController{
    public static function inicio(Router $router) {
        $alertas = [];

        $router->render('home/index', [
            'alertas' => $alertas
        ]);
    }

}

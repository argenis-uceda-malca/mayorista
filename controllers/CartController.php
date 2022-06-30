<?php 

namespace Controllers;

use MVC\Router;

class CartController{
    public static function cart(Router $router) {
        $alertas = [];

        $router->render('home/cart/checkout', [
            'alertas' => $alertas
        ]);
    }
}

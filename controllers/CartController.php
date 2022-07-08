<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;

class CartController
{
  public static function cart(Router $router)
  {
    session_start();

    
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $consulta = "SELECT * FROM  productos WHERE id= $id";
      $productos = Producto::SQL($consulta);
  
      //Llenando la tabla de carrito de compras
      if (isset($_SESSION['carrito'])) {
        if (isset($_GET['id'])) {
          $arreglo = $_SESSION['carrito'];
          $encontro = false;
          $numero = 0;
          for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['id'] == $id) {
              $encontro = true;
              $numero = $i;
            }
          }
          if ($encontro == true) {
            //if($_SERVER['PHP_SELF'] != '/index.php/cart'){
            $arreglo[$numero]['cantidad'] = $arreglo[$numero]['cantidad'] + 1;
            $_SESSION['carrito'] = $arreglo;
            header('Location:/cart');
            //}
  
          } else {
            foreach ($productos as $key => $producto) {
              $nombre = $producto->nombre;
              $precio = $producto->precio;
            }
  
            $arregloNuevo = array(
              'id' => $_GET['id'],
              'nombre' => $nombre,
              'precio' => $precio,
              'cantidad' => 1
            );
            array_push($arreglo, $arregloNuevo);
            $_SESSION['carrito'] = $arreglo;
            header('Location:/cart');
          }
        }
      } else {
        if (isset($_GET['id'])) {
  
          foreach ($productos as $key => $producto) {
            $nombre = $producto->nombre;
            $precio = $producto->precio;
          }
  
          $arreglo[] = array(
            'id' => $_GET['id'],
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => 1
          );
          $_SESSION['carrito'] = $arreglo;
          header('Location:/cart');
        }
      }

      $router->render('home/cart/cart', [
        'productos' => $productos
      ]);
    }else{
      $productos = [];
      $router->render('home/cart/cart', [
        'productos' => $productos
      ]);
    }


    
  }

  public static function eliminarCarrito(Router $router)
  {
    session_start();
    $arreglo = $_SESSION['carrito'];
    
    for ($i = 0; $i < count($arreglo); $i++) {
      if ($arreglo[$i]['id'] != $_POST['id']) {
        $arregloNuevo[] = array(
          'id' => $arreglo[$i]['id'],
          'nombre' => $arreglo[$i]['nombre'],
          'precio' => $arreglo[$i]['precio'],
          'cantidad' => $arreglo[$i]['cantidad']
        );
      }
    }

    if (isset($arregloNuevo)) {
      $_SESSION['carrito'] = $arregloNuevo;
    } else {
      unset($_SESSION['carrito']);
    }
    //echo 'listo';
  }

  public static function actualizarCarrito(Router $router){
    session_start();
    $arreglo = $_SESSION['carrito'];
    for ($i = 0; $i < count($arreglo); $i++) {
      if ($arreglo[$i]['id'] == $_POST['id']) {
        $arreglo[$i]['cantidad']= $_POST['cantidad'];
        $_SESSION['carrito'] = $arreglo;
        break;
      }
    }
  }

  public static function checkout(Router $router){
    session_start();

    if(!isset($_SESSION['carrito'])){
      header('Location: /');
    }
    $arreglo = $_SESSION['carrito'];

    $productos = [];
      $router->render('home/cart/checkout', [
        'arreglo' => $arreglo
      ]);
  }
}

<?php

namespace Controllers;

use Model\AdminPagos;
use Classes\Email;
use Model\Usuario;
use Model\DetalleVentaForId;
use Model\Producto;
use Model\Categorias;
use MVC\Router;

class AdministradorController
{

    public static function home(Router $router)
    {
        session_start();
        isAuth();

        $arreglo = [];

        $consulta = "SELECT c.ventaId , sum(c.cantidad) as cantidad, SUM(c.total) as total, cli.nombres, cli.apellidos, cli.dni, cli.telefono, cli.email ";
        $consulta .= "FROM ventas v ";
        $consulta .= "INNER JOIN carrito c ON v.id = c.ventaId ";
        $consulta .= "INNER JOIN clientes cli ON cli.id = c.id_usuario ";
        $consulta .= "INNER JOIN productos p ON p.id = c.id_producto ";
        $consulta .= "group by c.ventaId ";
        $consulta .= "ORDER BY ventaId desc ";
        //debuguear($consulta);

        $ventas = AdminPagos::SQL($consulta);


        $router->renderAdmin('home/index', [
            'ventas' => $ventas
        ]);
    }

    public static function login(Router $router)
    {
        $alertas = [];

        session_start();
        isLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Usuario($_POST);

            if (empty($alertas)) {

                $usuario = Usuario::where('email', $auth->email);
                //debuguear($usuario);
                if ($usuario) {
                    // Verificar el password
                    if ($usuario->comprobarPasswordAndVerificado($auth->password)) {
                        // Autenticar el usuario
                        //session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        if ($usuario->admin === "1") {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                        }
                        $respuesta = array(
                            'resultado' => 'exito',
                            'usuario' => $usuario->nombre
                        );
                    } else {
                        $respuesta = array(
                            'resultado' => 'error'
                        );
                    }
                } else {
                    $respuesta = array(
                        'resultado' => 'error'
                    );
                }
            }
            die(json_encode($respuesta));
        }

        $router->renderAdmin('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /login');
    }

    public static function getInfo()
    {
        session_start();
        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //$auth = new DetalleVentaForId($_POST);
            $ventaId = $_POST['ventaId'];

            //debuguear($ventaId);
            //$detalle = $auth->getInfo($auth->ventaId);
            $consulta = "SELECT c.ventaId, p.nombre , cat.nombre as categoria, p.precio, c.cantidad, c.total ";
            $consulta .= "FROM ventas v ";
            $consulta .= "INNER JOIN carrito c ON v.id = c.ventaId ";
            $consulta .= "INNER JOIN productos p ON p.id = c.id_producto ";
            $consulta .= "INNER JOIN categorias cat ON cat.id = p.idcategoria ";
            $consulta .= "WHERE c.ventaId =  ${ventaId} ";

            $consulta2 = "SELECT c.ventaId , sum(c.cantidad) as cantidad, SUM(c.total) as total, cli.nombres, cli.apellidos, cli.dni, cli.telefono, cli.email ";
            $consulta2 .= "FROM ventas v ";
            $consulta2 .= "INNER JOIN carrito c ON v.id = c.ventaId ";
            $consulta2 .= "INNER JOIN clientes cli ON cli.id = c.id_usuario ";
            $consulta2 .= "INNER JOIN productos p ON p.id = c.id_producto ";
            $consulta2 .= "WHERE c.ventaId = ${ventaId} ";
            $consulta2 .= "group by c.ventaId ";

            $detalle = DetalleVentaForId::SQL($consulta);
            $ventas = AdminPagos::SQL($consulta2);

            if ($detalle) {
                $respuesta = array(
                    'detalle' => $detalle,
                    'ventas' => $ventas
                );
            }


            die(json_encode($respuesta));
        }
    }

    public static function report(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $inicio = $_POST['fechaInicio'];
            $fin = $_POST['fechaFin'];

            $consulta= "";

        }
    }

    
}

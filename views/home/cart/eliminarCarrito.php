<?php 

session_start();
$arreglo = $_SESSION['carrito'];

for ($i = 0; $i <count($arreglo); $i++){
    if($arreglo[$i]['id'] != $_POST['id']){
        $arregloNuevo[]= array(
            'id' => $arreglo[$i]['id'],
            'nombre' => $arreglo[$i]['nombre'],
            'precio' => $arreglo[$i]['precio'],
            'cantidad' => $arreglo[$i]['cantidad']
        );
    }
}

if (isset($arregloNuevo)){
    $_SESSION['carrito']= $arregloNuevo;
}else{
    unset($_SESSION['carrito']);
}
echo 'listo';

?>
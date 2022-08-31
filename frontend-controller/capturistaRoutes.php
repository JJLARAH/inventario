<?php

$ruta = count($data) <= 1 ? $ruta = "" : $ruta = $data[1];
switch ($ruta) {   
    case "productos":
        require_once("../../frontend-controller/productosRoute.php");
        break;
    default:
        require_once '../../view/static/clockMenu.php';
        break;
}   
?>
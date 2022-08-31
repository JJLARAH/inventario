<?php

use controller\controllerProductos;

$subruta = count($data)<=2?$ruta="":$ruta=$data[2];
switch ($subruta){
    case "index": controllerProductos::getInstancia()->index(); break;
	case "add": controllerProductos::getInstancia()->add(); break;
	case "save": controllerProductos::getInstancia()->save(); break;
	case "newUser": controllerProductos::getInstancia()->newUser(); break;
	default: controllerProductos::getInstancia()->index(); break;
}

?>
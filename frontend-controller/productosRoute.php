<?php

use controller\controllerProductos;

$subruta = count($data)<=2?$ruta="":$ruta=$data[2];
switch ($subruta){
	case "add": controllerProductos::getInstancia()->add(); break;
	case "save": controllerProductos::getInstancia()->save(); break;
	default: controllerProductos::getInstancia()->add(); break;
}

?>
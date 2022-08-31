<?php

use controller\controllerUsers;

$subruta = count($data)<=2?$ruta="":$ruta=$data[2];
switch ($subruta){
	case "add": controllerUsers::getInstancia()->add(); break;
	case "newUser": controllerUsers::getInstancia()->newUser(); break;
	default: controllerUsers::getInstancia()->add(); break;
}

?>
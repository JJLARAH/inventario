<?php

use controller\controllerUsers;

$subruta = count($data)<=2?$ruta="":$ruta=$data[2];
switch ($subruta){
    case "index": controllerUsers::getInstancia()->index(); break;
	case "add": controllerUsers::getInstancia()->add(); break;
	case "edit": controllerUsers::getInstancia()->edit(); break;
	case "delete": controllerUsers::getInstancia()->delete(); break;
	case "save": controllerUsers::getInstancia()->save(); break;
	case "newUser": controllerUsers::getInstancia()->newUser(); break;
	default: controllerUsers::getInstancia()->index(); break;
}

?>
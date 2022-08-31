<?php

use controller\controllerBandeja;

$subruta = count($data)<=2?$ruta="":$ruta=$data[2];
switch ($subruta){
    case "index": controllerBandeja::getInstancia()->index(); break;
	case "edit": controllerBandeja::getInstancia()->edit(); break;
	case "delete": controllerBandeja::getInstancia()->delete(); break;
	case "save": controllerBandeja::getInstancia()->save(); break;
	case "newUser": controllerBandeja::getInstancia()->newUser(); break;
	default: controllerBandeja::getInstancia()->index(); break;
}

?>
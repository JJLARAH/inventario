<?php

/*Importamos las librerias o clases del composer*/
require_once  "vendor/autoload.php";

/*Importar las entidades*/
require_once  "model/persistence/entities/usuario.php";
require_once  "model/persistence/entities/bandeja.php";
require_once  "model/persistence/entities/productos.php";


/* Importamos  los controladores*/
require_once  "controller/controllerBandeja.php";
require_once  "controller/controllerRegistro.php";
require_once  "controller/controllerManuals.php";

/* Especificamos el nombre de espacio al que pertenece la clase Manager*/
use \Illuminate\Database\Capsule\Manager;

/* Creamos una instancia del manager y la configuramos */
$manager = new Manager();
	/* Definimos la conexión, es necesario respetar el nombre de los 5 parametros */
	$manager->addConnection([
		"driver" => "mysql",
		"host" => "127.0.0.1",
		"database" => "inventario",
		"username" => "root",
		"password" => ''
	]);
	
	/* La colocamos como global */
	$manager->setAsGlobal();

	/*La arrancamos o inicializamos */
	$manager->bootEloquent();

?>
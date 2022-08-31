<?php

class Connection{ /*Creación de la instancia Connection*/

	/* Se define la conexión, es necesario respetar el nombre de los 5 parametros */
	static private $driver = "mysql";
	static private $host = "127.0.0.1";
	static private $database = "inventario";

	static private $username = "root";
	static private $password = '';
	static private $connection = null;

	static public function getConnection(){
		try{
			if(self::$connection == null){
				$dsn = self::$driver.":host=".self::$host.";database=".self::$database;
				self::$connection = new PDO($dsn,self::$username,self::$password);
				print_r("Connection.php dice: Conexión exitosa");
			}
			return self::$connection;
		}catch(PDOException $ex){
			print_r('Falla en la conexión: ' . $ex->getMessage());
		}
	}
}

?>
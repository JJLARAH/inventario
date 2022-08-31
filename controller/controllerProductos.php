<?php

/* Declaramos el contenedor */
namespace Controller;

/* Uso de la entidad */
use \persistence\entities\productos;

/**
 * 
 * Clase controlador productos que embebe las
 * acciones realizadas en el módulo de registro de productos.
 * 
 * Retorna la instancia al controlador.
 * 
 * @author Johany Lara.
 * 
 */
class controllerProductos
{
	/* Declaramos la instancia */
	private static $instancia = null;
	public static function getInstancia()
	{
		if (self::$instancia == null) {
			self::$instancia = new controllerProductos();
		}
		return self::$instancia;
	}

	private function __construct()
	{
	}

	/**
	 * Función que permite redirigir al formulario
	 * para añadir un producto al sistema.
	 * 
	 * Retorna una alerta de confirmación.
	 * 
	 * @author Johany Lara
	 */
	public function add()
	{
		if ($_SESSION['perfil'] == 1) {
			require_once '../../view/capturista/registroProductos/addProductos.php';
		} else {
		?>
			<script type="text/javascript">
				window.location.href = '.?/';
				alert("ERROR!. NO ERES CAPTURISTA");
			</script>
		<?php
		}
	}

	/**
	 * Función que permite guardar los datos de un producto
	 * ya sea nuevo o editado.
	 * 
	 * Retorna una alerta de confirmación.
	 * 
	 * @author Johany Lara
	 */
	public function save()
	{
		if ($_SESSION['perfil'] == 1) { //Comparamos el tipo de usuario
			if (empty($_POST)) {
				header("Location:./?/productos");
			}

			//Obtenemos los datos del formulario
			$producto = $_POST["id_producto"] == 0 ? new productos() : productos::find($_POST["id_producto"]);
			$producto->nombre = $_POST["nombre"];
			$producto->descripcion = $_POST["descripcion"];
			$producto->id_categoria = $_POST["id_categoria"];
			$producto->id_sucursal = $_POST["id_sucursal"];
			$producto->precio = $_POST["precio"];
			$producto->fecha_compra = $_POST["fecha_compra"];
			$producto->save(); //Guardamos
		?>
			<script type="text/javascript">
				window.location.href = './?/productos';
				alert("EXITO!. PRODUCTO REGISTRADO");
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				window.location.href = '.?/';
				alert("ERROR!. NO ERES CAPTURISTA");
			</script>
			<?php
		}
	}
}

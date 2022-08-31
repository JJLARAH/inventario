<?php

/* Declaramos el contenedor */
namespace Controller;

/* Uso de la entidad */
use persistence\entities\productos;

/**
 * 
 * Clase controlador usuarios que embebe las
 * acciones realizadas en el módulo de bandeja.
 * 
 * Retorna la instancia al controlador.
 * 
 * @author Johany Lara.
 * 
 */
class controllerBandeja
{
	/* Declaramos la instancia */
	private static $instancia = null;
	public static function getInstancia()
	{
		if (self::$instancia == null) {
			self::$instancia = new controllerBandeja();
		}
		return self::$instancia;
	}

	private function __construct()
	{
	}

	/**
	 * Función que permite redirigir al INDEX
	 * y realiza la consulta para enlistar
	 * los productos registrados en el sistema.
	 * 
	 * Retorna una alerta de confirmación.
	 * 
	 * @author Johany Lara
	 */
	public function index()
	{
		if ($_SESSION['perfil'] == 2) {
			/* Sentencia para mostrar tablas */
			$lista = productos::join('categoria', 'categoria.id_categoria', '=', 'productos.id_categoria')
				->join(
					'sucursal', 'sucursal.id_sucursal', '=', 'productos.id_sucursal'
				)
				->select(
					'productos.id_producto',
					'productos.nombre',
					'categoria.categoria',
					'sucursal.sucursal'
				)
				->get();
			require_once '../../view/administrador/bandeja/indexProductos.php';
		} else {
			/* Alerta en caso de no ser administrador */
			?>
			<script type="text/javascript">
				window.location.href = '.?/';
				alert("ERROR!. NO ERES ADMINISTRADOR");
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
		if ($_SESSION['perfil'] == 2) { //Comparamos el tipo de usuario
			if (empty($_POST)) {
				header("Location:./?/bandeja");
			}

			//Obtenemos los datos del formulario
			$producto = $_POST["id_producto"] == 0 ? new productos() : productos::find($_POST["id_producto"]);
			$producto->nombre = $_POST["nombre"];
			$producto->descripcion = $_POST["descripcion"];
			$producto->id_categoria = $_POST["id_categoria"];
			$producto->id_sucursal = $_POST["id_sucursal"];
			$producto->precio = $_POST["precio"];
			$producto->fecha_compra = $_POST["fecha_compra"];
			$producto->estado = $_POST["estado"];
			$producto->comentarios = $_POST["comentarios"];
			$producto->save(); //Guardamos
		?>
			<script type="text/javascript">
				window.location.href = './?/bandeja';
				alert("EXITO!. PRODUCTO GUARDADO");
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

	/**
	 * Función que permite redirigir al formulario
	 * para editar un producto registrado.
	 * 
	 * Retorna una alerta de confirmación.
	 * 
	 * @author Johany Lara
	 */
	public function edit()
	{
		if ($_SESSION['perfil'] == 2) {
			if (empty($_POST)) {
				header("Location:./?/bandeja");
			}
			$obj = productos::join('categoria', 'categoria.id_categoria', '=', 'productos.id_categoria'
			)
			->join(
				'sucursal', 'sucursal.id_sucursal', '=', 'productos.id_sucursal'
			)
			->find($_POST["id_producto"]);
			require "../../view/administrador/bandeja/editProducto.php";
		} else {
			?>
			<script type="text/javascript">
				window.location.href = '.?/';
				alert("ERROR!. NO ERES ADMINISTRADOR");
			</script>
			<?php
		}
	}

	/**
	 * Función que permite eliminar un producto
	 * que se encuentre registrado en el sistema.
	 * 
	 * Retorna una alerta de confirmación.
	 * 
	 * @author Johany Lara
	 */
	public function delete() //Eliminar producto
	{
		if ($_SESSION['perfil'] == 2) { //Evaluamos el tipo de usuario
			if (empty($_POST)) {
				header("Location:./?/bandeja");
			}
			
			$id_producto = $_POST["id_producto"]; // Obtenemos el Id del producto desde el botón
			$producto = productos::find($id_producto); //Buscamos el producto y lo almacenamos
			$producto->delete(); //Eliminamos
			
			?>
			<script type="text/javascript">
				window.location.href = './?/bandeja';
				alert("EXITO!. PRODUCTO ELIMINADO");
			</script>
			<?php
			//ob_end_flush();
		} else {
			?>
			<script type="text/javascript">
				window.location.href = '.?/';
				alert("ERROR!. NO ERES ADMINISTRADOR");
			</script>
			<?php
		}
	}
}

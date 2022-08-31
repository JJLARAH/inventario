<?php

header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Mexico_City');

session_start();

function validate_session()
{
	if (!isset($_SESSION['usuario'])) {
		?>
		<script type="text/javascript">
			window.location.href = '/inventario/index.php';
			alert("Error! Acceso restringido. Esta acción sera registrada.");
		</script>
		<?php
	}
}

function capturista_session()
{
	if (isset($_SESSION['usuario'])) {
		if ($_SESSION['perfil'] == 2) { //Si el usuario es administrador se le redije a la vista de administrador
		?>
			<script type="text/javascript">
				window.location.href = '/inventario/view/administrador/index.php';
				alert("Error! No tienes esos privilegios.");
			</script>
		<?php
		} else {
		}
	} else {
		?>
		<script type="text/javascript">
			window.location.href = '/inventario/index.php';
			alert("Error! Inicia sesión para acceder.");
		</script>
		<?php
		exit;
	}
}

function administrador_session()
{
	if (isset($_SESSION['usuario'])) {
		if ($_SESSION['perfil'] == 1) { //Si el usuario es capturista se le redirije a la vista de capturista
		?>
			<script type="text/javascript">
				window.location.href = '/inventario/view/capturista/index.php';
				alert("Error! No tienes esos privilegios.");
			</script>
		<?php
		} else {
		}
	} else {
		?>
		<script type="text/javascript">
			window.location.href = '/inventario/index.php';
			alert("Error! Inicia sesión para acceder.");
		</script>
	<?php
		exit;
	}
}

// Máxima duración de sesión activa en minutos
define('MAX_SESSION_TIEMPO', 60 * 10); // 60seg * 10minutos = 600 segundos. (10 minutos) 

// Controla cuando se ha creado y cuando tiempo ha recorrido 
if (
	isset($_SESSION['ULTIMA_ACTIVIDAD']) &&
	(time() - $_SESSION['ULTIMA_ACTIVIDAD'] > MAX_SESSION_TIEMPO)
) {

	// Si ha pasado el tiempo sobre el limite destruye la session
	destruir_session();
}

$_SESSION['ULTIMA_ACTIVIDAD'] = time();

// Función para destruir y resetear los parámetros de sesión
function destruir_session()
{
	$_SESSION = array();
	if (ini_get('session.use_cookies')) {
		$params = session_get_cookie_params();
		setcookie(
			session_name(),
			'',
			time() - MAX_SESSION_TIEMPO,
			$params['path'],
			$params['domain'],
			$params['secure'],
			$params['httponly']
		);
	}
	?>
	<script type="text/javascript">
		window.location.href = '/inventario/index.php';
	</script>
<?php
	@session_destroy();
}

function cerrar_usuario()
{
	$_SESSION = array();
	if (ini_get('session.use_cookies')) {
		$params = session_get_cookie_params();
		setcookie(
			session_name(),
			'',
			time() - MAX_SESSION_TIEMPO,
			$params['path'],
			$params['domain'],
			$params['secure'],
			$params['httponly']
		);
	}
?>
	<script type="text/javascript">
		window.location.href = '/inventario/index.php';
		alert("ERROR, NO TIENES ESOS PRIVILEGIOS!");
	</script>
<?php
	@session_destroy();
}

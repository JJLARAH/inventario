<?php
/*---------------------------------------------------------------------------------------------------------*/
/*<><><> INDEX DE ADMINISTRADOR <><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>*/
/*--------------------------------------------------------------------------------------------------------*/

//Importamos fichero global donde se almacenan los datos de la sesión.
require_once 'C:/xampp/htdocs/inventario/model/persistence/session.php';

administrador_session();

/* Importación del Loader y Connection. */
require_once 'C:/xampp/htdocs/inventario/loader.php';
require_once 'C:/xampp/htdocs/inventario/model/persistence/Connection.php';

/* Explode para el enrutamiento de la URL */
$data = explode("/", str_replace("/inventario/view/administrador/", "", $_SERVER["REQUEST_URI"]));

//Imprimir ruta del sitio.
$ruta = count($data) <= 1 ? $ruta = "" : $ruta = $data[1];
$rutaDos = count($data) <= 2 ? $rutaDos = "" : $rutaDos = $data[2];

/* print_r('AAAAAA            Ruta actual: ' . $ruta .'/'. $rutaDos); */
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Inventario :: Administrador</title> <!-- Titulo de la página -->

	<!--  Meta tags requeridas -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="../resources/css/menuStyle.css">

	<!-- Favicon -->
	<link rel="shortcut icon" href="../../view/resources/img/favicon/favicon_32x32.png">

	<!--Boxicon / Iconos del sistema-->
	<link rel="stylesheet" href="../../libraries/boxicons/css/boxicons.min.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../libraries/bootstrap/dist/css/bootstrap.min.css" />

	<!-- Datatables CSS -->
	<link rel="stylesheet" type="text/css" href="../../libraries/DataTables/DataTables-1.11.5/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="../../libraries/DataTables/Responsive-2.3.0/css/responsive.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="../../libraries/DataTables/FixedHeader-3.2.3/css/fixedHeader.dataTables.min.css" />
</head>

<body>

	<div class="sidebar close">
		<!-- Inicia barra de navegación lateral -->
		<div class="logo-details">
			<!-- Logo y nombre del sistema -->
			<i>
				<img src="../resources/img/logos/barcode-regular-132.png" alt="logoImg">
			</i>
			<span class="logo_name">Inventario</span>
		</div>

		<ul class="nav-links">
			<!-- Links de la barra de navegación -->

			<li>
				<!-- Opción Inicio -->
				<a href="./">
					<i class='bx bxs-home'></i>
					<span class="link_name">Inicio</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="./">Inicio</a></li>
				</ul>
			</li>

			<li>
				<!-- Opción Bandeja -->
				<!-- <div class="iocn-link"> -->
				<a href="./?/bandeja">
					<i class='bx bxs-receipt'></i>
					<span class="link_name">Bandeja</span>
				</a>
				<!-- <i class='bx bxs-chevron-down arrow'></i>
				</div> -->
				<ul class="sub-menu blank">
					<li><a class="link_name" href="./?/bandeja">Bandeja</a></li>
					<!-- <li><a href="./?/#/#">#</a></li> -->
					<!-- <li><a href="./?/#/#">#</a></li> -->
				</ul>
			</li>
		</ul>

		<!-- Detalles del usuario -->
		<div class="profile-details">
			<div class="container">
				<div class="row">
					<div class="col-3 g-0">
						<img src="../resources/img/profile/User.png" alt="profileImg">
					</div>
					<div class="col-7 g-0">
						<div class="name-job">
							<span class="profile_name"><?php echo '' . $_SESSION['nombre']; ?></span>
							<span class="job">Administrador</span>
						</div>
					</div>
					<div class="col-2 g-0">
						<div class="log-out">
							<a href="../../model/persistence/Logout.php">
								<i class='bx bxs-log-out'></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Termina barra de navegación lateral -->

	<section class="home-section">
		<nav>
			<!-- Inicia cuerpo derecho de la página -->
			<div class="sidebar-button">
				<i class='bx bx-menu sidebarBtn'></i>
				<span class="text">
					<?php
					//Texto para barra de navegación superior
					//Si se agrega otra sección, agregar otro texto
					if ($ruta == '') {
					?> <span class="text">¡Bienvenid@, <?php echo '' . $_SESSION['nombre']; ?>!</span>
					<?php } else if ($ruta == 'bandeja') {
					?> <span class="text">Bandeja</span>
					<?php } ?>
				</span>
			</div>
		</nav>
		<div class="home-content" id="content">
			<?php
			require_once("../../frontend-controller/administradorRoutes.php");
			?>
		</div>
	</section> <!-- Termina cuerpo derecho de la página -->

	<?php include '../../model/scripts/sources.php'; ?>
	<script type="text/javascript" src="../../model/scripts/scripts.js"></script>
</body>

</html>
<!--/*---------------------------------------------------------------------------------------------------------*/
/*<><><> INDEX DE REGISTRO <><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>*/
/*--------------------------------------------------------------------------------------------------------*/-->
<?php
/* Importación del Loader y Connection. */
require_once 'C:/xampp/htdocs/inventario/loader.php';
require_once 'C:/xampp/htdocs/inventario/model/persistence/Connection.php';

/* Explode para el enrutamiento de la URL */
$data = explode("/", str_replace("/inventario/view/registroUsuarios/", "", $_SERVER["REQUEST_URI"]));

//Imprimir ruta del sitio.
$ruta = count($data) <= 0 ? $ruta = "" : $ruta = $data[0];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD :: Inventario</title>
    <link rel="stylesheet" href="../../view/resources/css/login.css">
    <link rel="shortcut icon" href="../../view/resources/img/favicon/favicon_32x32.png">
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <!--Logos del sistema-->
            <?PHP print_r('Ruta actual: ' . $ruta); ?>
            <img class="loginLogo" src="../../view/resources/img/logos/barcode-regular-132.png" alt="logoImg">
        </div>
        <div class="title-register">
            <div class="sub_title">Registro de usuarios</div>
        </div>
        <!-- Formulario de inicio de sesión -->
        <form action="./?/newUser" method="post">
            <div class="field">
                <input type="hidden" name="id_usuario" id="id_usuario" value="0">
                <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario" class="form-control" required autocomplete="new-user">
            </div>
            <div class="field">
                <input type="password" name="contraseña" id="contraseña" placeholder="Ingresa tu contraseña" class="form-control" required autocomplete="new-password">
            </div>
            <input type="hidden" name="perfil" id="perfil" value="1"><!-- 1 - Capturista / 2 - Administrador -->
            <div class="field">
                <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" class="form-control" required>
            </div>
            <div class="field">
                <input type="tex" name="apellido_paterno" id="apellido_paterno" placeholder="Ingresa tu apellido paterno" class="form-control" required>
            </div>
            <div class="field">
                <input type="tex" name="apellido_materno" id="apellido_materno" placeholder="Ingresa tu apellido materno" class="form-control" required>
            </div>
            <input type="hidden" name="accesso" id="acceso" value="1"><!-- 1 - Acceso / 2 - Sin acceso -->
            <div class="field">
                <input type="submit" value="Registrar" name="Registrar">
            </div>
            <div class="signup-link">
                <p>
                    <a href="../../index.php">INICIAR SESIÓN</a>
                </p>
                <br>
            </div>
        </form>
        <?php require_once("../../frontend-controller/registroRoutes.php"); ?>
    </div>
</body>
</html>
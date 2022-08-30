<?php

/* Importamos los datos de la conexión */
require('Connection.php');

/* Iniciamos la sesión */
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style type="text/css">
    html,
    body {
        background-color: black;
    }
</style>

<body>
</body>

</html>

<?php
/* Establecemos la conexión */
$db = new Connection();
$con = $db->getConnection();
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $user = $_POST['usuario'];
    $pass = $_POST['contraseña'];
    /* Preparamos la consulta. PDO no soporta variables con caracteres no ASCII */
    $query = $con->prepare('SELECT * FROM inventario.usuarios WHERE BINARY usuario = :user AND BINARY contraseña = :pass');
    /* Asociamos los valores a los entregados en el formulario */
    $query->bindParam(':user', $user, \PDO::PARAM_STR);
    $query->bindParam(':pass', $pass, \PDO::PARAM_STR);
    /* Ejecutamos la consulta */
    $query->execute();
    $count = $query->rowCount();

    /* Obtenemos el primer registro (si existe) */
    $fila = $query->fetch(PDO::FETCH_ASSOC);
    $db = null;
    /* Si no se reciben resultados es porque no existe el usuario con la contraseña proporcionada */
} catch (PDOException $ex) {
    echo 'Falla en la conexión: ' . $ex->getMessage();
}

if ($fila['perfil'] == 1) { //Validamos los Tipos de Cuenta del Usuario
    $_SESSION['usuario'] = $user;
    $_SESSION['perfil'] = $fila['perfil'];
    $_SESSION['user_id'] = $fila['id_usuario'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['acceso'] = $fila['acceso'];
?>
    <script type="text/javascript">
        window.location.href = '/inventario/view/capturista/index.php';
        alert("BIENVENIDO AL SISTEMA, <?php echo $_SESSION['nombre']; ?>");
    </script>
<?php
} else if ($fila['perfil'] == 2) {
    $_SESSION['usuario'] = $user;
    $_SESSION['perfil'] = $fila['perfil'];
    $_SESSION['user_id'] = $fila['id_usuario'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['acceso'] = $fila['acceso'];
?>
    <script type="text/javascript">
        window.location.href = '/inventario/view/administrador/index.php';
        alert("BIENVENIDO AL SISTEMA, <?php echo $_SESSION['nombre']; ?>");
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        window.location.href = '/inventario/index.php';
        alert("ERROR!. REVISA QUE TUS DATOS ESTEN CORRECTOS");
    </script>
<?php
}

?>
<?php

require('Connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    $id_usuario = $_POST['id_usuario'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contraseña'];
    $perfil = '1'; //1 = CAPTURISTA / 2 = ADMINISTRADOR
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $acceso = '1'; //1= ACCESO / 0 = SIN ACCESO
    /* Preparamos la consulta. PDO no soporta variables con caracteres no ASCII */
    $query = $con->prepare('INSERT INTO inventario.usuarios (id_usuario,usuario,contraseña,perfil,nombre,apellido_paterno,apellido_materno,acceso) VALUES (:id_usuario,:usuario,:contrasenia,:perfil,:nombre,:apellido_paterno,:apellido_materno,:acceso)');
    /* Asociamos los valores a los entregados en el formulario */
    $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $query->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $query->bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);
    $query->bindParam(':perfil', $perfil, PDO::PARAM_INT);
    $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $query->bindParam(':apellido_paterno', $apellido_paterno, PDO::PARAM_STR);
    $query->bindParam(':apellido_materno', $apellido_materno, PDO::PARAM_STR);
    $query->bindParam(':acceso', $acceso, \PDO::PARAM_INT);
    /* Ejecutamos la consulta */
    $query->execute();
    $count = $query->rowCount();

    /* Obtenemos el primer registro (si existe) */
    $fila = $query->fetch(PDO::FETCH_ASSOC);
    $db = null;

    ?>
        <script type="text/javascript">
            window.location.href = '/inventario/index.php';
            alert("EXITO!. SE HA CREADO TU USUARIO, INICIA SESIÓN");
        </script>
    <?php

    /* Si no se reciben resultados es porque no existe el usuario con la contraseña proporcionada */
} catch (PDOException $ex) {
    echo 'Falla en la conexión: ' . $ex->getMessage();
}

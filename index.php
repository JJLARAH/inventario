<!--/*---------------------------------------------------------------------------------------------------------*/
/*<><><> INDEX DE LOGIN <><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>*/
/*--------------------------------------------------------------------------------------------------------*/-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD :: Inventario</title>
    <link rel="stylesheet" href="view/resources/css/login.css">
    <link rel="shortcut icon" href="./view/resources/img/favicon/favicon_32x32.png">
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <!--Logos del sistema-->
            <img class="loginLogo" src="./view/resources/img/logos/barcode-regular-132.png" alt="logoImg">
        </div>
        <div class="title">
            CRUD Inventario
            <div class="sub_title">Inicia sesión</div>
        </div>
        <!-- Formulario de inicio de sesión -->
        <form action="/inventario/model/persistence/Login.php" method="post">
            <div class="field">
                <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario" class="form-control" required  autocomplete="off">
            </div>
            <div class="field">
                <input type="password" name="contraseña" id="contraseña" placeholder="Ingresa tu contraseña" class="form-control" required autocomplete="off">
            </div>
            <div class="field">
                <input type="submit" value="Ingresar" name="Login">
            </div>
        </form>
        <div align="center" style="color:whitesmoke; opacity: 1; font-size:small;">
            <p>
                ¿No tienes cuenta? <a href="">Registrate aquí</a>
            </p>
            <br>
        </div>
    </div>
</body>
</html>
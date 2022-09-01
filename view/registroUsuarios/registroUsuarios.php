<!--/*---------------------------------------------------------------------------------------------------------*/
/*<><><> INDEX DE REGISTRO <><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>*/
/*--------------------------------------------------------------------------------------------------------*/-->
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
            <img class="loginLogo" src="../../view/resources/img/logos/barcode-regular-132.png" alt="logoImg">
        </div>
        <div class="title-register">
            <div class="sub_title">Registro de usuarios</div>
        </div>
        <!-- Formulario de inicio de sesión -->
        <form action="../../model/persistence/Register.php" method="post">
            <div class="field">
                <input type="hidden" name="id_usuario" id="id_usuario" value="0">
                <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario" class="form-control" required maxlength="16" minlength="8" data-bs-toggle="tooltip" data-bs-placement="top" title="Debe tener al menos 8 caracteres." autocomplete="new-user">
            </div>
            <div class="field">
                <input type="password" name="contraseña" id="contraseña" placeholder="Ingresa tu contraseña" class="form-control" required maxlength="16" minlength="8" data-bs-toggle="tooltip" data-bs-placement="top" title="Debe tener al menos 8 caracteres, una mayúscula, una minúscula y un dígito." pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*" autocomplete="new-password">
            </div>
            <div class="field">
                <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" class="form-control" required maxlength="35" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresa tu nombre">
            </div>
            <div class="field">
                <input type="tex" name="apellido_paterno" id="apellido_paterno" placeholder="Ingresa tu apellido paterno" class="form-control" required maxlength="35" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresa tu apellido paterno">
            </div>
            <div class="field">
                <input type="tex" name="apellido_materno" id="apellido_materno" placeholder="Ingresa tu apellido materno" class="form-control" required maxlength="35" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresa tu apellido materno">
            </div>
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
    </div>
</body>
</html>
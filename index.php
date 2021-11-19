<?php

// validar los campos
include("php/validar_c_c.php");

// crear la cuenta en la base de datos 
include("php/crear_cuenta.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - Crear Cuenta</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="cont">
        <section class="introducir">
            <h1 class="titulo1">CREAR CUENTA</h1><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <label>Nombre</label>
                <input class="d2" type="text" name="nombre" placeholder="Nombre" value="<?php if (isset($nombre)) {
                    echo $nombre;
                } ?>">
                <span> <?php echo $nombre_error; ?> </span>
                <label>Apellido</label>
                <input class="d2" type="text" name="apellido" placeholder="Apellido" value="<?php if (isset($apellido)) {
                    echo $apellido;
                } ?>">
                <span> <?php echo $apellido_error; ?> </span>
                <label>Correo</label>
                <input class="d2" type="email" name="correo" placeholder="nombre@ejemplo.com" value="<?php if (isset($correo)) {
                    echo $correo;
                } ?>">
                <span> <?php echo $correo_error; ?> </span>
                <label>Usuario</label>
                <input class="d2" type="text" name="usuario" placeholder="Usuario" value="<?php if (isset($usuario)) {
                    echo $usuario;
                } ?>">
                <span> <?php echo $usuario_error; ?> </span>
                <label>Contraseña</label>
                <input class="d2" type="password" name="contra" placeholder="**********" value="<?php if (isset($contra)) {
                    echo $contra;
                } ?>">
                <span> <?php echo $contra_error; ?> </span>
                <input class="boton" type="submit" value="Crear cuenta" name="crear_cuenta">
                <input class="boton2" type="button" onclick="location.href='php/iniciar_sesion.php';" value="Iniciar sesion">
            </form>
        </section>
    </div>
</body>
</html>
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
    <title>Clover MI - Crear Cuenta</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="cont">
        <section class="introducir">
            <h1 class="titulo1">CREAR CUENTA</h1><br><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <label><b>Nombre</b></label>
                <input class="d2" type="text" name="nombre"  value="<?php if (isset($nombre)) {
                    echo $nombre;
                } ?>"><br>
                <span class="error"> <?php echo $nombre_error; ?> </span><br>
                <label><b>Apellido</b></label>
                <input class="d2" type="text" name="apellido"  value="<?php if (isset($apellido)) {
                    echo $apellido;
                } ?>"><br>
                <span class="error"> <?php echo $apellido_error; ?> </span><br>
                <label><b>Correo</b></label>
                <input class="d2" type="email" name="correo" value="<?php if (isset($correo)) {
                    echo $correo;
                } ?>"><br>
                <span class="error"> <?php echo $correo_error; ?> </span><br>
                <label><b>Usuario</b></label>
                <input class="d2" type="text" name="usuario" value="<?php if (isset($usuario)) {
                    echo $usuario;
                } ?>"><br>
                <span class="error"> <?php echo $usuario_error; ?> </span><br>
                <label><b>Contraseña</b></label>
                <input class="d2" type="password" name="contra" value="<?php if (isset($contra)) {
                    echo $contra;
                } ?>"><br>
                <span class="error"> <?php echo $contra_error; ?> </span><br>
                <input class="boton" type="submit" value="Crear" name="crear_cuenta">
                <input class="boton2" type="button" onclick="location.href='php/iniciar_sesion.php';" value="Iniciar sesion">
            </form>
        </section>
    </div>
</body>
</html>
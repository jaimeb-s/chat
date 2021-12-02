<?php

session_start();

include("conexion.php");

$nombre_error = "";
$apellido_error = "";
$correo_error = "";
$usuario_error = "";

$id_u = $_SESSION['id_u'];
$correo_u = $_SESSION['correo_u'];
$usuario_u = $_SESSION['usuario_u'];

if (isset($_POST['agregar_contacto'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    // $id_u = $_POST['id_usuario'];

    // validar nombre
    if (empty($nombre)) {
        $nombre_error = "Tiene que agregar su nombre";
    } else {
        if (strlen($nombre) > 20) {
            $nombre_error = "El nombre es muy largo";
        } else {
            $nombre_error = "";
        }
    }

    // validar apellido
    if (empty($apellido)) {
        $apellido_error = "Tiene que agregar su apellido";
    } else {
        if (strlen($apellido) > 20) {
            $apellido_error = "El apellido es muy largo";
        } else {
            $apellido_error = "";
        }
    }

    // validar correo
    if (empty($correo)) {
        $correo_error = "Tiene que agregar su correo";
    } else {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $correo_error = "El correo es invalido";
        } else {
            $correo_error = "";
        }
    }
    
    // validar usuario
    if (empty($usuario)) {
        $usuario_error = "Tiene que agregar su usuario";
    } else {
        if (strlen($usuario) > 15) {
            $usuario_error = "El usuario es muy largo";
        } else {
            $usuario_error = "";
        }
    }

    if (empty($nombre_error) && empty($apellido_error) && empty($correo_error) && empty($usuario_error) && empty($contra_error)) {
        include("add_cont.php");
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - Agregar contacto</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre" value="<?php if (isset($nombre)) {
            echo $nombre;
        } ?>">
        <span class="error"> <?php echo $nombre_error ?></span>
        <label>Apellidos</label>
        <input type="text" name="apellido" placeholder="Apellido" value="<?php if (isset($apellido)) {
            echo $apellido;
        } ?>">
        <span class="error"> <?php echo $apellido_error ?></span>
        <label>Correo</label>
        <input type="email" name="correo" placeholder="nombre@ejemplo.com" value="<?php if (isset($correo)) {
            echo $correo;
        } ?>">
        <span class="error"> <?php echo $correo_error ?></span>
        <label>Usuario</label>
        <input type="text" name="usuario" placeholder="Usuario" value="<?php if (isset($usuario)) {
            echo $usuario;
        } ?>">
        <span class="error"> <?php echo $usuario_error ?></span>
        <input type="hidden" name="id_usuario" value="<?php echo $id_u; ?>">
        <input type="submit" value="Agregar usuario" name="agregar_contacto">
    </form>
</body>
</html>
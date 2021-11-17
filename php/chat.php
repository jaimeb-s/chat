<?php

// incluir la conexion a la base de datos
include("conexion.php");

session_start();

if (isset($_POST['iniciar_s'])) {
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    if ($correo != "" && $usuario != "" && $contra != "") {
        // buscar si los campos de correo, usuario y contra estan en la tabla de usuario
        $encontrar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND 
        usuario = '$usuario' AND pass = '$contra'");

        if (mysqli_num_rows($encontrar_usuario ) > 0) {
            while ($r = mysqli_fetch_assoc($encontrar_usuario)){
                $_SESSION['id'] = $r['id_usuario'];
                $_SESSION['nombre'] = $r['nombre'];
                $_SESSION['apellido'] = $r['apellido'];
                $_SESSION['correo'] = $r['correo'];
                $_SESSION['usuario'] = $r['usuario'];
            }

            // header("Location: chat.php");

            // echo "<script>window.location='chat.php'</script>";
        } else {
            echo "<script>
            alert('Cuenta no econtrada, verificar sus datos');
            window.history.go(-1);
            </script>";
            exit;
        }
    } else {
        echo "<script> alert('Todos los campos son obligatorios');
        window.history.go(-1);</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
</head>
<body>
    <div>
        <div class="datos_usuario">
            <p>nombre: <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?></p>
            <p>apellidos: <?php echo $_SESSION['apellido']; ?></p>
            <p>Correo: <?php echo $_SESSION['correo']; ?></p>
            <p>Usuario: <?php echo $_SESSION['usuario']; ?></p>
            <p><a href="modificar_usuario.php">Modificar Datos</a></p>
        </div>
        <div class="datos_contacto">
            <h2>Contactos</h2>
            <p><a href="agregar_cont.php">Agregar contacto</a></p>
            <p><a href="eliminar_cont.php">Eliminar contacto</a></p>
        <!-- INSERT INTO `contactos` (`id_contacto`, `nombre`, `apellido`, `correo`, `usuario`, `id_usuario`) VALUES (NULL, 'jaime', 'barrios', 'jaimebar@gmail.com', 'jabar', '1'); -->
        </div>
        <div class="mensajes">
        <!-- INSERT INTO `mensajes` (`id_mensaje`, `mensaje`, `fecha`, `hora`, `id_usuario`, `id_contacto`) VALUES (NULL, 'hola', '2021-11-16', '17:59:32', '1', '1');
    1 -->
        </div>
        <div>
            <p><a href="salir.php">Cerrar sesion</a></p>
        </div>
    </div>
</body>
</html>
<?php

session_start();

// Validar los campos
include("validar_i_s.php");

// Incluir la conexion a la base de datos
include("conexion.php");

if (isset($_POST['iniciar_s'])) {
    if (empty($correo_error) && empty($usuario_error) && empty($contra_error)) {
        
        // Buscar si los campos de correo, usuario y contra estan en la tabla de usuario
        $encontrar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND 
        usuario = '$usuario' AND pass = '$contra'");

        if (mysqli_num_rows($encontrar_usuario) > 0) {
            $r = mysqli_fetch_assoc($encontrar_usuario);
            $_SESSION['id_u'] = $r['id_usuario'];
            $_SESSION['nombre_u'] = $r['nombre'];
            $_SESSION['apellido_u'] = $r['apellido'];
            $_SESSION['correo_u'] = $r['correo'];
            $_SESSION['usuario_u'] = $r['usuario'];
            $_SESSION['pass_u'] = $r['pass'];

            header("Location: chat.php?" . SID);

        } else {
            echo "<script>
                alert('Cuenta no encontrada, verificar sus datos');
                window.history.go(-1);
                </script>";
            exit;
        }        
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - Inicar Sesion</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="cont">
        <section class="introducir">
            <h1 class="titulo2">INICIAR SESION</h1><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label>Correo</label>
                <input class="d2" type="email" name="correo" value="<?php if (isset($correo)) {
                    echo $correo;
                } ?>"><br>
                <span class="error"> <?php echo $correo_error; ?> </span><br>
                <label>Usuario</label>
                <input class="d2" type="text" name="usuario" value="<?php if (isset($usuario)) {
                    echo $usuario;
                } ?>"><br>
                <span class="error"> <?php echo $usuario_error; ?> </span><br>
                <label>Contraseña</label>
                <input class="d2" type="password" name="contra" value="<?php if (isset($contra)) {
                    echo $contra;
                } ?>"><br>
                <span class="error"> <?php echo $contra_error; ?> </span><br>
                <input class="boton" type="submit" value="Iniciar" name="iniciar_s">
                <input class="boton2" type="button" onclick="location.href='../index.php';" value="Crear cuenta">
                <p class="renova_contra"><a href="pass_olvidada.php" style="color: #1A1A1B">¿Has olvidado tu contraseña?</a></p>
            </form>
        </section>
    </div>
</body>
</html>


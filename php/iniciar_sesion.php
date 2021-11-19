<?php

session_start();

// validar los campos
include("validar_i_s.php");

// incluir la conexion a la base de datos
include("conexion.php");

if (isset($_POST['iniciar_s'])) {
    if (empty($correo_error) && empty($usuario_error) && empty($contra_error)) {
        
        // buscar si los campos de correo, usuario y contra estan en la tabla de usuario
        $encontrar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND 
        usuario = '$usuario' AND pass = '$contra'");

        // TODO: checar esta parte para la sesion
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
    <!--Bootstrap-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
</head>
<body>
    <div class="cont">
        <section class="introducir">
            <h1 class="titulo1">INICIAR SESION</h1><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
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
                <input class="boton" type="submit" value="Iniciar Sesion" name="iniciar_s">
                <p>Usuario nuevo?<a href="../index.php">Crear cuenta</a></p>
                <p><a href="pass_olvidada.php">Has olvidado tu contraseña</a></p>
            </form>
        </section>
    </div>
</body>
</html>


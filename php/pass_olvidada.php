<?php

// incluir la conexion a la base de datos
include("conexion.php");

if (isset($_POST['cambiar_pass'])) {
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contra_nueva = $_POST['contra'];

    if ($correo != "" && $usuario != "" && $contra_nueva != "") {
        // buscar si los campos de correo, usuario estan en la tabla de usuario
        $encontrar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND 
        usuario = '$usuario'");

        if (mysqli_num_rows($encontrar_usuario ) > 0) {
            $cambiar_pass = "UPDATE usuarios SET pass = '$contra_nueva' WHERE correo = '$correo' AND 
            usuario = '$usuario'";

            $res = mysqli_query($conexion, $cambiar_pass);

            if ($res) {
                echo "<script> alert('Cuenta encontrada, contraseña cambiada correctamente');
                window.location='iniciar_sesion.php'</script>";
            } else {
                echo "<script>
                alert('Error, no se pudo cambiar la contraseña');
                window.history.go(-1);
                </script>";
            }
        } else {
            echo "<script>
            alert('Cuenta no econtrada');
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
    <title>Chat - Cambiar Contraseña</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/style.css">
    <!--Bootstrap-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
</head>
<body>
    <div class="cont">
        <section class="introducir">
            <h1 class="titulo1">CAMBIAR CONTRASEÑA</h1><br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label>Correo</label>
                <input class="d2" type="email" name="correo" placeholder="nombre@ejemplo.com"><br>
                <label>Usuario</label>
                <input class="d2" type="text" name="usuario" placeholder="Usuario"><br>
                <label>Contraseña Nueva</label>
                <input class="d2" type="password" name="contra" placeholder="**********"><br>
                <input class="boton" type="submit" value="Cambiar Contraseña" name="cambiar_pass">
                <p>Usuario nuevo?<a href="../index.php">Crear cuenta</a></p>
                <p>Ya tienes una cuenta?<a href="iniciar_sesion.php">Iniciar sesion</a></p>
            </form>
        </section>
        <div class="img">
            <img src="../img/chat.png" alt="" sizes="" srcset="">
        </div>
    </div>
</body>
</html>
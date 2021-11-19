<?php

// validar los campos
include("validar_p_o.php");

// incluir la conexion a la base de datos
include("conexion.php");

if (isset($_POST['cambiar_pass'])) {
    if (empty($correo_error) && empty($usuario_error) && empty($contra_error)) {
        
        // buscar si los campos de correo de usuario estan en la tabla de usuario
        $encontrar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND usuario = '$usuario'");
        
        if (mysqli_num_rows($encontrar_usuario ) > 0) {

            $cambiar_pass = "UPDATE usuarios SET pass = '$contra' WHERE correo = '$correo' AND usuario = '$usuario'";

            $res = mysqli_query($conexion, $cambiar_pass);

            if ($res) {
                echo "<script>
                    alert('Cuenta encontrada, contraseña cambiada correctamente');
                    window.location='iniciar_sesion.php'
                </script>";
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
            <h1 class="titulo3">CAMBIAR CONTRASEÑA</h1><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label>Correo</label>
                <input class="d2" type="email" name="correo" value="<?php if (isset($correo)) {
                    echo $correo;
                } ?>"><br>
                <span class="error"> <?php echo $correo_error; ?></span>
                <br>
                <label>Usuario</label>
                <input class="d2" type="text" name="usuario" value="<?php if (isset($usuario)) {
                    echo $usuario;
                } ?>"><br>
                <span class="error"> <?php echo $usuario_error; ?></span>
                <br>
                <label>Contraseña Nueva</label>
                <input class="d2" type="password" name="contra" value="<?php if (isset($contra)) {
                    echo $contra;
                } ?>"><br>
                <span class="error"> <?php echo $contra_error; ?></span>
                <br>
                <input class="boton9" type="submit" value="Cambiar Contraseña" name="cambiar_pass"><br>
                <input class="boton" type="button" onclick="location.href='../index.php';" value="Crear cuenta">
                <input class="boton2" type="button" onclick="location.href='iniciar_sesion.php';" value="Iniciar sesion">
            </form>
        </section>
    </div>
</body>
</html>
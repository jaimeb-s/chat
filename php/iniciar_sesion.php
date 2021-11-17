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
            <form action="chat.php" method="post">
                <label>Correo</label>
                <input class="d2" type="email" name="correo" placeholder="nombre@ejemplo.com"><br>
                <label>Usuario</label>
                <input class="d2" type="text" name="usuario" placeholder="Usuario"><br>
                <label>Contraseña</label>
                <input class="d2" type="password" name="contra" placeholder="**********"><br>
                <input class="boton" type="submit" value="Iniciar Sesion" name="iniciar_s">
                <p>Usuario nuevo?<a href="../index.php">Crear cuenta</a></p>
                <p><a href="pass_olvidada.php">Has olvidado tu contraseña</a></p>
            </form>
        </section>
        <div class="img">
            <img src="../img/chat.png" alt="" sizes="" srcset="">
        </div>
    </div>
</body>
</html>


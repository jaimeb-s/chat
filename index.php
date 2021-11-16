<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="cont">
        <section class="introducir">
            <h1 class="titulo1">CREAR CUENTA</h1><br>
            <form action="php/registrar.php" method="post">
                <label>Nombre</label>
                <input class="d2" type="text" name="nombre" placeholder="Nombre">
                <label>Apellido</label>
                <input class="d2" type="text" name="apellido" placeholder="Apellido">
                <label>Correo</label>
                <input class="d2" type="email" name="correo" placeholder="nombre@ejemplo.com">
                <label>Usuario</label>
                <input class="d2" type="text" name="usuario" placeholder="Usuario">
                <label>Contraseña</label>
                <input class="d2" type="password" name="contra" placeholder="**********">
                <input class="boton" type="submit" value="Crear cuenta" name="cuenta">
                <p>Ya tienes una cuenta?<a href="php/iniciar_sesion.php">Iniciar sesion</a></p>
            </form>
        </section>
        <div class="img">
            <img src="img/chat.png" alt="" sizes="" srcset="">
        </div>
    </div>
</body>
</html>
<?php

session_start();

include("conexion.php");

$id_c = $_GET['id_contacto'];
$id_u = $_SESSION['id_u'];
$cont = "SELECT * FROM contactos WHERE id_contacto = {$id_c}";

$res = mysqli_query($conexion, $cont);
$roo = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/cont.css">
</head>
<body>
    <div class="cont">
        <section class="edicion">
            <form action="act_cont.php" method="post">
                <h1 class="titulo2">EDITAR CONTACTO</h1><br>
                <input class="d3" type="hidden" name="id" value="<?php echo $roo['id_contacto']; ?>">
                <label>Nombre</label>
                <input class="d3" type="text" name="nombre" value="<?php echo $roo['nombre']; ?>">
                <label>Apellido</label>
                <input class="d3" type="text" name="apellido" value="<?php echo $roo['apellido']; ?>">
                <label>Correo</label>
                <input class="d4 in" type="text" name="correo" value="<?php echo $roo['correo']; ?>" disabled>
                <label>Usuario</label>
                <input class="d4 in" type="text" name="usuario" value="<?php echo $roo['usuario']; ?>" disabled>

                <input class="boton" type="submit" value="Editar contacto">
            </form>
        </section>
    </div>
</body>
</html>
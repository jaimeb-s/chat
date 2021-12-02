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
    <!-- TODO: aplicar estilos -->
</head>
<body>
    <form action="act_cont.php" method="post">
        <input type="hidden" name="id" value="<?php echo $roo['id_contacto']; ?>">
        <input type="text" name="nombre" value="<?php echo $roo['nombre']; ?>">
        <input type="text" name="apellido" value="<?php echo $roo['apellido']; ?>">
        <input type="text" name="correo" value="<?php echo $roo['correo']; ?>" disabled>
        <input type="text" name="usuario" value="<?php echo $roo['usuario']; ?>" disabled>

        <input type="submit" value="Editar contacto">

    </form>
</body>
</html>
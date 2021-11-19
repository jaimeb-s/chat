<?php

session_start();

// incluir la conexion a la base de datos
include("conexion.php");

echo $_SESSION['id_u'];
echo $_SESSION['nombre_u'];
echo $_SESSION['apellido_u'];
echo $_SESSION['correo_u'];
echo $_SESSION['usuario_u'];
echo $_SESSION['pass_u'];

// $id_u = $_GET['id'];
// $usuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_u'";

// $a = mysqli_query($conexion, $usuario);
// $r = mysqli_fetch_assoc($a);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="../chat.css"> -->
</head>
<body>
    <div>
        <!-- <div class="datos_usuario">
            <p>< ?php // echo $r['nombre'] . " " . $r['apellido']; ?></p>
            <div>
                <p><a href="salir.php">Cerrar sesion</a></p>
            </div>
        </div>
        <div class="datos_contacto">
            <h2>Contactos</h2>
            <p><a href="agregar_con.php?id=< ?php echo $id_u; ?>">Agregar contacto</a></p>
            <p><a href="eliminar_cont.php?id=< ?php echo $id_u; ?>">Eliminar contacto</a></p>
            <div>
                < ?php 

                //$contactos = "SELECT * FROM contactos WHERE id_usuario = '$id_u'";

                $res = mysqli_query($conexion, $contactos);
                while ($row = mysqli_fetch_assoc($res)) {
                
                ?>

                <a href="mensaje.php?id=< ?php echo $id_u . "&id_c=" . $row['id_contacto']; ?>">
                    <div>
                        <p> < ?php echo $row['usuario']; ?> </p>-->
                        <!-- <p><a href="eliminar_cont.php?id=< ?php echo $row['id_contacto']; ?>" class="elim-cont">eliminar</a></p> -->
                    <!-- </div>
                </a>
                < ?php } Mysqli_free_result($res);?>
            </div> -->


        <!-- INSERT INTO `contactos` (`id_contacto`, `nombre`, `apellido`, `correo`, `usuario`, `id_usuario`) VALUES (NULL, 'jaime', 'barrios', 'jaimebar@gmail.com', 'jabar', '1'); -->
        </div>
        <!-- <div class="mensajes"> -->
        <!-- INSERT INTO `mensajes` (`id_mensaje`, `mensaje`, `fecha`, `hora`, `id_usuario`, `id_contacto`) VALUES (NULL, 'hola', '2021-11-16', '17:59:32', '1', '1');
    1 -->
            <!--<section id="msj">

            </section>
            <section id="enviar">
                <input type="text" name="" id="" placeholder="Escribe el mensaje ...">
            </section>
        </div> -->
        
    </div>
</body>
</html>
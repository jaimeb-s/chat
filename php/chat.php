<?php

session_start();

// Incluir la conexion a la base de datos
include("conexion.php");

// echo $_SESSION['id_u'];
// echo $_SESSION['nombre_u'];
// echo $_SESSION['apellido_u'];
// echo $_SESSION['correo_u'];
// echo $_SESSION['usuario_u'];
// echo $_SESSION['pass_u'];

$id_u = $_SESSION['id_u'];
$usuario = "SELECT * FROM usuarios WHERE id_usuario = '$id_u'";

$a = mysqli_query($conexion, $usuario);
$r = mysqli_fetch_assoc($a);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/chat.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
    <div>
        <div class="general">

            <div class="chat">
                <?php

                include("mensaje.php")

                ?>
            </div>
      
            <div class="datos_usuario">
                <div class="details">
                    <div class="inf">
                        <i class="bi bi-person-circle "></i>
                        <p><?php echo $r['usuario']; ?> </p>
                    </div>
                    <div class="icono_op">
                        <div>
                            <div class="salir">
                                <div><p><a href="salir.php">Cerrar sesion</a></p></div>
                            </div>
                            <p><i class="bi bi-three-dots-vertical icon"></i></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="datos_contacto" id="U_cont">
                <!-- < ?php include("dato_chat.php"); ?> -->
            </div>
            <script>
                // Actualizar el div de contactos automaticamente
                $(document).ready(function() {
                    var refreshId = setInterval( function(){
                        $('#U_cont').load('dato_chat.php?<?php echo SID; ?>');
                    }, 2500 );
                });
            </script>
            <div class="add_cont">
                <button type="submit" onclick="location.href='agregar_con.php?<?php echo SID; ?>'">Agregar Contacto</button>
            </div>
        </div>
    </div>
    <script src="../js/barra_abajo.js"></script>
    <script src="../js/confir.js"></script>
</body>
</html>
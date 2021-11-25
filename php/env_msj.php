<?php

session_start();

include("conexion.php");

$diahoy = date("Y") . "-" . date("m") . "-" . date("d");

if (isset($_POST['enviar_msj'])) {
    $mensaj = $_POST['mensaje'];
    $id_u = $_POST['remitente'];
    $id_cont = $_POST['dest'];
    if (!empty($mensaj)) {
        $insert_msj = "INSERT INTO mensajes(mensaje, fecha, remitente, destinatario)
                        VALUES ('$mensaj','$diahoy','$id_u','$id_cont')";
        
        $enviar = mysqli_query($conexion, $insert_msj);

        if ($enviar) {
            header("Location: chat.php?" . SID . "&id_user=" . $id_cont);
        }
    } else {
    // Envia a la misma pagina cuando no hay texto y envia
        header("Location: chat.php?" . SID . "&id_user=" . $id_cont);
    }
}

?>
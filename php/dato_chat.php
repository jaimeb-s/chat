<?php

session_start();

include("conexion.php");

$id_u = $_SESSION['id_u'];
$sql = "SELECT * FROM usuarios WHERE NOT id_usuario = {$id_u} ORDER BY id_usuario DESC";
$query = mysqli_query($conexion, $sql);
if (mysqli_num_rows($query) > 0) {
    
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM mensajes WHERE (remitente = {$id_u} OR destinatario = {$id_u}) AND 
        (destinatario = {$row['id_usuario']} OR remitente = {$row['id_usuario']}) ORDER BY id_mensaje DESC LIMIT 1;";
        $query2 = mysqli_query($conexion, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        // Obtener el mensaje
        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['mensaje'];
        } else {
            $result = "No hay mensajes";
        }

        // Poner tres puntos a mas de 28 caracteres
        if (strlen($result) > 28) {
            $msg = substr($result, 0, 28) . '...';
        } else {
            $msg = $result;
        }

        // Mostrar "Tu" si el usuario envio el mensaje
        if (isset($row2['remitente'])) {
            if ($id_u == $row2['remitente']) {
                $tu = "Tu: ";
            } else {
                $tu = "";
            }
        } else {
            $tu = "";
        }

        echo '<a href="chat.php?' . SID . '&id_user=' . $row['id_usuario'] . '">
                <div class="content">
                    <div class="details">
                        <span>' . $row['usuario'] . '</span>
                        <p>' . $tu . $msg . '</p>
                    </div>
                </div>
            </a>';
    }
} else {
    // TODO: Revisar estilos para este cuanodo no hay usuarios
    echo "No hay usuarios disponible";
}

?>
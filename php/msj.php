<?php

session_start();

include("conexion.php");

$id_u = $_SESSION['id_u'];
$id_cont = $_GET['id_c'];

$mens = "SELECT * FROM mensajes LEFT JOIN usuarios ON usuarios.id_usuario = mensajes.remitente
        WHERE (remitente = {$id_u} AND destinatario = {$id_cont})
        OR (remitente = {$id_cont} AND destinatario = {$id_u}) ORDER BY id_mensaje";

$q = mysqli_query($conexion, $mens);
while ($a = mysqli_fetch_assoc($q)) {
    if ($a['remitente'] == $id_u) {
        echo "<div class='chat_remitente'>
                <div class='detalles'>
                    <p>" . $a['mensaje'] . "</p>
                </div>
            </div>";
    } else {
        echo "<div class='chat_destinatario'>
                <div class='detalles'>
                    <p>" . $a['mensaje'] . "</p>
                </div>
            </div>";
    }
}

?>
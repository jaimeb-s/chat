<?php

session_start();

include("conexion.php");

$id_u = $_SESSION['id_u'];
$sql = "SELECT * FROM contactos WHERE id_usuario = {$id_u} ORDER BY contactos.usuario ASC";
$query = mysqli_query($conexion, $sql);
if (mysqli_num_rows($query) > 0) {
    
    while($row = mysqli_fetch_assoc($query)){

        // Obtener el id de usuario al que perteneze el contacto
        $dest = $row['correo'];
        $destt = "SELECT * FROM usuarios WHERE correo = '$dest'";
        $quu = mysqli_query($conexion, $destt);
        $rooo = mysqli_fetch_assoc($quu);

        $sql2 = "SELECT * FROM mensajes WHERE (remitente = {$id_u} OR destinatario = {$id_u}) AND 
        (destinatario = {$rooo['id_usuario']} OR remitente = {$rooo['id_usuario']}) ORDER BY id_mensaje DESC LIMIT 1";
        $query2 = mysqli_query($conexion, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        // Obtener el mensaje
        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['mensaje'];
        } else {
            $result = "No hay mensajes";
        }

        // Poner tres puntos a mas de 131 caracteres
        if (strlen($result) > 13) {
            $msg = substr($result, 0, 13) . '...';
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
        echo '<a href="chat.php?' . SID . '&id_user=' . $rooo['id_usuario'] . '">
                <div class="dato_cont">
                    <div class="details">
                        <div class="info">
                            <span>' . $row['nombre'] . '</span>
                            <p>' . $tu . $msg . '</p>
                        </div>
                        <div class="icono_op_c">
                            <div>
                                <div class="ic">
                                    <div><p><a href="eliminar_cont.php?id_contacto=' . $row['id_contacto'] . '" class="elim_cont"><i class="bi bi-trash-fill"></i></a></p></div>
                                </div>
                                <div class="ic">
                                    <div><p><a href="editar_cont.php?' . SID . '&id_contacto=' . $row['id_contacto'] . '"><i class="bi bi-pencil-fill"></i></a></p></div>
                                </div>
                                <p><i class="bi bi-chevron-left"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>';
    }
} else {
    // Cuando no hay contactos agregados
    echo "<div class='c_cont_txt'>
            <div class='txt'>
                <P>\"Sin contactos\"</p>
            </div>
        </div>";
}

?>
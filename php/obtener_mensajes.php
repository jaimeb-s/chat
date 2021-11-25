<?php

include("conexion.php");

$mens = "SELECT * FROM mensajes LEFT JOIN usuarios ON usuarios.id_usuario = mensajes.remitente
        WHERE (remitente = {$id_u} AND destinatario = {$id_cont})
        OR (remitente = {$id_cont} AND destinatario = {$id_u}) ORDER BY id_mensaje";
$q = mysqli_query($conexion, $mens);
if (mysqli_num_rows($q) > 0) {
    ?>

    <div class="most_msj" id="bar_msj">

    </div>
    <script>
        $(document).ready(function() {
            
            var refreshId = setInterval( function(){
                $('#bar_msj').load('msj.php?id_c=<?php echo $id_cont; ?>'); 
            }, 1000 );
        });
    </script>

    <?php

} else {
    echo "<div class='content_txt'>
            <div class='txt'>
                <p>\"No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.\"</p>
            </div>
        </div>";
}

?>
<?php

if (isset($_GET['id_user'])) {
    $id_cont = $_GET['id_user'];

    $u = "SELECT * FROM usuarios WHERE id_usuario = {$id_cont}";
    $user_chat = mysqli_query($conexion, $u);
    if (mysqli_num_rows($user_chat) > 0) {
        $ro = mysqli_fetch_assoc($user_chat);
        ?>

        <div class="details">
            <i class="bi bi-person-circle"></i>
            <div class="cont1">
                <span><?php echo $ro['usuario']; ?></span>
                <p><?php echo $ro['nombre'] . " " . $ro['apellido']; ?></p>
            </div>
            <div class="icono_op">
                <div>
                    <div class="salir">
                        <div><p><a href="salir.php">Cerrar sesion</a></p></div>
                    </div>
                    <p><i class="bi bi-three-dots-vertical icon"></p></i>
                </div>
            </div>
        </div>

        <div class="msj" id="most_chat">
            <?php include("obtener_mensajes.php"); ?>
        </div>
        
        <div class="env_msj">
            <form action="env_msj.php" method="post">
                <input type="hidden" name="remitente" value="<?php  echo $id_u; ?>">
                <input type="hidden" name="dest" value="<?php echo $ro['id_usuario']; ?>">
                <input type="text" class="msg" name="mensaje" placeholder="Mensaje" autocomplete="off">
                <button type="submit" name="enviar_msj" class="btn_env"><i class="bi bi-send-fill icon_msj"></i></button>
            </form>
        </div>

        <?php
    } else {
        //
        echo "Este chat no existe";
    }
} else {
    echo "<div class='cont_txt'>
            <div class='txt'>
                <P>\"Seleccione un chat\"</p>
            </div>
        </div>";
}

?>
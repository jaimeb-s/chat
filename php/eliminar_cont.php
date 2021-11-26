<?php

session_start();

// Incluir la conexion a la base de datos
include("conexion.php");

$id = $_GET['id_contacto'];

$eliminar = "DELETE FROM contactos WHERE id_contacto = '$id'";

$resultado = mysqli_query($conexion, $eliminar);

if ($resultado) {
    header("Location: chat.php?" . SID);
}else{
    echo "<script> alert('No se pudo eliminar el registro');
        window.history.go(-1);
        </script>";
}
mysqli_close($conexion);

?>
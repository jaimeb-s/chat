<?php

session_start();

include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$update = "UPDATE contactos SET nombre = '$nombre', apellido = '$apellido' WHERE id_contacto = '$id'";

$ress = mysqli_query($conexion, $update);

if ($ress) {
    echo "<script> alert('Contacto actualizado'); </script>";
    echo "<script> location.href='chat.php?" . SID ."';</script>";
} else {
    echo "<script>
            alert('Error, no se pudo actualizar los datos');
            window.history.go(-1);
        </script>";
}


?>
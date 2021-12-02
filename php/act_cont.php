<?php

session_start();

include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];

$update = "UPDATE contactos SET nombre = '$nombre', apellido = '$apellido' WHERE id_contacto = '$id'";

$ress = mysqli_query($conexion, $update);

if ($ress) {
    echo "<script> alert('Contacto actualizado'); </script>";
    header("Location: chat.php?" . SID);
} else {
    echo "<script>
            alert('Error, no se pudo actualizar los datos');
            window.history.go(-1);
        </script>";
}


?>
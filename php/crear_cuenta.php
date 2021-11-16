<?php

// incluir la conexion a la base de datos
include("conexion.php");

// guardar las variables enviadas del archivo index.php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

// checar que los campos no esten vacios
if ($nombre != "" && $apellido != "" && $correo != "" && $usuario != "" && $contra != "") {

    // validar correo
    $validar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
    if (mysqli_num_rows($validar_correo) > 0) {
        echo "<script>
        alert('Este correo ya esta en uso, intenta con otro diferente');
        window.history.go(-1);
        </script>";
        exit;
    }

    // validar usuario
    $validar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
    if (mysqli_num_rows($validar_usuario) > 0) {
        echo "<script>
        alert('Este usuario ya esta en uso, intenta con otro diferente');
        window.history.go(-1);
        </script>";
        exit;
    }

    // ----------- agregar usuario -----------
    $insertar= "INSERT INTO usuarios(
        nombre, apellido, correo, usuario, pass) 
        VALUES ('$nombre','$apellido','$correo','$usuario','$contra')";

    $resultado=mysqli_query($conexion, $insertar);
    if ($resultado) {
    	echo "<script> alert('Cuenta creada correctamente');
        window.location='chat.php'</script>";
    } else {
    	echo "<script> alert('No se pudo crear la cuenta, we are sorry');
        window.history.go(-1);</script>";
    }
    mysqli_close($conexion);
} else {
    echo "<script> alert('Todos los campos son obligatorios');
    window.history.go(-1);</script>";
}

?>
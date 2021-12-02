<?php

// session_start();
// incluir la conexion a la base de datos
include("conexion.php");

// no se puede agregar de contato a el usuario
if ($correo == $correo_u && $usuario == $usuario_u) {
    echo "<script>
    alert('No puede agregar al usuario como contacto');
    window.history.go(-1);
    </script>";
    exit;
}

// ver si el nombre y correo esta en la base de datos
$ver_nombre = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND usuario = '$usuario'");
if (mysqli_num_rows($ver_nombre) == 0) {
    echo "<script>
    alert('EL contacto al que desea agregar no se encuentra registrado');
    window.location='chat.php?" . SID . "
    </script>";
    exit;
}

// verificar si ya hay contactos repetidos
$verificar_cont = mysqli_query($conexion, "SELECT * FROM contactos WHERE correo = '$correo' AND usuario = '$usuario' AND id_usuario = '$id_u'");
if (mysqli_num_rows($verificar_cont) > 0) {
    echo "<script>
    alert('NO se pudo agregar el contacto. Ya existe un contacto con el mismo correo y/o usuario');
    window.history.go(-1);
    </script>";
    exit;
}

// ----------- agregar contacto -----------
$insertar= "INSERT INTO contactos (
    nombre, apellido, correo, usuario, id_usuario) 
    VALUES ('$nombre', '$apellido', '$correo', '$usuario', '$id_u')";

$resultado=mysqli_query($conexion, $insertar);
if ($resultado) {
    echo "<script> alert('Contacto agredo correctamente');
    window.location='chat.php?" . SID . "'</script>";
} else {
    echo "<script> alert('No se pudo agregar el contacto, we are sorry');
    window.history.go(-1);</script>";
}
mysqli_close($conexion);

?>
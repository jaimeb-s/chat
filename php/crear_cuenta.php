<?php

session_start();

// incluir la conexion a la base de datos
include("conexion.php");

if (isset($_POST['crear_cuenta'])) {

    // verificar que no haya mensajes de errores en los campos
    if (empty($nombre_error) && empty($apellido_error) && empty($correo_error) && empty($usuario_error) && empty($contra_error)) {
        
        // validar si existe el correo 
        $validar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
        if (mysqli_num_rows($validar_correo) > 0) {
            echo "<script>
                alert('Este correo ya esta en uso, intenta con otro diferente');
                window.history.go(-1);
            </script>";
            exit;
        }

        // validar si existe el usuario
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
        
        // TODO: checar esta parte para la sesion
        $resultado=mysqli_query($conexion, $insertar);
        if ($resultado) {
            echo "<script> alert('Cuenta creada correctamente'); </script>";

            $encontrar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND usuario = '$usuario' AND pass = '$contra'");
        	
            if (mysqli_num_rows($encontrar_usuario) > 0) {
                $r = mysqli_fetch_assoc($encontrar_usuario);
                $_SESSION['id_u'] = $r['id_usuario'];
                $_SESSION['nombre_u'] = $r['nombre'];
                $_SESSION['apellido_u'] = $r['apellido'];
                $_SESSION['correo_u'] = $r['correo'];
                $_SESSION['usuario_u'] = $r['usuario'];
                $_SESSION['pass_u'] = $r['pass'];
    
                header("Location: php/chat.php?" . SID);
            }
        } else {
        	echo "<script> alert('No se pudo crear la cuenta, we are sorry');
            window.history.go(-1);</script>";
        }
        mysqli_close($conexion);
    }
}

?>
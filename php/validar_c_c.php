<?php

$nombre_error = "";
$apellido_error = "";
$correo_error = "";
$usuario_error = "";
$contra_error = "";

if (isset($_POST['crear_cuenta'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];
    
    // validar nombre
    if (empty($nombre)) {
        $nombre_error = "Tiene que agregar su nombre";
    } else {
        if (strlen($nombre) > 20) {
            $nombre_error = "El nombre es muy largo";
        } else {
            $nombre_error = "";
        }
    }

    // validar apellido
    if (empty($apellido)) {
        $apellido_error = "Tiene que agregar su apellido";
    } else {
        if (strlen($apellido) > 20) {
            $apellido_error = "El apellido es muy largo";
        } else {
            $apellido_error = "";
        }
    }

    // validar correo
    if (empty($correo)) {
        $correo_error = "Tiene que agregar su correo";
    } else {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $correo_error = "El correo es invalido";
        } else {
            $correo_error = "";
        }
    }
    
    // validar usuario
    if (empty($usuario)) {
        $usuario_error = "Tiene que agregar su usuario";
    } else {
        if (strlen($usuario) > 15) {
            $usuario_error = "El usuario es muy largo";
        } else {
            $usuario_error = "";
        }
    }

    // validar contra
    if (empty($contra)) {
        $contra_error = "Tiene que agregar su contaseña";
    } else {
        if (strlen($contra) > 18) {
            $contra_error = "El contaseña es muy largo";
        } else {
            $contra_error = "";
        }
    }
}
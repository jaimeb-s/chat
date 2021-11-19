<?php

$correo_error = "";
$usuario_error = "";
$contra_error = "";

if (isset($_POST['cambiar_pass'])) {
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

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
<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "chat";

$conexion= mysqli_connect($host, $user, $pass, "$db");
mysqli_set_charset($conexion, "utf8");

?>
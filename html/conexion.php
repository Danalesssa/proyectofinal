<?php
$conexion = new mysqli("db", "root", "root_password", "proyectofinal");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>

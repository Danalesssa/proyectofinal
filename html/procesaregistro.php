<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['contrasena'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$tarjeta = str_replace(' ', '', $_POST['tarjeta_credito']); 
$direccion = $_POST['direccion'];

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, apellido, email, contrasena, fecha_nacimiento, tarjeta_credito, direccion)
        VALUES ('$nombre', '$apellido', '$email', '$password_hash', '$fecha_nacimiento', '$tarjeta', '$direccion')";

if (mysqli_query($conexion, $sql)) {
    header("Location: login.php?success=1");
    exit();
} else {
    echo "Error al registrar usuario: " . mysqli_error($conexion);
}

?>

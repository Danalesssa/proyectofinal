<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['contrasena'];

    $query = "SELECT * FROM usuarios WHERE email = ?";
    $cons = $conexion->prepare($query);
    $cons->bind_param("s", $email);
    $cons->execute();
    $resultado = $cons->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($password, $usuario['contrasena'])) {

            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_email'] = $usuario['email'];

            header("Location: cuenta.php");
            exit();

        } else {
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        header("Location: login.php?error=2");
        exit();
    }
}
?>

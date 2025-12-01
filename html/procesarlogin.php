<?php
session_start();
include("conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['contrasena'];
    $query = "SELECT id_usuario, contrasena, nombre, email, rol FROM usuarios WHERE email = ?";
    
    $cons = $conexion->prepare($query);
    $cons->bind_param("s", $email);
        if (!$cons->execute()) {
        die("Error al ejecutar la consulta: " . $cons->error);
    }
    $resultado = $cons->get_result();
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($password, $usuario['contrasena'])) {
            
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['rol'] = $usuario['rol']; 

            if (isset($_SESSION['guest_token'])) {
                $guest_token = $_SESSION['guest_token'];
                $id_usuario = $_SESSION['usuario_id'];
                
                $sql_transfer = "INSERT INTO carritocompras (id_usuario, id_producto, cantidad_carrito) SELECT ?, id_producto, cantidad_carrito FROM carrito_temp WHERE guest_token = ?";
                $stmt_transfer = $conexion->prepare($sql_transfer);
                $stmt_transfer->bind_param("is", $id_usuario, $guest_token);
                $stmt_transfer->execute();

                $sql_delete = "DELETE FROM carrito_temp WHERE guest_token = ?";
                $stmt_delete = $conexion->prepare($sql_delete);
                $stmt_delete->bind_param("s", $guest_token);
                $stmt_delete->execute();

                unset($_SESSION['guest_token']); 
            }
            
            if ($_SESSION['rol'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: cuenta.php");
            }
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
<?php
session_start();
include("conexion.php");
if (isset($_GET['id']) && isset($_GET['cantidad'])) {
    $id_producto = $_GET['id']; 
    $cantidad = $_GET['cantidad']; 

    if (isset($_SESSION['usuario_id'])) {//si esta logeado id
        $id_usuario = $_SESSION['usuario_id'];
        $guest_token = null; 
    } else {
        if (!isset($_SESSION['guest_token'])) {//si no esta logeado token
            $_SESSION['guest_token'] = bin2hex(random_bytes(16)); 
        }
        $guest_token = $_SESSION['guest_token'];
        $id_usuario = null; 
    }
    //checa el stock y si hay o no disponible
    $query_stock = "SELECT cantidad_stock, nombre_producto, precio FROM productos WHERE id_producto = ?";
    $stock = $conexion->prepare($query_stock);
    $stock->bind_param("i", $id_producto);
    $stock->execute();
    $producto = $stock->get_result()->fetch_assoc();

    if ($producto['cantidad_stock'] < $cantidad) { //lo que hay en stock es menor a lo queel usuario quiere agregar
        $_SESSION['error'] = "No hay suficiente stock para este producto. Solo hay " . $producto['cantidad_stock'] . " unidades disponibles.";
        header("Location: carrito.php"); 
        exit();
    }

    if ($id_usuario) { //busca si el producto ya esta en el carrito
        $query_log = "SELECT * FROM carritocompras WHERE id_usuario = ? AND id_producto = ?";
        $log = $conexion->prepare($query_log);
        $log->bind_param("ii", $id_usuario, $id_producto);
        $log->execute();
        $result_log = $log->get_result();

        if ($result_log->num_rows > 0) { //si ya esta se actualiza
            $sql_act = "UPDATE carritocompras SET cantidad_carrito = cantidad_carrito + ? WHERE id_usuario = ? AND id_producto = ?";
            $actualizar= $conexion->prepare($sql_act);
            $actualizar->bind_param("iii", $cantidad, $id_usuario, $id_producto);
            $actualizar->execute();
        } else {//si no esta se agrega
            $sql_ins = "INSERT INTO carritocompras (id_usuario, id_producto, cantidad_carrito) VALUES (?, ?, ?)";
            $insertar = $conexion->prepare($sql_ins);
            $insertar->bind_param("iii", $id_usuario, $id_producto, $cantidad);
            $insertar->execute();
        }
    } else {//guest user (no logeado)
        $query_nolog = "SELECT * FROM carrito_temp WHERE guest_token = ? AND id_producto = ?";
        $nolog = $conexion->prepare($query_nolog);
        $nolog->bind_param("si", $guest_token, $id_producto);
        $nolog->execute();
        $result_nolog = $nolog->get_result();

        if ($result_nolog->num_rows > 0) { //lo mismo pero con token en vez de id
            $sql_act = "UPDATE carrito_temp SET cantidad_carrito = cantidad_carrito + ? WHERE guest_token = ? AND id_producto = ?";
            $actualizar = $conexion->prepare($sql_act);
            $actualizar->bind_param("isi", $cantidad, $guest_token, $id_producto);
            $actualizar->execute();
        } else {
            $sql_ins = "INSERT INTO carrito_temp (id_producto, cantidad_carrito, guest_token) VALUES (?, ?, ?)";
            $insertar = $conexion->prepare($sql_ins);
            $insertar->bind_param("iis", $id_producto, $cantidad, $guest_token);
            $insertar->execute();
        }
    }
    header("Location: carrito.php");
    exit();
}
?>

<?php
session_start();
include("conexion.php");
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); 
    exit();
}

$id_usuario = $_SESSION['usuario_id']; //sesion
$query_user = "SELECT nombre, apellido, email, direccion, tarjeta_credito FROM usuarios WHERE id_usuario = ?";
$conUser = $conexion->prepare($query_user);
$conUser->bind_param("i", $id_usuario);
$conUser->execute();
$datos_usuario = $conUser->get_result()->fetch_assoc();

$productos_carrito = []; //para guardar 
$total_compra = 0;
$query_fetch = "SELECT c.id_producto, c.cantidad_carrito, p.nombre_producto, p.precio, p.cantidad_stock FROM carritocompras c JOIN productos p ON c.id_producto = p.id_producto WHERE c.id_usuario = ?"; //busca lo que pidio el usuario
$conCart = $conexion->prepare($query_fetch);
$conCart->bind_param("i", $id_usuario);
$conCart->execute();
$result = $conCart->get_result();

if ($result->num_rows > 0) { //verifica sie el carrito tiene productis y te manda el total
    while ($producto = $result->fetch_assoc()) {
        $articulo = [
            'id_producto' => $producto['id_producto'],
            'nombre' => $producto['nombre_producto'], 
            'cantidad' => $producto['cantidad_carrito'], 
            'precio' => $producto['precio']
        ];
        
        $productos_carrito[] = $articulo;
        $total_compra += $articulo['precio'] * $articulo['cantidad'];
    }
} else {
    header("Location: carrito.php?vacio=true");
    exit();
}

if (isset($_POST['completar_compra'])) {
    
    $conexion->begin_transaction(); 

        foreach ($productos_carrito as $producto) { 
            //resta el stcok
            $actualizar_bd = "UPDATE productos SET cantidad_stock = cantidad_stock - ? 
            WHERE id_producto = ? AND cantidad_stock >= ?";
            $actualizar = $conexion->prepare($actualizar_bd);
            $actualizar->bind_param("iii", $producto['cantidad'], $producto['id_producto'], $producto['cantidad']);
            $actualizar->execute();
            
            //se unserta en el historial de ocmpras
            $query_inhistorial = "INSERT INTO historialcompras (id_usuario, id_producto, cantidad, precio_total, fecha_compra)
                    VALUES (?, ?, ?, ?, NOW())";
            $cons = $conexion->prepare($query_inhistorial);
            $cons->bind_param("iiid", $id_usuario, $producto['id_producto'], $producto['cantidad'], $producto['precio']);
            $cons->execute();
        }
        //vaciar carrito
        $query_vaciar = "DELETE FROM carritocompras WHERE id_usuario = ?";
        $vaciar = $conexion->prepare($query_vaciar);
        $vaciar->bind_param("i", $id_usuario);
        $vaciar->execute();

        $conexion->commit();
        header("Location: compra_confirmada.php?total=$total_compra");
        exit();        
}
include("header.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



<div class="container table-responsive">
    <h1 class="py-3">Completar Compra</h1>
    <h3>Detalles de tu pedido</h3>
    <p><strong>Nombre:</strong> <?php echo $datos_usuario['nombre'] . " " . $datos_usuario['apellido']; ?></p>
    <p><strong>Dirección:</strong> <?php echo $datos_usuario['direccion']; ?></p>
    <p><strong>Tarjeta de Crédito:</strong> <?php echo "**** **** **** " . substr($datos_usuario['tarjeta_credito'], -4); ?></p>
    <br>

    <h4>Productos en el carrito</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos_carrito as $producto): ?>
            <tr>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['cantidad']; ?></td>
                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                <td>$<?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Total: $<?php echo number_format($total_compra, 2); ?></h4>

    <form method="POST" action="checkout.php">
        <button type="submit" name="completar_compra" class="btn btn-dark mt-4">Confirmar Compra</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
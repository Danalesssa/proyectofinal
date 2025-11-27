<?php
session_start();
include("conexion.php");
$result = null;
//si el user esta logeado usa carritocompras, si no usa carrito_temp
if (isset($_SESSION['usuario_id']) || isset($_SESSION['guest_token'])) {
    $esta_login = isset($_SESSION['usuario_id']);
    $cartid = $esta_login ? $_SESSION['usuario_id'] : $_SESSION['guest_token'];
    $colum_busq = $esta_login ? 'id_usuario' : 'guest_token';
    $tabla = $esta_login ? 'carritocompras' : 'carrito_temp';
    $bind_type = $esta_login ? 'i' : 's';
    
    $accion = false;

    //para borrar un producto del carrito
    if (isset($_POST['borrar_producto'])) {
        $id_producto = $_POST['id_producto'];

        $query_borrar = "DELETE FROM $tabla WHERE $colum_busq = ? AND id_producto = ?";
        $borrar = $conexion->prepare($query_borrar);
        $bind_params = $bind_type . 'i';
        $borrar->bind_param($bind_params, $cartid, $id_producto);
        $borrar->execute();
        $accion = true;
    }
    //para modificar el carrito
    if (isset($_POST['modificar_carrito'])) {
        $id_producto = $_POST['id_producto'];
        $nueva_cantidad = $_POST['cantidad'];

        $query_mod = "SELECT cantidad_stock FROM productos WHERE id_producto = ?";
        $modif = $conexion->prepare($query_mod);
        $modif->bind_param("i", $id_producto);
        $modif->execute();
        $producto = $modif->get_result()->fetch_assoc();

        //checa el stock
        if ($producto['cantidad_stock'] < $nueva_cantidad) {
            $_SESSION['error'] = "No hay suficiente stock. Solo hay " . $producto['cantidad_stock'] . " unidades disponibles.";
        } else {
            $query_act = "UPDATE $tabla SET cantidad_carrito = ? WHERE $colum_busq = ? AND id_producto = ?";
            $actualizar = $conexion->prepare($query_act);
            $bind_params = 'i' . $bind_type . 'i'; 
            $actualizar->bind_param($bind_params, $nueva_cantidad, $cartid, $id_producto);
            $actualizar->execute();
            $accion = true;
        }
    }
    // para vaciar el carrito
    if (isset($_POST['vaciar_carrito'])) {
        $query_vaciar = "DELETE FROM $tabla WHERE $colum_busq = ?";
        $vaciar = $conexion->prepare($query_vaciar);
        $vaciar->bind_param($bind_type, $cartid);
        $vaciar->execute();
        $accion = true;
    }
    
    if ($accion) {
        header("Location: carrito.php");
        exit();
    }
}


//si esta logeado hace la consulta en carritocompras
if (isset($_SESSION['usuario_id'])) {
    $id_usuario = $_SESSION['usuario_id'];
    $query_cartlog = "SELECT c.id_producto, c.cantidad_carrito, p.nombre_producto, p.precio, p.cantidad_stock FROM carritocompras c JOIN productos p ON c.id_producto = p.id_producto WHERE c.id_usuario = ?";
    $cartlog = $conexion->prepare($query_cartlog);
    $cartlog->bind_param("i", $id_usuario);
    $cartlog->execute();
    $result = $cartlog->get_result();
//si no, la hace en carrito_temp
} elseif (isset($_SESSION['guest_token'])) {
    $guest_token = $_SESSION['guest_token'];
    $query_cartnolog = "SELECT c.id_producto, c.cantidad_carrito, p.nombre_producto, p.precio, p.cantidad_stock FROM carrito_temp c JOIN productos p ON c.id_producto = p.id_producto WHERE c.guest_token = ?";
    $cartnolog = $conexion->prepare($query_cartnolog);
    $cartnolog->bind_param("s", $guest_token);
    $cartnolog->execute();
    $result = $cartnolog->get_result();
}
//mensaje de error
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); 
}

include("header.php");
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-white">
    <?php if (isset($_SESSION['error_compra'])): ?>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">¡Error al confirmar la compra!</h4>
            <p><?php echo htmlspecialchars($_SESSION['error_compra']); ?></p>
            <hr>
            <p class="mb-0">Por favor, ajusta las cantidades o revisa el stock antes de intentar la compra nuevamente.</p>
        </div>
    </div>
    <?php unset($_SESSION['error_compra']); ?>
<?php endif; ?>
    <div class="container mt-5">
        <h1>Tu carrito</h1>

        <div class="card mb-4" style="max-width: 600px;">
            <div class="card-header bg-primary text-white">Los productos que elegiste:</div>
            <div class="card-body">
                <?php if (isset($result) && $result->num_rows > 0): ?>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total = 0;
                            while ($producto = $result->fetch_assoc()):
                                $total += $producto['precio'] * $producto['cantidad_carrito'];
                            ?>
                            <tr>
                                <td><?php echo $producto['nombre_producto']; ?></td>
                                <td>
                                    <form method="POST" action="carrito.php">
                                        <input type="number" name="cantidad" class="form-control" value="<?php echo $producto['cantidad_carrito']; ?>" min="1">
                                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                        <button type="submit" name="modificar_carrito" class="btn btn-warning mt-2">Modificar</button>
                                    </form>
                                </td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td>$<?php echo number_format($producto['precio'] * $producto['cantidad_carrito'], 2); ?></td>
                                <td>
                                    <form method="POST" action="carrito.php">
                                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                        <button type="submit" name="borrar_producto" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <h3>Total: $<?php echo number_format($total, 2); ?></h3>

            <div class="d-flex gap-2">
                <form method="POST" action="carrito.php" class="mt-3">
                    <button type="submit" name="vaciar_carrito" class="btn btn-dark">Vaciar carrito</button>
                </form>

                <form method="POST" action="checkout.php" class="mt-3">
                    <button type="submit" class="btn btn-dark">Completar compra</button>
                </form>
            </div>
        <?php else: ?>
            <p class="text-muted">Tu carrito está vacío.</p>
        <?php endif; ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


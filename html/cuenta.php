<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
include("conexion.php");

$id_usuario = $_SESSION['usuario_id'];

$query_user = "SELECT nombre, apellido, email, fecha_nacimiento, direccion, tarjeta_credito FROM usuarios WHERE id_usuario = ?";
$conUser = $conexion->prepare($query_user);
$conUser->bind_param("i", $id_usuario);
$conUser->execute();
$datos_usuario = $conUser->get_result()->fetch_assoc();
$tarjeta = $datos_usuario['tarjeta_credito'];
$tarjeta_oculta = "**** **** **** " . substr($tarjeta, -4);

$query_compras = "
    SELECT h.id_compra, p.nombre_producto, h.cantidad, h.precio_total, h.fecha_compra 
    FROM historialcompras h
    INNER JOIN productos p ON h.id_producto = p.id_producto
    WHERE h.id_usuario = ?
    ORDER BY h.fecha_compra DESC
";
$conCompras = $conexion->prepare($query_compras);
$conCompras->bind_param("i", $id_usuario);
$conCompras->execute();
$datos_compras = $conCompras->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
</head>
<?php
include("header.php");
?>
<body>
<div class="container mt-5">
    <h1>Hola, <?php echo $datos_usuario['nombre']; ?></h1>
    <p>Bienvenido/a a tu cuenta.</p>

    <div class="card mb-4" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">Información de tu cuenta</div>
        <div class="card-body">
            <p><strong>Nombre:</strong> <?php echo $datos_usuario['nombre'] . " " . $datos_usuario['apellido']; ?></p>
            <p><strong>Email:</strong> <?php echo $datos_usuario['email']; ?></p>
            <p><strong>Fecha de nacimiento:</strong> <?php echo $datos_usuario['fecha_nacimiento']; ?></p>
            <p><strong>Dirección:</strong> <?php echo $datos_usuario['direccion']; ?></p>
            <p><strong>Método de Pago:</strong> <?= $tarjeta_oculta ?></p>
        </div>
    </div>

    <div class="card mb-4"  style="max-width: 600px;">
        <div class="card-header bg-primary text-white">Historial de compras</div>
        <div class="card-body table-responsive">

            <?php if ($datos_compras->num_rows > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($compra = $datos_compras->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $compra['nombre_producto']; ?></td>
                                <td><?php echo $compra['cantidad']; ?></td>
                                <td>$<?php echo number_format($compra['precio_total'], 2); ?></td>
                                <td><?php echo $compra['fecha_compra']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted">Aún no has comprado nada.</p>
            <?php endif; ?>
        </div>
    </div>
    <a href="logout.php" class="btn btn-dark mb-5">Cerrar sesión</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

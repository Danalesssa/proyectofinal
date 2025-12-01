<?php
session_start();
include("conexion.php");
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$ventas = [];
$query_historial = "
    SELECT 
        h.id_compra,
        h.fecha_compra,
        u.nombre AS nombre_usuario,
        p.nombre_producto,
        h.cantidad,
        (h.precio_total * h.cantidad) AS subtotal
    FROM historialcompras h
    JOIN usuarios u ON h.id_usuario = u.id_usuario
    JOIN productos p ON h.id_producto = p.id_producto
    ORDER BY h.fecha_compra DESC
";

$historial = $conexion->prepare($query_historial);
$historial->execute();
$result = $historial->get_result();
while ($row = $result->fetch_assoc()) {
    $ventas[] = $row;
}

include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
    <a href="admin.php" class="btn btn-dark mb-4">Volver al Panel</a>
    <h1 class="mb-4 text-primary">Historial de Ventas</h1>
    <h2 class="mb-4">Detalle de Transacciones: <?php echo count($ventas); ?> Registros</h2>

    <div class="card mb-5 table-responsive"  style="max-width: 1500px;">
        <table class="table">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($ventas)): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">No se encontraron ventas registradas.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?php echo $venta['id_compra']; ?></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($venta['fecha_compra'])); ?></td>
                        <td><?php echo htmlspecialchars($venta['nombre_usuario']); ?></td>
                        <td><?php echo htmlspecialchars($venta['nombre_producto']); ?></td>
                        <td><?php echo $venta['cantidad']; ?></td>
                        <td>$<?php echo number_format($venta['subtotal'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
$conexion->close();
?>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
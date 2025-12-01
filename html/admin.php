<?php
session_start();
include("conexion.php");
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: index.php"); 
    exit();
}

$reporte_productos = [];

    $sql_reporte = "SELECT COUNT(*) as total_productos, SUM(cantidad_stock) as stock_total FROM productos";
    $stmt_reporte = $conexion->prepare($sql_reporte);
    $stmt_reporte->execute();
    $reporte_productos = $stmt_reporte->get_result()->fetch_assoc();

include("header.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <h1>Panel de Administración</h1>
    <p>Solo autorizados de administración</p>
    <div class="card mb-4" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">Cantidad de productos distintos</div>
        <div class="card-body">
            <p class="card-text fs-1 fw-bold"><?php echo number_format($reporte_productos['total_productos']); ?></p>
            <small>Total de artículos únicos en el catálogo.</small>
        </div>
    </div>

    <div class="card mb-4" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">Unidades totales en stock</div>
        <div class="card-body">
                    <p class="card-text fs-1 fw-bold"><?php echo number_format($reporte_productos['stock_total']); ?></p>
                    <small>Suma de todas las unidades disponibles.</small>
        </div>
    </div>


    <div class="card mb-4" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">Herramientas de gestión</div>
        <div class="card-body">

        <a href="gestion_productos.php" class="btn btn-dark text-start py-2 rounded-3 mb-3">
                    <span class="fw-bold text-white">Gestión de Inventario</span>
                    <small class="text-light d-block">Agregar, editar y modificar stock</small>
        </a>
        <a href="historial_admin.php" class="btn btn-dark text-start py-2 rounded-3 mb-3">
                    <span class="fw-bold text-white">Historial de Compras (Ventas)</span>
                    <small class="text-light d-block">Revisar todas las transacciones de clientes</small>
        </a>
        <a href="logout.php" class="btn btn-dark text-start py-2 rounded-3 mb-3">
                    <span class="fw-bold text-white">Cerrar Sesión</span>
                    <small class="d-block text-light">Salir de la sesión de administrador</small>
        </a>
    </div>
</div>

<?php 
$conexion->close();
?>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
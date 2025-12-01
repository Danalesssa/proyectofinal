<?php
session_start();
include("conexion.php");
include("header.php");

$termino_busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$termino_busqueda = $conexion->real_escape_string($termino_busqueda);
if (!empty($termino_busqueda)) {
    $query = "
        SELECT * FROM productos 
        WHERE nombre_producto LIKE '%$termino_busqueda%' 
        OR fabricante LIKE '%$termino_busqueda%' 
        OR categoria LIKE '%$termino_busqueda%';
    ";

    $resultado = $conexion->query($query);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container mt-5">
        <h1>Resultados de Búsqueda</h1>
        
        <?php if ($resultado->num_rows > 0): ?>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <?php while ($producto = $resultado->fetch_assoc()): ?>
                    <div class="col">
                        <div class="product-item">
                            <figure>
                                <img src="images/<?php echo $producto['imagen']; ?>" class="tab-image">
                            </figure>
                            <h3><?php echo $producto['nombre_producto']; ?></h3>
                            <span class="price">$<?php echo number_format($producto['precio'], 2); ?></span>
                            <a href="agregar_carrito.php?id=<?php echo $producto['id_producto']; ?>&cantidad=1" class="btn btn-dark w-100 mt-2">Agregar al carrito</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No se encontraron resultados para "<?php echo $termino_busqueda; ?>".</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

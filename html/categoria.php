<?php
include("conexion.php");

// Leer la categoría desde la URL
$categoria = $_GET['tipo'] ?? '';

// Consulta a la BD
$query = "SELECT * FROM productos WHERE categoria = '$categoria'";
$resultado = $conexion->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- TEMPLATE CSS -->
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Sublime</title>
</head>

<body>


<body>

<?php include("header.php"); ?> 

<section class="py-5">
    <div class="container-fluid">

        <h2 class="section-title mb-4"><?= strtoupper($categoria) ?></h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php while ($producto = $resultado->fetch_assoc()): ?>
            <div class="col">
                <div class="product-item">
                    <figure>
                        <img src="images/<?= $producto['imagen'] ?>" class="tab-image">
                    </figure>

                    <h3><?= $producto['nombre_producto'] ?></h3>
                    <span class="price">$<?= number_format($producto['precio'], 2) ?></span>

                    <a href="agregar_carrito.php?id=<?= $producto['id_producto'] ?>"
                    class="btn btn-dark w-100 mt-2">Agregar al carrito</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

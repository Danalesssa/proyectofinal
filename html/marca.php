<?php
include("header.php");
include("conexion.php");

$marca = $_GET['nombre'];
$query = "SELECT * FROM productos WHERE fabricante = '$marca'";
$resultado = $conexion->query($query);

$logos = [
    'Fenty Beauty' => 'fenty.png',
    'Too Faced' => 'toofaced.png',
    'Rare Beauty' => 'rare.png',
    'Glossier' => 'glossier.png',
    'Benefit' => 'benefit.png',
    'Patrick Ta' => 'patrickta.png',
    'Huda Beauty' => 'huda.png',
    'Charlotte Tilbury' => 'tilbury.png',
    'Laura Mercier' => 'mercier.png',
    'Clinique' => 'clinique.png'
];
$logoMarca = $logos[$marca];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $marca; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sublime</title>
</head>
<body>

<section class="py-5 text-center">
<img src="images/<?php echo $logoMarca; ?>" style="max-height: 100px; margin-bottom: 40px;">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php while ($producto = $resultado->fetch_assoc()): ?>
            <div class="col">
                <div class="product-item">
                    <figure>
                        <img src="images/<?php echo $producto['imagen']; ?>" class="tab-image">
                    </figure>
                    <h3><?php echo $producto['nombre_producto']; ?></h3>
                    <span class="price">$<?php echo number_format($producto['precio'], 2); ?></span>
                    <a href="agregar_carrito.php?id=<?php echo $producto['id_producto']; ?>" class="btn btn-dark w-100 mt-auto">Agregar al carrito
                    </a>
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

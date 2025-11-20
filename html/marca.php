<?php
include("conexion.php");

$marca = $_GET['nombre'] ?? '';

$marca = $conexion->real_escape_string($marca);

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

$logoMarca = $logos[$marca] ?? 'default_logo.png';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $marca; ?></title>
    <link rel="stylesheet" href="style.css">
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

<?php include("header.php"); ?>

<section class="py-5 text-center">
    <img src="images/<?php echo $logoMarca; ?>" style="max-height: 130px;">
</section>

<section class="py-5">
    <div class="container-fluid">
        <div class="row g-4">

            <?php while ($producto = $resultado->fetch_assoc()): ?>
            <div class="col-md-3">
                <div class="product-item">
                    <figure>
                        <img src="images/<?php echo $producto['imagen']; ?>" class="img-fluid">
                    </figure>

                    <h3><?php echo $producto['nombre_producto']; ?></h3>

                    <span class="price">$<?php echo number_format($producto['precio'], 2); ?></span>

                    <a href="agregar_carrito.php?id=<?php echo $producto['id_producto']; ?>" class="btn btn-dark w-100 mt-2">
                        Agregar al carrito
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

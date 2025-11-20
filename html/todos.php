<?php
include("conexion.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sublime MakeUp Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">


</head>
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Todos los Productos</h2>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

            <?php
            $query = "SELECT * FROM productos";
            $resultado = $conexion->query($query);

            while ($producto = $resultado->fetch_assoc()):
            ?>

                <div class="col">
                    <div class="product-item">
                        <figure>
                            <img src="images/<?php echo $producto['imagen']; ?>" class="tab-image">
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


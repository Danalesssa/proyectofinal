<?php
//conexión a la bd
include("conexion.php"); 
include("header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huda Beauty</title>

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos del template -->
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


<!-- productos -->
<section class="py-5">
    <div class="container-fluid">
        <div class="brand-banner text-center my-4">
        <img src="images/huda.png" alt="Huda Beauty" class="brand-logo">
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

            <?php
            // consulta bd
            $query = "SELECT * FROM productos WHERE fabricante='Huda Beauty'";
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

</body>
</html>

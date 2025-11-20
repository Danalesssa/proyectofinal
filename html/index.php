<?php
include("conexion.php"); 
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
<body>
<?php
include("header.php");
?>

<!--banners-->

<section class="py-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="banner-blocks">

                    <!-- banner1 -->
                    <div class="banner-ad large bg-info block-1">
                        <div class="swiper main-swiper">
                            <div class="swiper-wrapper">

                                <!-- slide1-->
                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">NUEVO</div>
                                            <h3 class="display-4">Born This Way Foundation</h3>
                                            <p>Acabado natural con cobertura media-alta. Elige tu tono ideal.</p>
                                            <a href="agregar_carrito.php?id=10" class="btn btn-banner btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Comprar ahora</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="images/bornthisway.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <!-- slide2 -->
                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">TENDENCIA</div>
                                            <h3 class="display-4">Rare Beauty Soft Pinch Blush</h3>
                                            <p>El rubor líquido más viral. Natural, pigmentado y duradero.</p>
                                            <a href="rarebeauty.php" class="btn btn-banner btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Ver marca</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="images/softpinch.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <!-- slide3 -->
                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">COLECCIÓN</div>
                                            <h3 class="display-4">Paletas Huda Beauty</h3>
                                            <p>Sombras altamente pigmentadas para cualquier look.</p>
                                            <a href="categoria.php?tipo=Sombras" class="btn btn-banner btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Explorar paletas</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="images/wildhuda.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                            </div> 

                            <div class="swiper-pagination"></div>
                        </div> 
                    </div> 


                    <!--banner2-->
                    <div class="banner-ad bg-success-subtle block-2 fenty-banner">
                        <div class="row banner-content p-5">
                            <div class="content-wrapper col-md-7">
                                <div class="categories sale mb-3 pb-3">COLECCIÓN</div>
                                <h3 class="banner-title">Labiales Fenty Beauty</h3>
                                <a href="fenty.php" class="d-flex align-items-center nav-link">
                                    Ver Fenty Beauty
                                    <svg width="24" height="24" class="ms-1"></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--banner3 -->
                    <div class="banner-ad bg-success-subtle block-3 chart-banner">
                        <div class="row banner-content p-5">
                            <div class="content-wrapper col-md-7">
                                <div class="categories sale mb-3 pb-3">TENDENCIA</div>
                                <h3 class="item-title">Charlotte Tilbury Nude Palette</h3>
                                <a href="tilbury.php" class="d-flex align-items-center nav-link">
                                    Ver Charlotte Tilbury
                                    <svg width="24" height="24" class="ms-1"></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>


<!--categorias maquillaje-->
<section class="py-5">
    <div class="container-fluid">
        <div class="section-header d-flex justify-content-between mb-4">
            <h2 class="section-title">Categorías de maquillaje</h2>
        </div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 row-cols-lg-6 g-3">

        <?php
        $categorias = ["Labiales","Sombras","Bases","Corrector","Polvos", "Rubor","Rímel","Delineador","Iluminador","Brochas","Bronzer","Para Cejas"];
        foreach ($categorias as $cat):
        ?>

    <div class="col">
        <a href="categoria.php?tipo=<?= urlencode($cat) ?>" 
        class="card text-center border-0 shadow-sm h-100 text-decoration-none">
        <div class="card-body">
            <img src="images/icon-<?= strtolower($cat) ?>.png" class="mb-3" style="max-height:70px;">
            <h6 class="fw-semibold"><?= $cat ?></h6>
        </div>
        </a>
    </div>
    <?php endforeach; ?>
</section>


<!--todos los productso-->

<section class="py-5">
    <div class="container-fluid">
        <div class="section-header d-flex justify-content-between mb-4">
            <h2 class="section-title">Productos de Maquillaje</h2>
        </div>
        <div class="text-end ver-todos-container">
        <a href="todos.php" class="ver-todos-link">
        Ver todos <span>&rarr;</span>
        </a>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            $query = "SELECT * FROM productos LIMIT 8";
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

<script>
    new Swiper(".main-swiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
</body>
</html>

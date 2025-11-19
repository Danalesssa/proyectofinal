<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BeautyMart - Maquillaje</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos del template -->
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<!--HEADER + NAVBAR-->

<header class="border-bottom">
    <div class="container-fluid py-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between">

            <!-- LOGO -->
            <a href="index.php" class="d-flex align-items-center text-decoration-none">
                <img src="images/logo.png" alt="logo" height="45">
            </a>

            <!-- BUSCADOR -->
            <form class="flex-grow-1 mx-3">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Buscar productos, tonos o marcas...">
                    <button class="btn btn-dark">Buscar</button>
                </div>
            </form>

            <!-- ICONOS -->
            <div class="d-flex align-items-center gap-2">

                <!-- LOGIN -->
                <a href="login.php" class="btn btn-outline-secondary d-flex align-items-center justify-content-center">
                    <img src="images/login.png" alt="Login" class="header-icon">
                </a>

                <!-- FAVORITOS -->
                <a href="favoritos.php" class="btn btn-outline-secondary d-flex align-items-center justify-content-center">
                    <img src="images/corazon.png" alt="Favoritos" class="header-icon">
                </a>

                <!-- CARRITO -->
                <a href="cart.php" class="btn btn-outline-secondary d-flex align-items-center justify-content-center">
                    <img src="images/carrito.png" alt="Carrito" class="header-icon">
                </a>

            </div>
        </div>
    </div>
</header>


    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Inicio</a>
                    </li>

                    <!-- Dropdown marcas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Marcas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Fenty</a></li>
                            <li><a class="dropdown-item" href="#">Too Faced</a></li>
                            <li><a class="dropdown-item" href="#">Rare Beauty</a></li>
                            <li><a class="dropdown-item" href="#">Glossier</a></li>
                            <li><a class="dropdown-item" href="#">Benefit</a></li>
                            <li><a class="dropdown-item" href="#">Patrick Ta</a></li>
                            <li><a class="dropdown-item" href="#">Huda Beauty</a></li>
                            <li><a class="dropdown-item" href="#">Charlotte Tilbury</a></li>
                            <li><a class="dropdown-item" href="#">Laura Mercier</a></li>
                            <li><a class="dropdown-item" href="#">Clinique</a></li>
                        </ul>
                    </li>
                </ul>

                <span class="text-muted small">Envíos a todo México</span>
            </div>
        </div>
    </nav>
</header>

<!--  BANNER PRINCIPAL  -->

<section class="py-3" style="background-image: url('images/background-pattern.jpg');background-repeat: no-repeat;background-size: cover;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- ===== GRID DE 3 BLOQUES ===== -->
                <div class="banner-blocks">

                    <!--  BANNER PRINCIPAL  -->
                    <div class="banner-ad large bg-info block-1">
                        <div class="swiper main-swiper">
                            <div class="swiper-wrapper">

                                <!-- SLIDE 1 -->
                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">NUEVO</div>
                                            <h3 class="display-4">Born This Way Foundation</h3>
                                            <p>Acabado natural con cobertura media-alta. Elige tu tono ideal.</p>
                                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Comprar ahora</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="images/bornthisway.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <!-- SLIDE 2 -->
                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">TENDENCIA</div>
                                            <h3 class="display-4">Rare Beauty Soft Pinch Blush</h3>
                                            <p>El rubor líquido más viral. Natural, pigmentado y duradero.</p>
                                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Ver tonos</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="images/softpinch.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <!-- SLIDE 3 -->
                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">COLECCIÓN</div>
                                            <h3 class="display-4">Paletas Huda Beauty</h3>
                                            <p>Sombras altamente pigmentadas para cualquier look.</p>
                                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Explorar paletas</a>
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

<!-- Banner 1-->
<div class="banner-ad bg-success-subtle block-2 fenty-banner">
    <div class="row banner-content p-5">
        <div class="content-wrapper col-md-7">
            <div class="categories sale mb-3 pb-3">COLECCIÓN</div>
            <h3 class="banner-title">Labiales Fenty Beauty</h3>
            <a href="#" class="d-flex align-items-center nav-link">Ver colección
                <svg width="24" height="24" class="ms-1"><use xlink:href="#arrow-right"></use></svg>
            </a>
        </div>
    </div>
</div>

<!-- Banner 2 -->
<div class="banner-ad bg-success-subtle block-3 chart-banner">
    <div class="row banner-content p-5">
        <div class="content-wrapper col-md-7">
            <div class="categories sale mb-3 pb-3">TENDENCIA</div>
            <h3 class="item-title">Charlotte Tilbury Nude Palette</h3>
            <a href="#" class="d-flex align-items-center nav-link">Ver tonos
                <svg width="24" height="24" class="ms-1"><use xlink:href="#arrow-right"></use></svg>
            </a>
        </div>
    </div>
</div>

                </div> 

            </div>
        </div>
    </div>
</section>



<!--CATEGORÍAS DE MAQUILLAJE-->

<section class="py-5">
    <div class="container-fluid">

        <div class="section-header d-flex justify-content-between mb-4">
            <h2 class="section-title">Categorías de maquillaje</h2>
            <a href="#" class="btn-link">Ver todas →</a>
        </div>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 row-cols-lg-6 g-3">

            <?php
            $categorias = [
                "Labiales","Sombras","Bases","Corrector","Polvos",
                "Rubor","Rímel","Delineador","Iluminador","Brochas", "Bronzer", "Para Cejas"
            ];
            foreach ($categorias as $cat):
            ?>
            <div class="col">
                <a href="#" class="card text-center border-0 shadow-sm h-100 text-decoration-none">
                    <div class="card-body">
                        <img src="images/icon-<?= strtolower($cat) ?>.png" class="mb-3" style="max-height:70px;">
                        <h6 class="fw-semibold"><?= $cat ?></h6>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>


<!--PRODUCTOS (DINÁMICO O NO)-->

<section class="py-5">
    <div class="container-fluid">
        <div class="section-header d-flex justify-content-between mb-4">
            <h2 class="section-title">Productos de maquillaje</h2>
            <a href="#" class="btn-link">Ver todo →</a>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

            <div class="col">
                <div class="product-item">
                    <figure>
                        <img src="images/fentyfilter.png" class="tab-image">
                    </figure>
                    <h3>Fenty Pro Filt'r Foundation</h3>
                    <span class="price">$780.00</span>
                    <a href="#" class="btn btn-dark w-100 mt-2">Agregar al carrito</a>
                </div>
            </div>

            <div class="col">
                <div class="product-item">
                    <figure>
                        <img src="images/softpinch.png" class="tab-image">
                    </figure>
                    <h3>Rare Beauty Soft Pinch Blush</h3>
                    <span class="price">$610.00</span>
                    <a href="#" class="btn btn-dark w-100 mt-2">Agregar al carrito</a>
                </div>
            </div>

            <div class="col">
                <div class="product-item">
                    <figure>
                        <img src="images/hudanude.png" class="tab-image">
                    </figure>
                    <h3>Huda Beauty Nude Palette</h3>
                    <span class="price">$890.00</span>
                    <a href="#" class="btn btn-dark w-100 mt-2">Agregar al carrito</a>
                </div>
            </div>

        </div>
    </div>
</section>


<footer class="py-4 bg-light border-top text-center text-muted">
    <p class="mb-0">© 2025 BeautyMart · Sublime</p>
</footer>


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

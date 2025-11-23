<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="border-bottom">
    <div class="container-fluid py-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="index.php" class="d-flex align-items-center text-decoration-none">
                <img src="images/logo.png">
            </a>
            <form class="flex-grow-1 mx-3 header-search">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Buscar productos...">
                    <button class="btn buscar-btn">Buscar</button>
                </div>
            </form>
            <div class="header-center">
                <span id="promo-text">10% DE DESCUENTO EN TU PRIMERA COMPRA</span>
            </div>

            <div class="d-flex align-items-center gap-2">
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <a href="cuenta.php" class="header-icon-btn d-flex align-items-center justify-content-center">
                        <span class="ms-2">Mi cuenta</span>
                    </a>
                <?php else: ?>
                    <a href="login.php" class="header-icon-btn d-flex align-items-center justify-content-center">
                        <span class="ms-2">Iniciar sesión</span>
                    </a>
                <?php endif; ?>
                <a href="favoritos.php" class="header-icon-btn d-flex align-items-center justify-content-center">
                    <img src="images/corazon.png" class="header-icon">
                </a>
                <a href="carrito.php" class="header-icon-btn d-flex align-items-center justify-content-center">
                    <img src="images/carrito.png" class="header-icon">
                </a>
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button"></button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
                <a class="nav-link" href="index.php">Inicio</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Marcas</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="marca.php?nombre=Fenty Beauty">Fenty Beauty</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Too Faced">Too Faced</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Rare Beauty">Rare Beauty</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Glossier">Glossier</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Benefit">Benefit</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Patrick Ta">Patrick Ta</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Huda Beauty">Huda Beauty</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Charlotte Tilbury">Charlotte Tilbury</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Laura Mercier">Laura Mercier</a></li>
                        <li><a class="dropdown-item" href="marca.php?nombre=Clinique">Clinique</a></li>
                    </ul>
                </li>
            </ul>
            <span class="text-muted small">Envíos a todo México</span>
        </div>
    </div>
</nav>

<script>
const frases = [
    "10% DE DESCUENTO EN TU PRIMERA COMPRA",
    "REGALO EN COMPRAS MAYORES A $999",
    "ENVÍOS A TODO MÉXICO",
    "NUEVAS COLECCIONES CADA SEMANA",
    "PRODUCTOS 100% ORIGINALES"
];

let indice = 0;

setInterval(() => {
    indice = (indice + 1) % frases.length;
    
    const promo = document.getElementById("promo-text");
    promo.style.opacity = 0;

    setTimeout(() => {
        promo.textContent = frases[indice];
        promo.style.opacity = 1;
    }, 300);

}, 3500);
</script>

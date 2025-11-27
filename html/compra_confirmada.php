<?php
session_start();
if (!isset($_GET['total'])) {
    header("Location: carrito.php");
    exit();
}

$total_compra = $_GET['total'];
include("header.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Confirmada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-primary text-center" style="color: white;">
                    <h2 class="texto-blanco mt-3">Gracias por tu compra</h2>
                </div>
                <div class="card-body text-center">
                    <p class="lead">El cargo a tu tarjeta fue realizado con éxito</p>
                    <p class="lead">En breve recibirás tu pedido</p>
                    <p>El total de tu compra es:</p>
                    <h3 class="display-4 text-primary">$<?php echo number_format($total_compra, 2); ?></h3>
                    <a href="index.php" class="btn btn-primary btn-no-border btn-lg mt-4">Volver al inicio</a>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

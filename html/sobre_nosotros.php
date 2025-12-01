<?php 
include("header.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
    <style>
        :root {
            --sublime-pink: #D83C8B;
            --sublime-purple: #6D0D32;
        }
        .text-sublime-pink { color: var(--sublime-pink)}
        .text-sublime-purple { color: var(--sublime-purple)}
        .bg-sublime-purple { background-color: var(--sublime-pink)}
        .btn-sublime-pink {
            background-color: var(--sublime-pink);
            color: white;
        }
    </style>
</head>

<body class="bg-light">
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="display-4 fw-bold mb-4 text-sublime-pink">SUBLIME</h1>
            <p class="lead">Sublime es una empresa distribuidora de cosméticos mexicana con la misión de llevar productos de calidad a cada rincón del país.</p>
            <p class="lead">Nuestro catálogo se compone de marcas de alta gama seleccionadas, priorizando aquellas con ingredientes naturales y procesos éticos.</p>

            <div class="row mt-5">
                <div class="col-md-6 mb-3">
                    <h3 class="h5 text-sublime-purple fw-bold">Misión</h3>
                    <p>Ser el puente entre los mejores fabricantes de cosméticos nacionales e internacionales y nuestros clientes.</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h3 class="h5 text-sublime-purple fw-bold">Valores</h3>
                    <ul>
                        <li>La Mejor Calidad</li>
                        <li>Transparencia y Honestidad</li>
                        <li>Apoyo a los Productos Nacionales</li>
                    </ul>
                </div>
            </div>

        </div>
        
        <div class="col-lg-4">
            <div class="card shadow-lg bg-white" style="height:350px;">
                <div class="card-header bg-sublime-purple text-white fw-bold">Contacto y Soporte</div>
                <div class="card-body">
                    <h4 class="h6 fw-bold mt-3 text-sublime-purple">Llámanos</h4>
                    <p class="card-text">
                        <i class="fas fa-phone-alt me-2 text-sublime-pink"></i> <a class="text-decoration-none text-sublime-purple">(+52) 55 5555 5555</a>
                    </p>

                    <h4 class="h6 fw-bold mt-3 text-sublime-purple">Email</h4>
                    <p class="card-text">
                        <i class="fas fa-envelope me-2 text-sublime-pink"></i> <a href="mailto:contacto@sublime.mx" class="text-decoration-none text-sublime-purple">contacto@sublime.mx</a>
                    </p>
                    <hr class="border-sublime-pink">
                    <h4 class="h6 fw-bold text-sublime-purple">Síguenos en Nuestras Redes Sociales</h4>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="https://facebook.com" class="btn btn-sublime-pink btn-sm me-2">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://instagram.com" class="btn btn-sublime-pink btn-sm me-2">
                            <i class="fab fa-instagram"></i>Instagram
                        </a>
                        <a href="https://twitter.com"  class="btn btn-sublime-pink btn-sm">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
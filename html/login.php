<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos del template -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">

    <style>

    /* Fondo rosita pastel */
    body {
        background-color: #FDE7EF !important;
        font-family: "Open Sans", sans-serif;
    }

    /* Tarjeta del login */
    .login-card {
        max-width: 420px;
        width: 100%;
        background: #ffffff;
        padding: 40px;
        border-radius: 22px;
        margin-top: 70px;
        border: 2px solid #F8C8D8;
        box-shadow: 0 8px 25px rgba(245, 163, 197, 0.25);
        transition: transform .2s ease;
    }

    .login-card:hover {
        transform: translateY(-4px);
    }

    /* Títulos */
    .login-card h3 {
        font-weight: 700;
        margin-bottom: 25px;
        text-align: center;
        color: #C45B82;
        letter-spacing: 0.5px;
    }

    /* Inputs */
    .login-card .form-control {
        border-radius: 12px;
        border: 1.8px solid #F8C8D8;
        padding: 11px 14px;
        background-color: #FFF6FA;
    }

    .login-card .form-control:focus {
        border-color: #F5A3C5;
        box-shadow: 0 0 6px rgba(245, 163, 197, 0.4);
    }

    /* Botón pastel */
    .btn-login {
        background-color: #F8C8D8;
        border: none;
        width: 100%;
        padding: 12px;
        border-radius: 14px;
        color: #8A3B59;
        font-weight: 700;
        font-size: 16px;
        transition: 0.2s;
    }

    .btn-login:hover {
        background-color: #F5A3C5;
        color: white;
    }

    /* Enlace para registrarse */
    .login-card p a {
        color: #C45B82;
        font-weight: 600;
        text-decoration: none;
    }

    .login-card p a:hover {
        text-decoration: underline;
    }

</style>

</head>
<?php
include("header.php")
?>
    
<body class="bg-white">

<div class="container d-flex justify-content-center">
    <div class="login-card">

        <h3>Iniciar Sesión</h3>

        <form action="procesar_login.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn-login">Entrar</button>

            <p class="text-center mt-3 mb-0">
                ¿No tienes cuenta?
                <a href="registro.php">Crear cuenta</a>
            </p>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
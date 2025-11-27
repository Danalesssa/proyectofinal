<?php
session_start();
include("conexion.php");
include("header.php");

if (isset($_GET['error'])):
    if ($_GET['error'] == 1):
?>
        <div class="alert alert-danger text-center">
            La contraseña es incorrecta.
        </div>
    <?php elseif ($_GET['error'] == 2): ?>
        <div class="alert alert-danger text-center">
            No existe una cuenta con ese correo.
        </div>
    <?php endif; ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center " style="min-height: 45vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 420px; border-radius: 16px;">
            <h3 class="text-center mb-4 fw-bold">Iniciar Sesión</h3>
            <form action="procesarlogin.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="contrasena" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark w-100 py-2">Entrar</button>
                <p class="text-center mt-3 mb-0">
                    ¿No tienes cuenta? <a href="registro.php" class="link-primary text-decoration-none">Crear cuenta</a>
                </p>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

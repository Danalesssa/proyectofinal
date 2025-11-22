<?php
include("conexion.php");
include("header.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min height: 100vh">
    <div class="card shadow p-4" style="width: 100%; max-width: 420px; border-radius: 16px;">

        <h3 class="text-center mb-4 fw-bold">Crear cuenta</h3>

        <form action="procesaregistro.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contrasena" class="form-control" required minlength="6">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Método de Pago</label>
                <input type="text" maxlength="19" placeholder="0000 0000 0000 0000" name="tarjeta_credito" id="tarjeta" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Dirección Completa</label>
                <input type="text" name="direccion" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-dark w-100 py-2">Registrarse</button>

            <p class="text-center mt-3 mb-0">
                ¿Ya tienes cuenta?
                <a href="login.php" class="link-primary text-decoration-none">Iniciar sesión</a>
            </p>

        </form>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('tarjeta').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\s+/g, '');

    value = value.replace(/\D/g, '');

    value = value.replace(/(.{4})/g, '$1 ');

    e.target.value = value.trim();
});
</script>

</body>
</html>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sublime Makeup Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
    <style>
        @media (min-width: 992px) { 
            .header-search.desktop-long-search {
                flex-grow: 2; 
                max-width: 600px;
            }
        }
        .header-icon-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
        }
    </style>
</head>
<body>

<header class="border-bottom">
    <div class="container-fluid py-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="index.php" class="d-flex align-items-center text-decoration-none">
                <img src="images/logo.png" alt="Logo">
            </a>
            
            <form class="flex-grow-1 mx-3 header-search desktop-long-search d-none d-md-block" method="GET" action="buscar.php">
                <div class="input-group">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar productos..." value="<?php echo isset($termino_busqueda) ? htmlspecialchars($termino_busqueda) : ''; ?>">
                    <button class="btn buscar-btn">Buscar</button>
                </div>
            </form>

            <div class="d-flex align-items-center gap-2">
                <?php if (isset($_SESSION['usuario_id'])): 
                    if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                    <a href="admin.php" class="header-icon-btn text-decoration-none">
                        <i class="fas fa-cog fa-lg d-md-none"></i>
                        <span class="ms-2 d-none d-md-inline">Administrador</span> 
                    </a>
                <?php else: ?>
                    <a href="cuenta.php" class="header-icon-btn text-decoration-none">
                        <i class="fas fa-user-circle fa-lg d-md-none"></i>
                        <span class="ms-2 d-none d-md-inline">Mi cuenta</span>
                    </a>
                <?php endif; ?>
                <?php else: ?>
                    <a href="login.php" class="header-icon-btn text-decoration-none">
                        <i class="fas fa-sign-in-alt fa-lg d-md-none"></i>
                        <span class="ms-2 d-none d-md-inline">Iniciar sesión</span>
                    </a>
                    <a href="registro.php" class="header-icon-btn text-decoration-none">
                        <i class="fas fa-user-plus fa-lg d-md-none"></i>
                        <span class="ms-2 d-none d-md-inline">Registrarse</span>
                    </a>
                <?php endif; ?>
                    <a href="carrito.php" class="header-icon-btn text-decoration-none">
                    <img src="images/carrito.png" class="header-icon" alt="Carrito" style="max-height: 30px;">
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid d-md-none px-3 pb-2">
        <form class="header-search" method="GET" action="buscar.php">
            <div class="input-group">
                <input type="text" name="buscar" class="form-control form-control-sm" placeholder="Buscar productos..." value="<?php echo isset($termino_busqueda) ? htmlspecialchars($termino_busqueda) : ''; ?>">
                <button class="btn buscar-btn btn-sm">Buscar</button>
            </div>
        </form>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre_nosotros.php">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="todos.php">Todos los Productos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="marcasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Marcas</a>
                    <ul class="dropdown-menu" aria-labelledby="marcasDropdown">
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
</body>
</html>
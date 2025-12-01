<?php
session_start();
include("conexion.php"); 
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$mensaje = '';
$modo = $_GET['modo'] ?? 'listar';
$producto_a_editar = null;
$PLACEHOLDER_FILENAME = 'placeholder.png'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['eliminar_producto']) && isset($_POST['id_producto'])) {
        $id = filter_var($_POST['id_producto']);
        $sql = "DELETE FROM productos WHERE id_producto = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $mensaje = "Producto con ID $id eliminado con éxito.";
        }
        $stmt->close();
        $modo = 'listar';    
    }
    
    if (isset($_POST['agregar_producto']) || isset($_POST['modificar_producto'])) {
        $nombre = trim($_POST['nombre_producto'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $precio = filter_var($_POST['precio'] ?? 0, FILTER_VALIDATE_FLOAT);
        $stock = filter_var($_POST['cantidad_stock'] ?? 0, FILTER_VALIDATE_INT);
        $fabricante = trim($_POST['fabricante'] ?? '');
        $origen = trim($_POST['origen'] ?? '');
        $categoria = trim($_POST['categoria'] ?? '');
        $imagen = trim($_POST['imagen'] ?? '');

    if (isset($_POST['agregar_producto'])) {
        $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, cantidad_stock, fabricante, origen, imagen, categoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssdissss", $nombre, $descripcion, $precio, $stock, $fabricante, $origen, $imagen, $categoria); 
        if ($stmt->execute()) {
            $mensaje = "Producto '$nombre' agregado con éxito.";
        } 
        $stmt->close();
        $modo = 'listar'; 
    } elseif (isset($_POST['modificar_producto']) && isset($_POST['id_producto'])) {
        $id = filter_var($_POST['id_producto'], FILTER_VALIDATE_INT);
        $sql = "UPDATE productos SET nombre_producto=?, descripcion=?, precio=?, cantidad_stock=?, fabricante=?, origen=?, imagen=?, categoria=? WHERE id_producto=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssdissssi", $nombre, $descripcion, $precio, $stock, $fabricante, $origen, $imagen, $categoria, $id); 
        if ($stmt->execute()) {
            $mensaje = "Producto '$nombre' (ID: $id) modificado con éxito.";
        }
        $stmt->close();
    }
    $modo = 'listar'; 
    }
}


if ($modo === 'editar' && isset($_GET['id'])) {
    $id = filter_var($_GET['id']);
    $sql = "SELECT * FROM productos WHERE id_producto = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows === 1) {
        $producto_a_editar = $resultado->fetch_assoc();
    }
    $stmt->close();
}

$productos = [];
if ($modo === 'listar') {
    $sql = "SELECT id_producto, nombre_producto, precio, cantidad_stock, categoria FROM productos ORDER BY id_producto ASC";
    $resultado = $conexion->query($sql);
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }
}
include("header.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Gestión de Inventario</h1>
    <div class="d-flex justify-content-center mb-4">
        <a href="admin.php" class="btn btn-sm btn-dark shadow-sm py-2 rounded-3 me-3">Volver al Panel</a>
        <a href="?modo=listar" class="btn btn-sm btn-dark shadow-sm py-2 rounded-3 me-3">Revisar Catálogo</a>
        <a href="?modo=agregar" class="btn btn-sm btn-dark shadow-sm py-2 rounded-3 me-3">Agregar Producto</a>
    </div>

    <?php if ($mensaje): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars($mensaje); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <?php if ($modo === 'agregar' || $modo === 'editar'): ?>
        <div class="card shadow-lg mx-auto mb-5" style="max-width: 800px;">
        <div class="card-header bg-primary text-white border-0 d-flex justify-content-between align-items-center">
        <?php echo $modo === 'editar' ? 'Modificar Producto Existente (ID: ' . $producto_a_editar['id_producto'] . ')' : 'Agregar Producto Nuevo'; ?>
        <?php if ($modo === 'editar'): ?>
            <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#confBorrar">Eliminar</button>
        <?php endif; ?>
        </div>
        
        <div class="card-body">
            <form method="POST" action="gestion_productos.php?modo=<?php echo $modo; ?>">
                <?php if ($modo === 'editar'): ?>
                    <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($producto_a_editar['id_producto']); ?>">
                <?php endif; ?>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre_producto" class="form-label fw-bold">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required 
                        value="<?php echo htmlspecialchars($producto_a_editar['nombre_producto'] ?? ''); ?>">
                    </div>
                        <div class="col-md-6">
                            <label for="categoria" class="form-label fw-bold">Categoría</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" required
                                value="<?php echo htmlspecialchars($producto_a_editar['categoria'] ?? ''); ?>">
                        </div>
                </div>
                    
                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-bold">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo htmlspecialchars($producto_a_editar['descripcion'] ?? ''); ?></textarea>
                </div>
                    
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fabricante" class="form-label fw-bold">Marca</label>
                        <input type="text" class="form-control" id="fabricante" name="fabricante" required
                            value="<?php echo htmlspecialchars($producto_a_editar['fabricante'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="origen" class="form-label fw-bold">Origen</label>
                        <input type="text" class="form-control" id="origen" name="origen" required
                            value="<?php echo htmlspecialchars($producto_a_editar['origen'] ?? ''); ?>">
                    </div>
                </div>
                    
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="precio" class="form-label fw-bold">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required
                            value="<?php echo htmlspecialchars($producto_a_editar['precio'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="cantidad_stock" class="form-label fw-bold">Cantidad en Stock</label>
                        <input type="number" class="form-control" id="cantidad_stock" name="cantidad_stock" required
                            value="<?php echo htmlspecialchars($producto_a_editar['cantidad_stock'] ?? ''); ?>">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="imagen" class="form-label fw-bold">Nombre del Archivo de Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" required
                        value="<?php echo htmlspecialchars($producto_a_editar['imagen'] ?? $PLACEHOLDER_FILENAME); ?>">
                </div>

                <div class="d-grid">
                    <button type="submit" name="<?php echo $modo === 'editar' ? 'modificar_producto' : 'agregar_producto'; ?>" 
                            class="btn btn-dark btn-lg shadow-sm">
                        <?php echo $modo === 'editar' ? 'Guardar Cambios' : 'Guardar Producto'; ?>
                    </button>
                </div>
            </form>
        </div>
</div>

<?php elseif ($modo === 'listar'): ?>        
    <div class="card shadow-lg mb-5">
        <div class="card-header bg-primary text-white">Catálogo de Productos</div>
            <div class="card-body table-responsive">
                <div class="table">
                    <table class="table">
                        <thead class="table">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto): ?>
                            <tr>
                                <th><?php echo htmlspecialchars($producto['id_producto']); ?></th>
                                <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                                <td><?php echo htmlspecialchars($producto['categoria']); ?></td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td><?php echo number_format($producto['cantidad_stock']); ?></td>                                
                                <td>
                                    <a href="?modo=editar&id=<?php echo htmlspecialchars($producto['id_producto']); ?>" class="btn btn-sm btn-dark" title="Editar"> Editar</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                        
                </div>
            </div>
        <?php endif; ?>
    </div>


<?php if ($modo === 'editar' && isset($producto_a_editar)): ?>
<div class="modal" id="confBorrar" aria-labelledby="confBorrar">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="confBorrar">Confirmar Eliminación</h5>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar el producto "<?php echo htmlspecialchars($producto_a_editar['nombre_producto']); ?>" ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="gestion_productos.php">
                    <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($producto_a_editar['id_producto']); ?>">
                    <button type="submit" name="eliminar_producto" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php 
$conexion->close();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
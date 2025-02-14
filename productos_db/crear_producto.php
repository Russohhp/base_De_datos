<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $categoria_id = $_POST['categoria_id']; // Recibimos el ID de la categoría
    $existencia_actual = $_POST['existencia_actual'];
    $precio = $_POST['precio'];

    // Insertar el nuevo producto en la base de datos
    $query = $pdo->prepare("INSERT INTO productos (codigo, productos, categoria_id, existencia_actual, precio) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$codigo, $producto, $categoria_id, $existencia_actual, $precio]);

    header("Location: index.php"); // Redirigir al índice después de guardar
    exit();
}

// Obtener las categorías desde la base de datos
$categoriasQuery = $pdo->query("SELECT * FROM categorias");
$categorias = $categoriasQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar Producto</h2>
        <form method="POST">
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <div class="form-group">
                <label for="producto">Producto</label>
                <!-- Aquí agregamos el placeholder -->
                <input type="text" class="form-control" id="producto" name="producto" placeholder="Nombre de un videojuego" required>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria_id (ID de la Categoría)</label>
                <input type="number" class="form-control" id="categoria_id" name="categoria_id" required>
                <small class="form-text text-muted">Solo ingresa el ID numérico de la categoría</small>
            </div>
            <div class="form-group">
                <label for="existencia_actual">Existencia Actual</label>
                <input type="number" class="form-control" id="existencia_actual" name="existencia_actual" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar Producto</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener el producto a editar por su ID
    $query = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
    $query->execute([$id]);
    $producto = $query->fetch(PDO::FETCH_ASSOC);

    // Verificar si el producto existe
    if (!$producto) {
        echo "Producto no encontrado.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigo = $_POST['codigo'];
        $producto_nombre = $_POST['producto']; // Cambié nombre a 'producto' para coincidir con la base de datos
        $categoria_id = $_POST['categoria_id'];
        $existencia_actual = $_POST['existencia_actual'];
        $precio = $_POST['precio'];

        // Actualizar el producto en la base de datos solo con el ID correcto
        $updateQuery = $pdo->prepare("UPDATE productos SET codigo = ?, productos = ?, categoria_id = ?, existencia_actual = ?, precio = ? WHERE id = ?");
        $updateQuery->execute([$codigo, $producto_nombre, $categoria_id, $existencia_actual, $precio, $id]);

        header("Location: index.php"); // Redirigir al índice después de actualizar
        exit();
    }
} else {
    header("Location: index.php"); // Si no se pasa el ID, redirigir al índice
    exit();
}

// Obtener las categorías para el campo select
$categoriasQuery = $pdo->query("SELECT * FROM categorias");
$categorias = $categoriasQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Producto</h2>
        <form method="POST">
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?= $producto['codigo'] ?>" required>
            </div>
            <div class="form-group">
                <label for="producto">Producto</label>
                <input type="text" class="form-control" id="producto" name="producto" value="<?= $producto['productos'] ?>" required>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria_id</label>
                <input type="number" class="form-control" id="categoria_id" name="categoria_id" value="<?= $producto['categoria_id'] ?>" required>
            </div>
            <div class="form-group">
                <label for="existencia_actual">Existencia Actual</label>
                <input type="number" class="form-control" id="existencia_actual" name="existencia_actual" value="<?= $producto['existencia_actual'] ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?= $producto['precio'] ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar Producto</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

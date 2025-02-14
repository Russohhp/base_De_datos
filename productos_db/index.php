<?php
include 'db.php';

// Obtener los productos y sus categorías
$productosQuery = $pdo->query("SELECT p.*, c.nombre AS categoria_nombre FROM productos p LEFT JOIN categorias c ON p.categoria_id = c.id");
$productos = $productosQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegas Store - Lista de Productos</title>
    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Estilo personalizado -->
    <style>

         /* Aplicar imagen de fondo en todo el sitio */
         body {
            background-image: url('https://images.unsplash.com/photo-1511512578047-dfb367046420?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Zm9uZG8lMjBkZSUyMHBhbnRhbGxhJTIwZGUlMjBqdWVnb3xlbnwwfHwwfHx8MA%3D%3D');
            background-size: cover; /* Asegura que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-attachment: fixed; /* Fija la imagen en su lugar mientras se hace scroll */
            color: #fff; /* Hace el texto blanco para resaltar sobre el fondo */
        }
        
        body {
            font-family: 'Rubik', sans-serif;
            background-color: #f4f7f6;
        }
        .navbar {
            background-color: #333;
        }
        .navbar-brand {
            font-weight: 700;
            color: #fff !important;
        }
        .navbar-nav .nav-link {
            color: #ddd !important;
        }
        .navbar-nav .nav-link:hover {
            color: #fff !important;
        }
        .navbar-nav .nav-item.active .nav-link {
            color: #ff9800 !important;
        }
        .container {
            max-width: 1200px;
            margin-top: 30px;
        }
        .btn-primary {
            background-color: #ff9800;
            border-color: #ff9800;
        }
        .btn-primary:hover {
            background-color: #ff5722;
            border-color: #ff5722;
        }
        .btn-warning {
            background-color: #fbc02d;
            border-color: #fbc02d;
        }
        .btn-warning:hover {
            background-color: #f57f17;
            border-color: #f57f17;
        }
        .table {
            margin-top: 30px;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f57c00;
            color: white;
            font-weight: 600;
        }
        .table td {
            background-color: #fff;
            color: #333;
        }
        .table td, .table th {
            text-align: center;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #ff9800;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }
        .card-body {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Vegas Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index_categoria.php">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalogo.php">Catálogo</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Lista de Productos</h2>
            </div>
            <div class="card-body">
                <a href="crear_producto.php" class="btn btn-primary mb-3">Agregar Producto</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Existencia</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?= $producto['id'] ?></td>
                                <td><?= $producto['codigo'] ?></td>
                                <td><?= $producto['productos'] ?></td>
                                <td><?= $producto['categoria_nombre'] ?></td>
                                <td><?= $producto['existencia_actual'] ?></td>
                                <td>$ <?= number_format($producto['precio'], 2) ?></td>
                                <td>
                                    <a href="editar_producto.php?id=<?= $producto['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="eliminar_producto.php?id=<?= $producto['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
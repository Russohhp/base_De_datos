<?php
include 'db.php';

// Obtener todos los productos
$productosQuery = $pdo->query("SELECT p.*, c.nombre AS categoria_nombre FROM productos p LEFT JOIN categorias c ON p.categoria_id = c.id");
$productos = $productosQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegas Store - Catálogo de Videojuegos</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Imagen de fondo */
        body {
            background-image: url('https://images.unsplash.com/photo-1511512578047-dfb367046420?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Zm9uZG8lMjBkZSUyMHBhbnRhbGxhJTIwZGUlMjBqdWVnb3xlbnwwfHwwfHx8MA%3D%3D');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #000; /* Cambiar el texto a color negro */
        }

        /* Menú de navegación con fondo oscuro */
        .navbar {
            background-color: #333; /* Fondo oscuro */
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

        /* Estilos específicos para el catálogo */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #ff9800;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }
        .card-body {
            background-color: #fff;
            color: #000; /* Asegura que el texto dentro de las tarjetas sea negro */
        }
        .catalogo-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }
        .catalogo-item img {
            max-width: 150px;
            max-height: 150px;
            margin-right: 20px;
        }
        .catalogo-item h5 {
            font-size: 20px;
            color: #000; /* Asegura que los nombres de los productos sean negros */
        }
    </style>
</head>
<body>
    <!-- Menú de navegación con fondo oscuro -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Vegas Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index_categoria.php">Categorías</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="catalogo.php">Catálogo</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Catálogo de Videojuegos</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($productos as $producto): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="imagen del producto">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $producto['productos'] ?></h5>
                                    <p class="card-text">Precio: $<?= number_format($producto['precio'], 2) ?></p>
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                </div>
                                <div class="card-footer">
                                    <a href="editar_producto.php?id=<?= $producto['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="eliminar_producto.php?id=<?= $producto['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

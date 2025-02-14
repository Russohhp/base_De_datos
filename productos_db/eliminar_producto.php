<?php
include 'db.php';

// Verificamos si existe el parámetro 'id' en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificamos si el producto existe en la base de datos
    $query = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
    $query->execute([$id]);
    $producto = $query->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        // Eliminamos el producto
        $deleteQuery = $pdo->prepare("DELETE FROM productos WHERE id = ?");
        $deleteQuery->execute([$id]);
    }
}

// Redirigimos al índice
header("Location: index.php");
exit();
?>

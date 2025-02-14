<?php
$host = 'localhost';
$dbname = 'productos_db';
$username = 'root';
$password = 'hola123';  // Cambié la contraseña aquí

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexión fallida: ' . $e->getMessage();
}
?>


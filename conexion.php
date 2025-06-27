<?php
$host = "localhost";
$db   = "aduanas_db"; // nombre de tu base de datos
$user = "root";       // en XAMPP casi siempre es "root"
$pass = "";           // y no tiene contraseña por defecto

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

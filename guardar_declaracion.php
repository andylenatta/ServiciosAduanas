<?php
require 'conexion.php';

$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

if (!$nombre || !$correo || !$usuario || !$contrasena) {
    header("Location: registrarse.php?error=Por favor, completa todos los campos");
    exit;
}

// Validar si ya existe correo o usuario
$checkCorreo = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = ?");
$checkCorreo->execute([$correo]);
if ($checkCorreo->fetchColumn() > 0) {
    header("Location: registrarse.php?error=El correo ya está en uso");
    exit;
}

$checkUsuario = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario = ?");
$checkUsuario->execute([$usuario]);
if ($checkUsuario->fetchColumn() > 0) {
    header("Location: registrarse.php?error=El nombre de usuario ya está en uso");
    exit;
}

$contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo, usuario, contrasena) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $correo, $usuario, $contrasenaHash]);
    header("Location: login.php?exito=Usuario registrado correctamente");
    exit;
} catch (PDOException $e) {
    // Puedes loguear el error o mostrar mensaje personalizado
    header("Location: registrarse.php?error=Error al registrar usuario");
    exit;
}
?>

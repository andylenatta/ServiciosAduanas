<?php
session_start();
require 'conexion.php';

$usuario_input = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

if (empty($usuario_input) || empty($contrasena)) {
    header("Location: login.php?error=Por favor completa todos los campos");
    exit;
}

try {
    // Buscar usuario por cualquier columna que creas posible, ejemplo: usuario, correo o nombre
    // Esta consulta busca en los 3 campos posibles (ajusta según tu tabla)
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? OR correo = ? OR nombre = ?");
    $stmt->execute([$usuario_input, $usuario_input, $usuario_input]);
    $usuarioDB = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuarioDB) {
        header("Location: login.php?error=Usuario no encontrado");
        exit;
    }

    if (password_verify($contrasena, $usuarioDB['contrasena'])) {
        $_SESSION['usuario_id'] = $usuarioDB['id'];
        $_SESSION['usuario_nombre'] = $usuarioDB['nombre'];
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=Contraseña incorrecta");
        exit;
    }

} catch (PDOException $e) {
    header("Location: login.php?error=Error en el sistema");
    exit;
}

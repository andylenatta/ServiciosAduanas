<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ? OR correo = ? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario, $usuario]);
    $user = $stmt->fetch();

    if ($user && password_verify($contrasena, $user['contrasena'])) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nombre'] = $user['nombre'];

        header("Location: index.php?exito=" . urlencode("Inicio de sesión exitoso."));
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
        header("Location: login.php?error=" . urlencode($mensaje));
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}


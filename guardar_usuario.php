<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $usuario = trim($_POST['usuario']);
    $contrasena = $_POST['contrasena'];

    if (!$nombre || !$correo || !$usuario || !$contrasena) {
        $mensaje = "Por favor completa todos los campos.";
        header("Location: registrarse.php?error=" . urlencode($mensaje));
        exit;
    }

    $hash_password = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correo, usuario, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nombre, $correo, $usuario, $hash_password]);
        $mensaje = "Usuario registrado con éxito.";
        header("Location: registrarse.php?exito=" . urlencode($mensaje));
        exit;
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $mensaje = "El correo o usuario ya está registrado.";
            header("Location: registrarse.php?error=" . urlencode($mensaje));
        } else {
            $mensaje = "Error al registrar usuario: " . $e->getMessage();
            header("Location: registrarse.php?error=" . urlencode($mensaje));
        }
        exit;
    }
} else {
    header("Location: registrarse.php");
    exit;
}
?>


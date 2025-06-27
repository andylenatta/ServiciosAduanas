<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$usuario_id]);
$usuario = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Configuración</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1c2f57] text-white flex justify-center items-center h-screen">

  <div class="bg-[#14213d] p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-3xl mb-4 font-bold text-orange-500">Configuración</h1>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></p>
    <p><strong>Correo:</strong> <?= htmlspecialchars($usuario['correo']) ?></p>
    <p><strong>Usuario:</strong> <?= htmlspecialchars($usuario['usuario']) ?></p>

    <div class="mt-6">
      <a href="index.php" class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600">← Volver</a>
    </div>
  </div>

</body>
</html>

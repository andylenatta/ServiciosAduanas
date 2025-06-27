<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1c2f57] text-white font-sans p-10">

  <h1 class="text-4xl mb-6">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h1>

  <p class="mb-6">Esta es tu área privada.</p>

  <a href="logout.php" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">Cerrar Sesión</a>

</body>
</html>


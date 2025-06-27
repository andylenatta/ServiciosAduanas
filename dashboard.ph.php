<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8" /><title>Dashboard</title></head>
<body>
<h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?></h1>
<p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>

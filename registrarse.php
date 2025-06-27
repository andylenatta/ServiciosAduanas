<?php
$mensajeExito = isset($_GET['exito']) ? htmlspecialchars($_GET['exito']) : '';
$mensajeError = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrarse</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1c2f57] text-white font-sans flex items-center justify-center min-h-screen">

  <div class="bg-[#14213d] p-10 rounded shadow-md w-full max-w-md">
    <h2 class="text-3xl font-bold text-orange-500 mb-6 text-center">Crear Cuenta</h2>

    <?php if ($mensajeExito): ?>
      <div class="bg-green-500 text-white text-center p-3 rounded mb-4 font-bold">
        <?= $mensajeExito ?>
      </div>
    <?php endif; ?>

    <?php if ($mensajeError): ?>
      <div class="bg-red-500 text-white text-center p-3 rounded mb-4 font-bold">
        <?= $mensajeError ?>
      </div>
    <?php endif; ?>

    <form action="guardar_usuario.php" method="POST" class="space-y-4">
      <input type="text" name="nombre" placeholder="Nombre completo" required class="w-full p-2 rounded text-gray-800" />
      <input type="email" name="correo" placeholder="Correo electrónico" required class="w-full p-2 rounded text-gray-800" />
      <input type="text" name="usuario" placeholder="Nombre de usuario" required class="w-full p-2 rounded text-gray-800" />
      <input type="password" name="contrasena" placeholder="Contraseña" required class="w-full p-2 rounded text-gray-800" />
      <button type="submit" class="w-full bg-orange-500 text-white font-bold py-2 rounded">Registrarse</button>
    </form>

    <div class="mt-6 text-center">
      <p>¿Ya tienes una cuenta?</p>
      <a href="login.php" class="text-orange-400 hover:underline font-semibold">Iniciar Sesión</a>
    </div>

    <div class="mt-6 text-center">
      <a href="index.php" class="inline-block bg-white text-[#1c2f57] font-bold px-4 py-2 rounded hover:bg-gray-200 transition">← Volver al Inicio</a>
    </div>
  </div>

</body>
</html>

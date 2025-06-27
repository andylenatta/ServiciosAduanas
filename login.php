<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1c2f57] text-white font-sans flex items-center justify-center min-h-screen">

  <div class="bg-[#14213d] p-10 rounded shadow-md w-full max-w-md">
    <h2 class="text-3xl font-bold text-orange-500 mb-6 text-center">Iniciar Sesión</h2>
    <form action="procesar_login.php" method="POST" class="space-y-4">
      <input type="text" name="usuario" placeholder="Usuario o Email" required class="w-full p-2 rounded text-gray-800" />
      <input type="password" name="contrasena" placeholder="Contraseña" required class="w-full p-2 rounded text-gray-800" />
      <button type="submit" class="w-full bg-orange-500 text-white font-bold py-2 rounded">Entrar</button>
    </form>

    <div class="mt-6 text-center">
      <p>¿No tienes cuenta?</p>
      <a href="registrarse.php" class="text-orange-400 hover:underline font-semibold">Registrarse</a>
    </div>

    <div class="mt-6 text-center">
      <a href="index.php" class="inline-block bg-white text-[#1c2f57] font-bold px-4 py-2 rounded hover:bg-gray-200 transition">← Volver al Inicio</a>
    </div>
  </div>

</body>
</html>

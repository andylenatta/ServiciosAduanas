<?php
// Inicializar variables para evitar warnings
$mensajeExito = isset($_GET['exito']) ? htmlspecialchars($_GET['exito']) : '';
$mensajeError = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión</title>
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <style>
    /* Animación de fade-in para el contenedor */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.8s ease forwards;
    }
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    /* Animación hover para botón */
    button:hover {
      animation: pulse 1.5s infinite alternate;
    }
    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(255, 165, 0, 0.7);
      }
      100% {
        box-shadow: 0 0 15px 6px rgba(255, 165, 0, 0);
      }
    }
  </style>
</head>
<body class="bg-[#1c2f57] text-white font-sans flex flex-col min-h-screen justify-center items-center px-4">

  <div class="bg-[#14213d] rounded-lg shadow-lg max-w-md w-full p-10 fade-in">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" alt="Logo Aduanas" class="h-16 w-auto" />
    </div>

    <!-- Título y subtítulo -->
    <h2 class="text-3xl font-bold text-orange-500 mb-1 text-center">Iniciar Sesión</h2>
    <p class="text-gray-300 mb-6 text-center">Accede a tu cuenta para gestionar tus registros fronterizos.</p>

    <!-- Mensajes -->
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

    <!-- Formulario -->
    <form action="procesar_login.php" method="POST" class="space-y-5" novalidate>

      <div class="relative">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
          <i data-feather="user"></i>
        </span>
        <input 
          type="text" 
          name="usuario" 
          placeholder="Nombre de usuario" 
          required 
          class="w-full p-3 pl-10 rounded text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-500" />
      </div>

      <div class="relative">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
          <i data-feather="lock"></i>
        </span>
        <input 
          type="password" 
          name="contrasena" 
          placeholder="Contraseña" 
          required 
          class="w-full p-3 pl-10 rounded text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-500" />
      </div>

      <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 transition py-3 rounded font-bold text-white cursor-pointer">
        Iniciar Sesión
      </button>
    </form>

    <div class="mt-6 text-center">
      <p class="mb-2">¿No tienes cuenta?</p>
      <a href="registrarse.php" class="text-orange-400 hover:underline font-semibold">Registrarse</a>
    </div>

    <div class="mt-6 text-center">
      <a href="index.php" class="inline-block bg-white text-[#1c2f57] font-bold px-6 py-2 rounded hover:bg-gray-200 transition">← Volver al Inicio</a>
    </div>

  </div>

  <footer class="text-gray-400 text-center mt-10 mb-4 select-none">
    &copy; 2025 Aduanas Fronterizas. Todos los derechos reservados.
  </footer>

  <script>
    feather.replace();
  </script>

</body>
</html>

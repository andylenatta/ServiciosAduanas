<?php
session_start();
$mensajeExito = isset($_GET['exito']) ? htmlspecialchars($_GET['exito']) : '';
$usuarioNombre = isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : null;
?>

<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8" />
  <title>Aduanas Fronterizas</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Animación fade-in */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 1s ease forwards;
    }
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    /* Pequeña animación para icono */
    .icon-bounce {
      animation: bounceY 3s ease-in-out infinite;
    }
    @keyframes bounceY {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-15px);
      }
    }
  </style>
</head>
<body class="bg-[#1c2f57] text-white font-sans">

  <?php if ($mensajeExito): ?>
    <div class="bg-green-500 text-white text-center p-3 font-bold">
      <?= $mensajeExito ?>
    </div>
  <?php endif; ?>

  <!-- Navbar -->
  <header class="flex justify-between items-center p-5 bg-[#14213d] shadow fade-in" style="animation-delay: 0.2s;">
    <div class="text-xl font-bold">Aduanas <span class="text-orange-500">Fronteras</span></div>
    <nav class="space-x-6">
   

      <?php if ($usuarioNombre): ?>
        <span class="text-white font-semibold">👋 Bienvenido, <?= htmlspecialchars($usuarioNombre) ?></span>
        <a href="logout.php" class="bg-red-600 text-white font-bold py-1 px-3 rounded hover:bg-red-700 transition">Cerrar Sesión</a>
      <?php else: ?>
        <a href="login.php" class="bg-white text-[#1c2f57] font-bold py-1 px-3 rounded hover:bg-gray-200 transition">Iniciar Sesión</a>
        <a href="registrarse.php" class="bg-orange-500 text-white font-bold py-1 px-3 rounded hover:bg-orange-600 transition">Registrarse</a>
      <?php endif; ?>
    </nav>
  </header>

  <!-- Hero -->
  <section class="relative h-[500px] md:h-[600px] overflow-hidden">
    <div class="absolute inset-0">
      <img src="https://media.sitioandino.com.ar/p/959cf04c3db015a5b7e9099ce02650e9/adjuntos/335/imagenes/000/614/0000614154/1200x630/smart/complejo-los-libertadores-paso-chile-cruce-chile-aduana-tramitesjpg.jpg"
           alt="Frontera Aduanas"
           class="w-full h-full object-cover object-center brightness-75 transition-transform duration-500 ease-in-out hover:scale-105" />
      <div class="absolute inset-0 bg-[#1c2f57] bg-opacity-50"></div>
    </div>

    <div class="relative z-10 p-10 flex flex-col md:flex-row items-center justify-around h-full space-y-6 md:space-y-0 md:space-x-6 fade-in" style="animation-delay: 0.5s;">
      <div class="md:w-1/3 space-y-4 text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-bold">REGISTRO <span class="text-orange-500">FRONTERIZO</span></h1>
        <p class="text-orange-500 text-lg">Agiliza tu cruce con registro de vehículos y declaración jurada digital</p>
        <p class="text-gray-300">Llena los datos antes de cruzar para ahorrar tiempo en la frontera.</p>
        <div class="flex flex-col space-y-3 mt-4 md:space-y-0 md:flex-row md:space-x-4 justify-center md:justify-start">
          <a href="registro.php" class="bg-orange-500 text-white py-2 px-4 rounded font-bold hover:bg-orange-600 transition text-center transform hover:scale-105">Registro Vehículo</a>
          <a href="declaracion.php" class="border-2 border-white text-white py-2 px-4 rounded font-bold hover:bg-white hover:text-[#1c2f57] transition text-center transform hover:scale-105">Declaración Jurada</a>
          <a href="autorizacion_menores.php" class="bg-green-600 text-white py-2 px-4 rounded font-bold hover:bg-green-700 transition text-center transform hover:scale-105">Autorización para Menores</a>
        </div>
      </div>
      <div class="md:w-1/3 mt-8 md:mt-0 flex justify-center">
        
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center text-gray-300 mt-10 p-5 fade-in" style="animation-delay: 0.8s;">
    &copy; 2025 Aduanas Fronterizas | Todos los derechos reservados
  </footer>

</body>
</html>

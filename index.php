<?php 
session_start();
$mensajeExito = isset($_GET['exito']) ? htmlspecialchars($_GET['exito']) : '';
$usuarioNombre = isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Aduanas Fronterizas</title>
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>

  <style>
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
    .icon-bounce {
      animation: bounceY 3s ease-in-out infinite;
    }
    @keyframes bounceY {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }
  </style>
</head>

<body class="bg-[#1c2f57] text-white font-sans">

<!-- Navbar -->
<header class="flex justify-between items-center p-5 bg-[#14213d] shadow fade-in" style="animation-delay: 0.2s;">
  <div class="flex items-center space-x-3">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" class="h-10" alt="Logo">
    <span class="text-xl font-bold">Aduanas <span class="text-orange-500">Fronterizas</span></span>
  </div>
  <nav class="space-x-6 flex items-center">
    <?php if ($usuarioNombre): ?>
      <span class="font-semibold flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400 icon-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 117.757 12M12 12a4 4 0 114.243 4.243M15.536 16.536a4 4 0 01-7.072-1.415"/>
        </svg>
        <span>👋 Bienvenido, <?= htmlspecialchars($usuarioNombre) ?></span>
      </span>
      <a href="configuracion.php" class="bg-blue-600 text-white font-semibold py-1 px-3 rounded hover:bg-blue-700 transition">Configuración</a>
      <a href="logout.php" class="bg-red-600 px-3 py-1 rounded hover:bg-red-700 font-bold ml-3">Cerrar Sesión</a>
    <?php else: ?>
      <a href="login.php" class="bg-white text-[#1c2f57] px-3 py-1 rounded hover:bg-gray-200 font-bold">Iniciar Sesión</a>
      <a href="registrarse.php" class="bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600 font-bold">Registrarse</a>
    <?php endif; ?>
  </nav>
</header>

<!-- Hero -->
<section class="relative h-[500px] md:h-[600px] overflow-hidden">
  <img src="https://media.sitioandino.com.ar/p/959cf04c3db015a5b7e9099ce02650e9/adjuntos/335/imagenes/000/614/0000614154/1200x630/smart/complejo-los-libertadores-paso-chile-cruce-chile-aduana-tramitesjpg.jpg"
       alt="Frontera"
       class="w-full h-full object-cover brightness-75">
  <div class="absolute inset-0 bg-[#1c2f57] bg-opacity-60"></div>

  <div class="absolute inset-0 flex items-center justify-center fade-in" style="animation-delay: 0.5s;">
    <div class="text-center space-y-6">
      <h1 class="text-4xl md:text-6xl font-extrabold">Registro <span class="text-orange-500">Fronterizo</span></h1>
      <p class="text-lg text-gray-300">Ahorra tiempo en la frontera con nuestros servicios digitales.</p>
      <div class="flex flex-wrap justify-center gap-4">
        <a href="#servicios" class="bg-orange-500 text-white px-6 py-3 rounded font-bold hover:bg-orange-600 transform hover:scale-105 transition">Ver Servicios</a>
      </div>
    </div>
  </div>
</section>

<!-- Servicios -->
<section id="servicios" class="py-16 px-6 fade-in" style="animation-delay: 0.7s;">
  <h2 class="text-3xl font-bold text-center mb-10">Nuestros <span class="text-orange-500">Servicios</span></h2>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
    
    <!-- Registro de Vehículo -->
    <div class="bg-[#14213d] p-6 rounded-lg shadow-lg hover:scale-105 transition">
      <img src="https://agenciazulueta.cl/images/news/news-32.png" alt="Vehículo" class="rounded mb-4">
      <h3 class="text-2xl font-bold mb-2 flex items-center">
        <i data-feather="truck" class="mr-2 text-orange-400"></i> Registro Vehículo
      </h3>
      <p class="text-gray-300 mb-4">Registra tu vehículo y tus acompañantes antes de cruzar la frontera.</p>
      <a href="registro.php" class="bg-orange-500 px-4 py-2 rounded text-white font-bold hover:bg-orange-600 transition">Registrar</a>
    </div>

    <!-- Declaración Jurada -->
    <div class="bg-[#14213d] p-6 rounded-lg shadow-lg hover:scale-105 transition">
      <img src="https://media.telemetro.com/p/f2e01fedc44891d60ef5251c9f1057da/adjuntos/311/imagenes/018/298/0018298587/855x0/smart/imagepng.png" alt="Declaración" class="rounded mb-4">
      <h3 class="text-2xl font-bold mb-2 flex items-center">
        <i data-feather="file-text" class="mr-2 text-orange-400"></i> Declaración Jurada
      </h3>
      <p class="text-gray-300 mb-4">Declara alimentos, mascotas u objetos antes de ingresar o salir.</p>
      <a href="declaracion.php" class="bg-orange-500 px-4 py-2 rounded text-white font-bold hover:bg-orange-600 transition">Declarar</a>
    </div>

    <!-- Autorización para Menores -->
    <div class="bg-[#14213d] p-6 rounded-lg shadow-lg hover:scale-105 transition">
      <img src="https://www.futuro.cl/wp-content/uploads/2023/01/pasaporte-chileno-1024x576.jpg" alt="Menores" class="rounded mb-4">
      <h3 class="text-2xl font-bold mb-2 flex items-center">
        <i data-feather="user-check" class="mr-2 text-orange-400"></i> Autorización Menores
      </h3>
      <p class="text-gray-300 mb-4">Gestiona permisos notariales para menores que viajan sin ambos padres.</p>
      <a href="autorizacion_menores.php" class="bg-orange-500 px-4 py-2 rounded text-white font-bold hover:bg-orange-600 transition">Autorizar</a>
    </div>

  </div>
</section>

<!-- Footer -->
<footer class="bg-[#14213d] text-center text-gray-300 p-6 fade-in" style="animation-delay: 0.9s;">
  &copy; 2025 Aduanas Fronterizas | Todos los derechos reservados
</footer>

<script>
  feather.replace();
</script>

</body>
</html>

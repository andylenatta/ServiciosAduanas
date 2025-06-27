<?php
session_start();
$mensajeExito = isset($_GET['exito']) ? htmlspecialchars($_GET['exito']) : '';
$mensajeError = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro de Vehículo | Aduanas Chile</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" type="image/x-icon" />

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-[#1c2f57] text-white font-sans flex flex-col min-h-screen">

  <!-- Header -->
  <header class="bg-[#14213d] sticky top-0 z-50 flex items-center px-6 py-3 shadow-md">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" alt="Logo Aduanas Chile" class="h-10 mr-4" />
    <h1 class="text-orange-400 font-extrabold text-2xl flex-grow">Registro de Vehículo</h1>
    <a href="index.php" class="bg-white text-[#1c2f57] font-bold px-4 py-2 rounded hover:bg-gray-200 transition">
      ← Volver al Inicio
    </a>
  </header>

  <!-- Contenido -->
  <main class="flex-grow flex items-center justify-center">
    <section class="p-10 rounded bg-[#14213d] max-w-3xl w-full mx-5">

      <!-- Imagen decorativa -->
      <div class="mb-6">
        <img src="https://agenciazulueta.cl/images/news/news-32.png" 
             alt="Vehículo frontera" 
             class="w-full rounded-lg shadow-lg border border-gray-600">
      </div>

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
      <form action="guardar_vehiculo.php" method="POST" class="max-w-md mx-auto grid gap-4">

        <!-- Patente -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="cpu" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                 name="patente" placeholder="Patente" required />
        </div>

        <!-- Marca -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="truck" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                 name="marca" placeholder="Marca" required />
        </div>

        <!-- Modelo -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="settings" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                 name="modelo" placeholder="Modelo" required />
        </div>

        <!-- Año -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="calendar" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                 name="anio" placeholder="Año" required />
        </div>

        <!-- Nombre conductor -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="user" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                 name="nombre_conductor" placeholder="Nombre del conductor" required />
        </div>

        <!-- RUT/Pasaporte -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="credit-card" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                 name="rut_pasaporte" placeholder="RUT / Pasaporte" required />
        </div>

        <!-- Acompañantes -->
        <div class="flex items-start bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="users" class="text-gray-300 mx-3 mt-3"></i>
          <textarea class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                    name="acompanantes" placeholder="Acompañantes (opcional)"></textarea>
        </div>

        <!-- Fecha salida -->
        <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" 
               type="date" name="fecha_salida" required />

        <!-- Fecha regreso -->
        <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" 
               type="date" name="fecha_regreso" required />

        <!-- Motivo viaje -->
        <select class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" name="motivo_viaje" required>
          <option value="" disabled selected>Motivo del viaje</option>
          <option value="Turismo">Turismo</option>
          <option value="Trabajo">Trabajo</option>
          <option value="Otro">Otro</option>
        </select>

        <!-- Botón -->
        <button class="bg-orange-500 text-white py-3 rounded font-bold mt-3 hover:bg-orange-600 transition">
          Registrar Vehículo
        </button>
      </form>

    </section>
  </main>

  <script>
    feather.replace();
  </script>
</body>
</html>

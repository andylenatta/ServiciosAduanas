<?php
session_start();
$mensajeExito = isset($_GET['exito']) ? htmlspecialchars($_GET['exito']) : '';
$mensajeError = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
$nombreMenor = isset($_POST['nombre_menor']) ? htmlspecialchars($_POST['nombre_menor']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Autorización para Menores | Aduanas Chile</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" type="image/x-icon" />

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-[#1c2f57] text-white font-sans flex flex-col min-h-screen">

  <!-- Header -->
  <header class="bg-[#14213d] sticky top-0 z-50 flex items-center px-6 py-3 shadow-md">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" alt="Logo Aduanas Chile" class="h-10 mr-4" />
    <h1 class="text-orange-400 font-extrabold text-2xl flex-grow">Autorización para Menores</h1>
    <a href="index.php" class="bg-white text-[#1c2f57] font-bold px-4 py-2 rounded hover:bg-gray-200 transition">
      ← Volver al Inicio
    </a>
  </header>

  <!-- Contenido -->
  <main class="flex-grow flex items-center justify-center">
    <section class="p-10 rounded bg-[#14213d] max-w-3xl w-full mx-5">

      <!-- Imagen decorativa -->
      <div class="mb-6">
        <img src="https://www.futuro.cl/wp-content/uploads/2023/01/pasaporte-chileno-1024x576.jpg" 
             alt="Pasaporte chileno" 
             class="w-full rounded-lg shadow-lg border border-gray-600">
      </div>

      <p class="text-gray-300 mb-4 text-center">
        Complete este formulario para registrar la autorización de salida o entrada de menores al país.
      </p>

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

      <?php if ($nombreMenor): ?>
        <div class="text-xl font-semibold text-white mb-4 text-center">
          Nombre del menor: <span class="text-orange-400"><?= $nombreMenor ?></span>
        </div>
      <?php else: ?>
        <div class="text-xl font-semibold text-white mb-4 text-center">
          Por favor ingresa los datos del menor
        </div>
      <?php endif; ?>

      <!-- Formulario -->
      <form action="guardar_autorizacion.php" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto grid gap-4">

        <!-- Nombre del menor -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="user" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none" 
                 name="nombre_menor" placeholder="Nombre del menor" required />
        </div>

        <!-- RUT o Pasaporte -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="credit-card" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none" 
                 name="rut_menor" placeholder="RUT/Pasaporte del menor" required />
        </div>

        <!-- Fecha nacimiento -->
        <input type="date" class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" 
               name="fecha_nacimiento" required />

        <!-- Acompañante -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="users" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none" 
                 name="nombre_acompanante" placeholder="Nombre del acompañante (si aplica)" />
        </div>

        <!-- Autorizante -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="user-check" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none" 
                 name="datos_autorizante" placeholder="Nombre del padre/madre que autoriza" required />
        </div>

        <!-- Fecha viaje -->
        <input type="date" class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" 
               name="fecha_viaje" required />

        <!-- Subir archivo -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="upload" class="text-gray-300 mx-3"></i>
          <input type="file" name="archivo_autorizacion" accept=".pdf,.jpg,.jpeg,.png" 
                 class="p-2 w-full bg-[#1c2f57] text-white focus:outline-none file:bg-white file:text-[#1c2f57]" 
                 required />
        </div>

        <!-- Botón -->
        <button class="bg-orange-500 text-white py-3 rounded font-bold mt-3 hover:bg-orange-600 transition">
          Enviar Autorización
        </button>
      </form>

    </section>
  </main>

  <script>
    feather.replace();
  </script>
</body>
</html>


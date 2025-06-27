<?php
session_start();
$mensajeExito = isset($_GET['exito']) ? htmlspecialchars($_GET['exito']) : '';
$mensajeError = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Declaración Jurada Digital | Aduanas Chile</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" type="image/x-icon" />

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-[#1c2f57] text-white font-sans flex flex-col min-h-screen">

  <!-- Header -->
  <header class="bg-[#14213d] sticky top-0 z-50 flex items-center px-6 py-3 shadow-md">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Logo_Servicio_Nacional_de_Aduanas_%28Chile%29.jpg" alt="Logo Aduanas Chile" class="h-10 mr-4" />
    <h1 class="text-orange-400 font-extrabold text-2xl flex-grow">Declaración Jurada Digital</h1>
    <a href="index.php" class="bg-white text-[#1c2f57] font-bold px-4 py-2 rounded hover:bg-gray-200 transition">
      ← Volver al Inicio
    </a>
  </header>

  <!-- Contenido -->
  <main class="flex-grow flex items-center justify-center">
    <section class="p-10 rounded bg-[#14213d] max-w-3xl w-full mx-5">

      <!-- Imagen decorativa -->
      <div class="mb-6">
        <img src="https://media.telemetro.com/p/f2e01fedc44891d60ef5251c9f1057da/adjuntos/311/imagenes/018/298/0018298587/855x0/smart/imagepng.png"
             alt="Declaración Aduana"
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
      <form action="guardar_declaracion.php" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto grid gap-4">

        <!-- Nombre y RUT/Pasaporte -->
        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="user" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                 name="nombre_viajero" placeholder="Nombre del Viajero" required />
        </div>

        <div class="flex items-center bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="credit-card" class="text-gray-300 mx-3"></i>
          <input class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                 name="rut_pasaporte" placeholder="RUT / Pasaporte" required />
        </div>

        <!-- Declaración de productos -->
        <div class="flex flex-col space-y-2 text-white">
          <label class="flex items-center"><input type="checkbox" name="alimentos" class="mr-2"> Lleva Alimentos</label>
          <label class="flex items-center"><input type="checkbox" name="plantas" class="mr-2"> Lleva Plantas</label>
          <label class="flex items-center"><input type="checkbox" name="mascotas" class="mr-2"> Lleva Mascotas</label>
        </div>

        <!-- Detalles -->
        <div class="flex items-start bg-[#1c2f57] border border-gray-500 rounded">
          <i data-feather="file-text" class="text-gray-300 mx-3 mt-3"></i>
          <textarea class="p-2 w-full bg-[#1c2f57] text-white placeholder-gray-300 focus:outline-none"
                    name="detalles_producto" placeholder="Detalles del producto (si aplica)"></textarea>
        </div>

        <!-- Subir certificado -->
        <label class="block">Subir certificado (opcional):</label>
        <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 file:bg-white file:text-[#1c2f57]"
               type="file" name="certificado" />

        <!-- Aceptar términos -->
        <label class="text-white flex items-center space-x-2">
          <input type="checkbox" required class="mr-2"> Acepto términos y condiciones
        </label>

        <!-- Botón -->
        <button class="bg-orange-500 text-white py-3 rounded font-bold mt-3 hover:bg-orange-600 transition">
          Enviar Declaración
        </button>
      </form>

    </section>
  </main>

  <script>
    feather.replace();
  </script>
</body>
</html>

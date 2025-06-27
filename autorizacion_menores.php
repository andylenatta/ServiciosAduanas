<?php
session_start();
$mensajeExito = isset($_GET['exito']) ? htmlspecialchars($_GET['exito']) : '';
$mensajeError = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Autorización para Menores | Aduanas Chile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1c2f57] text-white font-sans">

  <section class="p-10 mt-10 rounded mx-5 md:mx-20 bg-[#14213d] max-w-3xl mx-auto">
    <h2 class="text-3xl font-bold text-orange-500 mb-5">Autorización para Menores</h2>

    <p class="text-gray-300 mb-4">Permite registrar online los permisos para que menores salgan o entren al país sin ambos padres.</p>

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

    <form action="guardar_autorizacion.php" method="POST" enctype="multipart/form-data" class="grid gap-4">
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="nombre_menor" placeholder="Nombre del menor" required />
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="rut_menor" placeholder="RUT/Pasaporte del menor" required />
      <input type="date" class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" name="fecha_nacimiento" required />

      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="nombre_acompanante" placeholder="Nombre del acompañante (si aplica)" />

      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="datos_autorizante" placeholder="Nombre del padre/madre que autoriza" required />
      <input type="date" class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" name="fecha_viaje" required />

      <label class="text-white">Autorización notarial (PDF o imagen):</label>
      <input type="file" name="archivo_autorizacion" accept=".pdf,.jpg,.jpeg,.png" class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" required />

      <button class="bg-orange-500 text-white py-3 rounded font-bold mt-3 hover:bg-orange-600 transition">Enviar Autorización</button>
    </form>

    <div class="mt-8 text-center">
      <a href="index.php" class="inline-block bg-white text-[#1c2f57] font-bold px-6 py-2 rounded hover:bg-gray-200 transition">
        ← Volver al Inicio
      </a>
    </div>
  </section>

</body>
</html>

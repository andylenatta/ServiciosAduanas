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
  <title>Declaración Jurada Digital</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1c2f57] text-white font-sans">

  <section class="p-10 mt-10 rounded mx-5 md:mx-20 bg-[#14213d] max-w-3xl mx-auto">
    <h2 class="text-3xl font-bold text-orange-500 mb-5">Declaración Jurada Digital</h2>

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

    <form action="guardar_declaracion.php" method="POST" enctype="multipart/form-data" class="grid gap-4">
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="nombre_viajero" placeholder="Nombre y RUT/Pasaporte" required />
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="rut_pasaporte" placeholder="RUT/Pasaporte" required />

      <div class="flex flex-col space-y-2 text-white">
        <label><input type="checkbox" name="alimentos" class="mr-2"> Lleva Alimentos</label>
        <label><input type="checkbox" name="plantas" class="mr-2"> Lleva Plantas</label>
        <label><input type="checkbox" name="mascotas" class="mr-2"> Lleva Mascotas</label>
      </div>

      <textarea class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="detalles_producto" placeholder="Detalles del producto"></textarea>
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 file:bg-white file:text-[#1c2f57]" type="file" name="certificado" />

      <label class="text-white flex items-center space-x-2">
        <input type="checkbox" required class="mr-2"> Acepto términos y condiciones
      </label>

      <button class="bg-orange-500 text-white py-3 rounded font-bold mt-3 hover:bg-orange-600 transition">Enviar Declaración</button>
    </form>

    <div class="mt-8 text-center">
      <a href="index.php" class="inline-block bg-white text-[#1c2f57] font-bold px-6 py-2 rounded hover:bg-gray-200 transition">
        ← Volver al Inicio
      </a>
    </div>
  </section>

</body>
</html>



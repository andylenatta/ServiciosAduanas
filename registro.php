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
  <title>Registro de Vehículo</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1c2f57] text-white font-sans">

  <section class="p-10 mt-10 rounded mx-5 md:mx-20 bg-[#14213d] max-w-3xl mx-auto">
    <h2 class="text-3xl font-bold text-orange-500 mb-5">Registro de Vehículo</h2>

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

    <form action="guardar_vehiculo.php" method="POST" class="grid gap-4">
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="patente" placeholder="Patente" required />
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="marca" placeholder="Marca" required />
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="modelo" placeholder="Modelo" required />
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="anio" placeholder="Año" required />
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="nombre_conductor" placeholder="Nombre del Conductor" required />
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="rut_pasaporte" placeholder="RUT / Pasaporte" required />
      <textarea class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500 placeholder-gray-300" name="acompanantes" placeholder="Acompañantes (opcional)"></textarea>
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" type="date" name="fecha_salida" required />
      <input class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" type="date" name="fecha_regreso" required />

      <select class="p-2 rounded bg-[#1c2f57] text-white border border-gray-500" name="motivo_viaje">
        <option value="Turismo">Turismo</option>
        <option value="Trabajo">Trabajo</option>
        <option value="Otro">Otro</option>
      </select>

      <button class="bg-orange-500 text-white py-3 rounded font-bold mt-3 hover:bg-orange-600 transition">Registrar Vehículo</button>
    </form>

    <div class="mt-8 text-center">
      <a href="index.php" class="inline-block bg-white text-[#1c2f57] font-bold px-6 py-2 rounded hover:bg-gray-200 transition">
        ← Volver al Inicio
      </a>
    </div>
  </section>

</body>
</html>


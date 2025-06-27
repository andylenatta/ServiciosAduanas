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
  <title>Registrarse</title>
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
    /* Barra de fuerza de contraseña */
    #strengthBar {
      height: 6px;
      border-radius: 4px;
      background-color: #ccc;
      margin-top: 4px;
      transition: width 0.4s ease, background-color 0.4s ease;
    }
    /* Colores para fuerza */
    .weak { width: 33%; background-color: #f87171; }       /* rojo */
    .medium { width: 66%; background-color: #fbbf24; }     /* amarillo */
    .strong { width: 100%; background-color: #34d399; }    /* verde */
    /* Tooltip para info */
    .tooltip {
      position: relative;
      cursor: help;
      border-bottom: 1px dotted #f97316; /* naranja */
    }
    .tooltip:hover::after {
      content: attr(data-tip);
      position: absolute;
      left: 50%;
      bottom: 125%;
      transform: translateX(-50%);
      background-color: #14213d;
      color: white;
      padding: 6px 10px;
      border-radius: 6px;
      white-space: nowrap;
      font-size: 0.85rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.5);
      opacity: 1;
      pointer-events: auto;
      z-index: 100;
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
    <h2 class="text-3xl font-bold text-orange-500 mb-1 text-center">Crear Cuenta</h2>
    <p class="text-gray-300 mb-6 text-center">Completa el formulario para registrarte y comenzar a usar los servicios.</p>

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
    <form action="guardar_usuario.php" method="POST" class="space-y-5" id="registroForm" onsubmit="return validarFormulario()">

      <div class="relative">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
          <i data-feather="user"></i>
        </span>
        <input 
          type="text" 
          name="nombre" 
          placeholder="Nombre completo" 
          required 
          class="w-full p-3 pl-10 rounded text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-500" />
      </div>

      <div class="relative">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
          <i data-feather="mail"></i>
        </span>
        <input 
          type="email" 
          name="correo" 
          placeholder="Correo electrónico" 
          required 
          class="w-full p-3 pl-10 rounded text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-500" />
      </div>

      <div class="relative">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
          <i data-feather="user-check"></i>
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
          id="contrasena" 
          name="contrasena" 
          placeholder="Contraseña" 
          required 
          class="w-full p-3 pl-10 rounded text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-500"
          oninput="evaluarFuerzaContrasena()" />
        <div id="strengthBar" class=""></div>
      </div>

      <div class="relative">
        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
          <i data-feather="lock"></i>
        </span>
        <input 
          type="password" 
          id="confirmarContrasena" 
          name="confirmar_contrasena" 
          placeholder="Confirmar contraseña" 
          required 
          class="w-full p-3 pl-10 rounded text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-500" />
      </div>

      <label class="flex items-center space-x-2 text-gray-300 text-sm">
        <input type="checkbox" id="acepto" required class="accent-orange-500" />
        <span>Acepto los <a href="#" class="text-orange-400 underline hover:text-orange-300" target="_blank" rel="noopener noreferrer">términos y condiciones</a></span>
      </label>

      <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 transition py-3 rounded font-bold text-white cursor-pointer">
        Registrarse
      </button>
    </form>

    <div class="mt-6 text-center">
      <p class="mb-2">¿Ya tienes una cuenta?</p>
      <a href="login.php" class="text-orange-400 hover:underline font-semibold">Iniciar Sesión</a>
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

    // Función para evaluar fuerza contraseña
    function evaluarFuerzaContrasena() {
      const pass = document.getElementById('contrasena').value;
      const barra = document.getElementById('strengthBar');
      let strength = 0;
      if(pass.length > 5) strength++;
      if(pass.match(/[A-Z]/)) strength++;
      if(pass.match(/[0-9]/)) strength++;
      if(pass.match(/[^A-Za-z0-9]/)) strength++;
      // Cambiar clases segun fuerza
      barra.className = '';
      if (strength <= 1) barra.classList.add('weak');
      else if (strength == 2 || strength == 3) barra.classList.add('medium');
      else if (strength >= 4) barra.classList.add('strong');
    }

    // Validar confirmación de contraseña
    function validarFormulario() {
      const pass = document.getElementById('contrasena').value;
      const confirmPass = document.getElementById('confirmarContrasena').value;
      if (pass !== confirmPass) {
        alert('Las contraseñas no coinciden.');
        return false;
      }
      return true;
    }
  </script>

</body>
</html>

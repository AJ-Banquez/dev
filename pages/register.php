<?php
// Incluir el archivo de conexión a la base de datos
include '../config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assents/favicon/440monkey_100806.svg" />
  <script src="../assents/js/main.js"></script>
  <script src="../assents/js/Component.js"></script>
  <link rel="stylesheet" href="../assents/css/style.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>
<body>
    <section class="dark:bg-gray-900">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
      <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="../assents/favicon/440monkey_100806.svg" alt="logo">
          MONKEY  
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center uppercase">
                 Crear una cuenta
              </h1>
              <form class="space-y-4 md:space-y-6" action="../config/validation.php" method="post">
                <div>
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" name="full_name" id="full_name" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md hover:outline-black" placeholder="Nombre Completo" required="">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                    <input type="email" name="email" id="email" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md hover:outline-black" placeholder="Email" required="">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md hover:outline-black" required="">
                </div>
                <div>
                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar Contraseña</label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md hover:outline-black" required="">
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Acepto todos los<a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#"> Terminos y Condiciones.</a></label>
                    </div>
                </div>
                <button type="submit" id="register-button" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-gray-400 hover:bg-gray-500 focus:outline-none disabled" disabled>Registrar</button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center">
                    Tienes una Cuenta? <a href="login.php" class="font-medium text-black hover:underline dark:text-primary-500 uppercase">Iniciar sesión</a>
                </p>
            </form>
          </div>
      </div>
  </div>
</section>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm-password');
        const registerButton = document.getElementById('register-button');

        function toggleButton() {
            if (password.value === confirmPassword.value && password.value !== '') {
                registerButton.disabled = false;
                registerButton.classList.remove('bg-gray-400', 'hover:bg-gray-500');
                registerButton.classList.add('bg-blue-600', 'hover:bg-blue-700');
            } else {
                registerButton.disabled = true;
                registerButton.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                registerButton.classList.add('bg-gray-400', 'hover:bg-gray-500');
            }
        }

        // Ejecutar toggleButton al cargar la página para establecer el color inicial del botón
        toggleButton();

        // Escuchar cambios en los campos de contraseña
        password.addEventListener('input', toggleButton);
        confirmPassword.addEventListener('input', toggleButton);
    });
</script>
</html>

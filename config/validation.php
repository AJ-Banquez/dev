<?php
// Incluir el archivo de conexión a la base de datos
include 'connect.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que se hayan enviado los datos del formulario
    if (isset($_POST["full_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm-password"])) {
        // Obtener los datos del formulario
        $full_name = clean_input($_POST["full_name"]);
        $email = clean_input($_POST["email"]);
        $password = clean_input($_POST["password"]);
        $confirm_password = clean_input($_POST["confirm-password"]);

        // Validar que las contraseñas coincidan
        if ($password !== $confirm_password) {
            // Las contraseñas no coinciden, redireccionar al formulario con un mensaje de error
            header("Location: ../signup.php?error=password_mismatch");
            exit();
        }
        // Verificar si el usuario ya existe en la base de datos
        $sql = "SELECT * FROM users WHERE email = ?";
        $result = run_query($sql, [$email]);
        // Verificar si se encontró algún resultado (es decir, si el usuario ya existe)
        if ($result->num_rows > 0) {
            // El usuario ya existe, redireccionar al formulario con un mensaje de error
            echo "Error usuario ya existe";
            exit();
        }
        // Si el usuario no existe, insertarlo en la base de datos
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
        $result = run_query($sql, [$full_name, $email, $hashed_password]);

        // Verificar si la inserción fue exitosa
        if ($result) {
            // Registro exitoso, redireccionar al usuario a alguna página de éxito
            echo "Si se registró";
            exit();
        } else {
            // Hubo un error en la inserción, redireccionar al formulario con un mensaje de error
            echo "No se registró";
            exit();
        }
    }
}
?>

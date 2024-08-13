<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "4321";
$database = "users";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para limpiar los datos y prevenir inyecciones SQL
function clean_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

// Función para ejecutar consultas preparadas
function run_query($sql, $params = []) {
    global $conn;

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Vincular parámetros si hay alguno
    if (!empty($params)) {
        $types = str_repeat('s', count($params)); // Asignar el tipo 's' para todos los parámetros (cadena)
        $stmt->bind_param($types, ...$params);
    }

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener resultados si la consulta es un SELECT
    $result = $stmt->get_result();

    // Cerrar la consulta preparada
    $stmt->close();

    return $result;
}
?>

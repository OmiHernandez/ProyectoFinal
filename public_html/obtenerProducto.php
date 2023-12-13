<?php
// Tu lógica de conexión a la base de datos aquí
$conexion = new mysqli('127.0.0.1:3306', 'u690567133_admin', 'MHVGLAZ_Botanical1.', 'u690567133_botanical');
if ($conexion->connect_errno) {
    echo "Error de conexión: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    // Realizar la consulta en la base de datos
    $sql = "SELECT * FROM productos WHERE ID = $id";
    $resultado = $conexion->query($sql);
    $producto = $resultado->fetch_assoc();
    // Devolver una respuesta al cliente
    echo json_encode($producto);
} else {
    // Devolver un error si la solicitud no es válida
    http_response_code(400);
    echo "Solicitud no válida";
}
?>

<?php
// Tu lógica de conexión a la base de datos aquí
$conexion = new mysqli("localhost:33065", "root", "", "botanical");
if ($conexion->connect_errno) {
    echo "Error de conexión: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM productos WHERE ID = $id";
    $conexion->query($sql);

    // Devolver una respuesta al cliente
    $response = array("success" => $conexion->affected_rows == 1);
    echo json_encode($response);
} else {
    // Devolver un error si la solicitud no es válida
    http_response_code(400);
    echo "Solicitud no válida";
}

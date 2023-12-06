<?php
// Tu lógica de conexión a la base de datos aquí
$conexion = new mysqli("localhost:33065", "root", "", "botanical");
if ($conexion->connect_errno) {
    echo "Error de conexión: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    // Obtener el nombre de la imagen de la base de datos
    $sql = "SELECT imagen FROM productos WHERE ID = $id";
    $resultado = $conexion->query($sql);
    $fila = $resultado->fetch_assoc();
    $nombreImagen = $fila['imagen'];
    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM productos WHERE ID = $id";
    $conexion->query($sql);
    // Eliminar la imagen del servidor
    if (file_exists("img/productos/" . $nombreImagen)) {
        unlink("img/productos/" . $nombreImagen);
    }
    // Devolver una respuesta al cliente
    $response = array("success" => $conexion->affected_rows == 1);
    echo json_encode($response);
} else {
    // Devolver un error si la solicitud no es válida
    http_response_code(400);
    echo "Solicitud no válida";
}
?>

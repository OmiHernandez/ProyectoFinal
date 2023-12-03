<?php

header('Content-Type: application/json');


$conexion = new mysqli("localhost", "root", "", "botanical");
if ($conexion->connect_errno) {
    echo "Error de conexión: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    exit();
}
// Obtener el contenido del cuerpo de la solicitud
$json_data = file_get_contents("php://input");

// Decodificar el JSON en un array asociativo
$data = json_decode($json_data, true);

// Hacer algo con los datos
if ($data !== null) {
    // Acceder a los datos como un array asociativo
    $id = $data['id'];
    $nombre = $data['nombre'];
    $categoria = $data['categoria'];
    $foto = $data['foto'];
    $cantidad = $data['cantidad'];
    $precio = $data['precio'];
    $descuento = $data['descuento'];
    $descripcion = $data['descripcion'];
    $PrecioN = $precio - ($precio * $descuento / 100);

    $rutaDefinitiva = substr($foto, 12);
    $ruta_destino = "img/productos/"; // Asegúrate de cambiar esto a la ruta deseada
    
    // Mover la imagen desde su ubicación temporal a la carpeta deseada
    move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_destino);

    // move_uploaded_file($rutaDefinitiva, $ruta_destino);

    $statement = $conexion->prepare("UPDATE productos SET Nombre = ?, Categoria = ?, imagen = ?, Cantidad = ?, Precio = ?, Descuento = ?, Descripcion = ?, PrecioN = ? WHERE id = ?");
    $statement->bind_param("sssiiisii", $nombre, $categoria, $rutaDefinitiva, $cantidad, $precio, $descuento, $descripcion, $PrecioN, $id);
    $statement->execute();
    if ($statement->affected_rows == 1) {
        $response = ['status' => 'success', 'message' => 'Datos modificados correctamente'];
    } else {
        $response = ['status' => 'error', 'message' => 'Error al modificar los datos'];
    }
    // Por ejemplo, almacenar en una base de datos, procesar, etc.
    // $response = ['status' => 'success', 'message' => 'Datos recibidos correctamente'];

    echo json_encode($response);
} else {
    // Manejar error si la decodificación falla
    $response = ['status' => 'error', 'message' => 'Error al decodificar datos JSON'];
    echo json_encode($response);
}
?>

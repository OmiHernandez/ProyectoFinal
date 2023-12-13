<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new mysqli('127.0.0.1:3306', 'u690567133_admin', 'MHVGLAZ_Botanical1.', 'u690567133_botanical');
    if ($conexion->connect_errno) {
        echo "Error de conexión: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit();
    }

    // Acceder a los datos como un array asociativo
    $id = $_POST['id'];
    $nombre = $_POST['NombreP'];
    $categoria = $_POST['CategoriaP'];
    $cantidad = $_POST['CantidadP'];
    $precio = $_POST['PrecioP'];
    $descuento = $_POST['DescuentoP'];
    $descripcion = $_POST['DescripcionP'];
    $PrecioN = $precio - ($precio * $descuento / 100);

    // Consulta para obtener la ruta de la imagen existente
    $stmt = $conexion->prepare("SELECT imagen FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $rutaPredefinida = "img/productos/";
    $nombreImagen = $row['imagen'];
    $ruta_imagen_existente = $rutaPredefinida . $nombreImagen;

    // Verificar si se ha enviado una nueva imagen
    if (isset($_FILES['fotoMod']) && $_FILES['fotoMod']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['fotoMod']; // Obtiene el archivo de imagen

        // Borrar la imagen existente
        if (file_exists($ruta_imagen_existente)) {
            echo $ruta_imagen_existente;
            unlink($ruta_imagen_existente);
        }

        // Mover la nueva imagen a la carpeta deseada
        $ruta_destino = "img/productos/" . basename($foto['name']);
        move_uploaded_file($foto['tmp_name'], $ruta_destino);

        $nombreImagen = basename($foto['name']);
    }

    // Actualizar la base de datos con la nueva información
    $statement = $conexion->prepare("UPDATE productos SET Nombre = ?, Categoria = ?, imagen = ?, Cantidad = ?, Precio = ?, Descuento = ?, Descripcion = ?, PrecioN = ? WHERE id = ?");
    $statement->bind_param("sssiiisii", $nombre, $categoria, $nombreImagen, $cantidad, $precio, $descuento, $descripcion, $PrecioN, $id);
    $statement->execute();

    if ($statement->affected_rows == 1) {
        $response = ['status' => 'success', 'message' => 'Datos modificados correctamente'];
    } else {
        $response = ['status' => 'error', 'message' => 'Error al modificar los datos'];
    }

    echo json_encode($response);
} else {
    // Manejar error si la decodificación falla
    $response = ['status' => 'error', 'message' => 'Error al decodificar datos JSON'];
    echo json_encode($response);
}
?>

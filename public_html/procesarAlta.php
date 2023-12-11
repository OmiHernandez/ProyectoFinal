<?php
$servidor = 'localhost:3029';
$cuenta = 'root';
$password = '';
$bd = 'botanical';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
    echo json_encode(['status' => 'error', 'message' => 'Error en la conexion']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto']) && !(empty($_FILES['foto']['tmp_name']))) {
    /*  
        Nombre -
        Descripcion	-
        Categoria -
        Cantidad -
        Precio -
        Descuento -
        imagen -
        PrecioN
    */
    $targetDir = "img/productos/";  // Directorio donde se guardarán las imágenes
    $Imagen = basename($_FILES["foto"]["name"]);
    $targetFile = $targetDir . $Imagen;

    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
            $Nombre = $_POST['Nombre'];
            $Descripcion = $_POST['Descripcion'];
            $Categoria = $_POST['Categoria'];
            $Cantidad =  $_POST['Cantidad'];
            $Precio = $_POST['Precio'];
            $Descuento = $_POST['Descuento'];

            if ($Descuento != 0) {
                $aux = $Precio * ($Descuento / 100);
                $PrecioN = $Precio - $aux;
            } else {
                $PrecioN = $Precio;
            }

            $sql = "INSERT INTO productos
                        VALUES(default, '$Nombre', '$Descripcion', '$Categoria', $Cantidad, $Precio, 
                        $Descuento, '$Imagen', $PrecioN)";
            $resultado = $conexion->query($sql); //aplicamos sentencia
            if ($resultado) {
                echo json_encode(['status' => 'success', 'message' => 'Datos insertados correctamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al insertar los datos']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al subir la imagen']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'El archivo no es una imagen']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se recibieron datos']);
}
?>

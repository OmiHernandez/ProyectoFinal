<?php

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'botanical';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén la cadena serializada del parámetro 'vector' en la solicitud POST
    $vector_serializado = $_POST['vector'];
    // Deserializa la cadena JSON para obtener el array original
    $vector = json_decode($vector_serializado, true);
    $totalProductos = $_POST['totalProductos'];
    $totalPagar = $_POST['totalPagar'];
    $tarjeta = $_POST['tarjeta'];
    $usuarioID = $_POST['usuarioID'];


    require("plugins/fpdf/fpdf.php");  // Asegúrate de que la ruta al archivo fpdf.php sea correcta

    // Inicializar FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Agregar contenido al PDF
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Nota de Compra');

    $pdf->Ln();  // Salto de línea

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'Total productos: ' . $totalProductos);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Total a pagar: $' . $totalPagar);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Tarjeta: ' . $tarjeta);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Usuario ID: ' . $usuarioID);
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'Detalles de la compra:');
    $pdf->Ln();

    // Agregar detalles del vector
    foreach ($vector as $idProducto => $numeroProductos) {
        // Consultar información adicional del producto desde la base de datos
        $sql = "SELECT * FROM productos WHERE ID = $idProducto";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows) {
            $fila = $resultado->fetch_assoc();

            // Imprimir detalles del producto en el PDF
            $pdf->Ln();
            $pdf->Cell(100, 10, utf8_decode('Nombre: ' . $fila["Nombre"]));
            $pdf->Ln();
            $pdf->Image('img/productos/' . $fila["imagen"], 70, $pdf->GetY()-10, 30, 30);
            $pdf->Cell(100, 10, utf8_decode('Número de productos: ' . $numeroProductos));
            $pdf->Ln();
            $pdf->Cell(100, 10, 'Precio: $' . $numeroProductos * $fila["PrecioN"]);
            $pdf->Ln(); 
            $pdf->Ln();
     
        }
    }

    // Guardar el PDF en un archivo o mostrarlo en el navegador
    $pdf->Output('NotaDeCompra.pdf', 'D');  // 'D' descargará el archivo directamente
    
}
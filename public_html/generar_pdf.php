<?php
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'botanical';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
$y = 75;
session_start();

$vector = $_SESSION['carritoReacomodado'];
$totalProductos = $_SESSION['$totalProductos'];
$totalPagar = $_SESSION["total"];
$usuarioID = $_SESSION['usuarioID'];
$subtotal = $_SESSION["totalcar"]; //sin el impuesto y sin el envio
$envio = $_SESSION["envio"];
$impuesto = $_SESSION["impuesto"];
$metodoPago = $_SESSION["metodoPago"];
$direccionEnvio = $_SESSION["direccionEnvio"];

if ($envio == 0) {
    $envio = "¡Envio Gratis!";
}

require("plugins/fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

// Título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(180, 10, 'Nota de Compra', 0, 0, 'C');
$pdf->Ln();

// Detalles de la compra
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(180, 10, 'Detalles de la compra:', 0, 0, 'C');
$pdf->Ln();
$pdf->Line(10, 30, 200, 30);

foreach ($vector as $idProducto => $numeroProductos) {
    $sql = "SELECT * FROM productos WHERE ID = $idProducto";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows) {
        $fila = $resultado->fetch_assoc();

        // Nombre del producto
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(180, 10, utf8_decode('Nombre: ' . $fila["Nombre"]), 0, 0, 'C');
        $pdf->Ln();

        // Imagen del producto
        $imagePath = 'img/productos/' . $fila["imagen"];
        if (file_exists($imagePath) && exif_imagetype($imagePath) == IMAGETYPE_JPEG || exif_imagetype($imagePath) == IMAGETYPE_PNG) {
            $pdf->Image($imagePath, 160, $pdf->GetY() - 10, 30, 30);
        }

        // Número de productos
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(180, 10, utf8_decode('Número de productos: ' . $numeroProductos), 0, 0, 'C');
        $pdf->Ln();

        // Precio del producto
        $pdf->Cell(180, 10, 'Precio: $' . $numeroProductos * $fila["PrecioN"], 0, 0, 'C');
        $pdf->Ln();
        $pdf->Line(10, $y, 200, $y);
        $y += 40;
        if ($y >= 310) {
            $y = 75;
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(180, 10, 'Nota de Compra', 0, 0, 'C');
            $pdf->Ln();
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(180, 10, 'Detalles de la compra:', 0, 0, 'C');
            $pdf->Ln();
            $pdf->Line(10, 30, 200, 30);
        }
    }
}

// Información adicional
$pdf->Ln();
$pdf->Cell(180, 10, utf8_decode('Dirección de envío: '), 0, 0, 'C');
$pdf->Ln();
// Divide la dirección en líneas más pequeñas
$direccionDividida = wordwrap($direccionEnvio, 110, "-", true);
// Muestra la dirección dividida en el PDF
$pdf->MultiCell(180, 10, utf8_decode($direccionDividida), 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Total productos: ' . $totalProductos);
$pdf->Ln();
$pdf->Cell(40, 10, 'Subtotal: $' . $subtotal);
$pdf->Ln();
$pdf->Cell(40, 10, 'Impuesto: $' . $impuesto);
$pdf->Ln();
$pdf->Cell(40, 10, utf8_decode('Envío: ' . $envio));
$pdf->Ln();
$pdf->Cell(40, 10, utf8_decode('Método de pago: ' . $metodoPago));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(40, 10, 'Total a pagar: $' . $totalPagar);

$pdf->Output('NotaDeCompra.pdf', 'I');

?>
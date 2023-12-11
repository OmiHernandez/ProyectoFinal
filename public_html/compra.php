<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/compra.css">
    <title>Enviar Datos</title>
</head>

<body>
    <?php
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'botanical';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);
    $conexion->set_charset("utf8");

    // Obtén la cadena serializada del parámetro 'vector' en la URL
    $vector_serializado = $_GET['vector'];

    // Deserializa la cadena para obtener el array original
    $vector = unserialize($vector_serializado);


    // Otros datos de la URL
    $totalProductos = $_GET['totalProductos'];
    $totalPagar = $_GET['totalPagar'];
    $tarjeta = $_GET['tarjeta'];
    $usuarioID = $_GET['usuarioID'];

    $sql = "SELECT Correo FROM cuenta WHERE ID='$usuarioID'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows) {
        while ($fila = $resultado->fetch_assoc()) {
            $Correo = $fila["Correo"];
        }
    }

    $sql = "SELECT Usuario FROM cuenta WHERE ID='$usuarioID'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows) {
        while ($fila = $resultado->fetch_assoc()) {
            $Usuario = $fila["Usuario"];
        }
    }



    // Ahora puedes acceder a los datos individualmente
    echo "Vector: ";
    print_r($vector);

    echo "Total de Productos: " . $totalProductos . "<br>";
    echo "Total a Pagar: " . $totalPagar . "<br>";
    echo "Número de Tarjeta: " . $tarjeta . "<br>";
    echo "ID de Usuario: " . $usuarioID . "<br>";
    echo "Correo: " . $Correo . "<br>";
    echo "Usuario: " . $Usuario . "<br>";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'plugins/phpmailer/PHPMailer-6.8.1/src/PHPMailer.php';
    require 'plugins/phpmailer/PHPMailer-6.8.1/src/SMTP.php';
    require 'plugins/phpmailer/PHPMailer-6.8.1/src/Exception.php';


    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'botanicalgarden000@gmail.com';
        $mail->Password = 'qezxrgqjpfpnydgt';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('botanicalgarden000@gmail.com', 'Botanical Garden');
        $mail->addAddress($Correo, $Usuario);

        $mail->isHTML(true);

        $mail->Subject = "Nota de Compra";
        $mail->CharSet = 'UTF-8';
        $mail->ContentType = 'text/html';

        // Construir el cuerpo del correo como un documento HTML
        $body = '<html>';
        $body .= '<head><meta charset="UTF-8"></head>';
        $body .= '<body>';
        $body .= '<h1>Nota de Compra</h1>';
        // Agregar más contenido HTML según tus necesidades (usar variables PHP para la información dinámica)
        $body .= '<p>Total productos: ' . $totalProductos . '</p>';
        $body .= '<p>Total a pagar: $' . $totalPagar . '</p>';
        $body .= '<p>Tarjeta: ' . $tarjeta . '</p>';
        $body .= '<p>Usuario ID: ' . $usuarioID . '</p>';
        $body .= '<h2>Detalles de la compra:</h2>';

        foreach ($vector as $idProducto => $numeroProductos) {
            // Consultar información adicional del producto desde la base de datos
            $sql = "SELECT * FROM productos WHERE ID = $idProducto";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows) {
                $fila = $resultado->fetch_assoc();

                // Agregar detalles del producto al cuerpo del correo
                $body .= '<p>Nombre: ' . utf8_decode($fila["Nombre"]) . '</p>';
                $rutaImagen = 'img/productos/' . $fila["imagen"];
                $mail->AddEmbeddedImage($rutaImagen, $fila["ID"]);
                $body .= ' <img src="cid:' . $fila["ID"] . '" alt="Producto" style="width: 100px; height: 100px;"> ';
                $body .= '<p>Número de productos: ' . $numeroProductos . '</p>';
                $body .= '<p>Precio: $' . $numeroProductos * $fila["PrecioN"] . '</p>';
                // Agregar más detalles según tus necesidades
            }
        }

        $body .= '</body>';
        $body .= '</html>';

        // Establecer el cuerpo del correo
        $mail->Body = $body;

        $mail->send();

        echo '<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">¡Nuevo correo recibido!</h4>
    <p>Has recibido un nuevo correo electrónico. Revisa tu bandeja de entrada para estar al tanto de las últimas novedades.</p>
    <hr>
    <p class="mb-0">Recuerda revisar tu correo regularmente para no perderte información importante.</p>
</div>';
    } catch (Exception $e) {
        echo 'Error: ' . $mail->ErrorInfo;
    }


    ?>
    <form method="post" action="generar_pdf.php">
        <!-- Aquí agregamos campos ocultos para enviar los datos -->
        <input type="hidden" name="vector" value="<?php echo htmlspecialchars(json_encode($vector)); ?>">
        <input type="hidden" name="totalProductos" value="<?php echo $totalProductos; ?>">
        <input type="hidden" name="totalPagar" value="<?php echo $totalPagar; ?>">
        <input type="hidden" name="tarjeta" value="<?php echo $tarjeta; ?>">
        <input type="hidden" name="usuarioID" value="<?php echo $usuarioID; ?>">

        <div id="outer">
            <div ype="submit" value="PDF" name="submit" class="button_slide slide_diagonal">OBTENER LA NOTA DE PAGO EN PDF</div>
        </div>
    </form>


</body>

</html>
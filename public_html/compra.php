<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/compra.css">
    <link rel="stylesheet" href="css/realizarcompra.css">
    <title>Enviar Datos</title>
</head>

<body>
    <?php
    session_start();

    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'botanical';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);
    $conexion->set_charset("utf8");


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
    ?>


    <header class="header animate__animated animate__fadeInDown">
        <div style="display:flex;justify-content:center;">
            <img src="img/logo.png" width="90" height="90" class="d-inline-block align-top" alt="Logo de BotanicalG">
        </div>
        <br>
    </header>

    <section>
        <div class="contenedorI">
            <h1>¡Compra Exitosa!</h1>
            <div class="mini-1">
                <p>¡Enhorabuena
                    <?php echo $Usuario; ?> !
                </p>
                <p>Tu compra ha sido procesada con éxito. Queremos agradecerte por elegirnos para
                    satisfacer tus necesidades. Estamos emocionados de acompañarte en esta experiencia de compra y
                    estamos seguros de que disfrutarás de tu nuevo producto.</p>
            </div>
        </div>
    </section>


    <?php
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
        $body .= '<body style="font-family: Arial, sans-serif; margin: 20px; padding: 20px; background-color: #f4f4f4;">';
        $body .= '<h1 style="color: #333; text-align: center;">Nota de Compra</h1>';

        // Información de la compra
        $body .= '<div style="background-color: #fff; border-radius: 8px; padding: 15px; margin-top: 20px;">';
        $body .= '<p>Total productos: ' . $totalProductos . '</p>';
        $body .= '<p>Modo de pago: ' . $metodoPago . '</p>';
        $body .= '<p>Dirección de Envío: ' . $direccionEnvio . '</p>';
        $body .= '</div>';

        // Detalles de la compra
        $body .= '<h2 style="color: #333; margin-top: 20px;">Detalles de la compra:</h2>';

        foreach ($vector as $idProducto => $numeroProductos) {
            // Consultar información adicional del producto desde la base de datos
            $sql = "SELECT * FROM productos WHERE ID = $idProducto";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows) {
                $fila = $resultado->fetch_assoc();

                // Detalles del producto
                $body .= '<div style="background-color: #fff; border-radius: 8px; padding: 15px; margin-top: 15px;">';
                $body .= '<p>Nombre: ' . utf8_decode($fila["Nombre"]) . '</p>';
                $rutaImagen = 'img/productos/' . $fila["imagen"];
                $mail->AddEmbeddedImage($rutaImagen, $fila["ID"]);
                $body .= '<img src="cid:' . $fila["ID"] . '" alt="Producto" style="width: 100px; height: 100px; margin-bottom: 10px;">';
                $body .= '<p>Número de productos: ' . $numeroProductos . '</p>';
                $body .= '<p>Precio: $' . $numeroProductos * $fila["PrecioN"] . '</p>';
                $body .= '</div>';
                // Agregar más detalles según tus necesidades
            }
        }

        // Total a pagar
        $body .= '<div style="text-align: right; margin-top: 20px; font-size: 18px; color: #333;">';
        $body .= '<p>Subtotal: ' . $subtotal . '</p>';
        $body .= '<p>Cobro por envío: ' . $envio . '</p>';
        $body .= '<p>Impuesto: ' . $impuesto . '</p>';
        $body .= '<p>Total a pagar: $' . $totalPagar . '</p>';
        $body .= '</div>';
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

    <div id="outer">
        <div class="button_slide slide_diagonal"> <a class="pdf" href="generar_pdf.php">OBTENER LA NOTA DE PAGO EN PDF
            </a></div>
    </div>
    <br>
    <br>


    <footer>
        <div class="foot">
            <div class="academico">
                Página perteneciente a proyecto académico
            </div>
            <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                    <img src="img/logoWF.png" alt="Logo de BotanicalG" height="130" width="130">
                </a>
                <a class="flex-sm-fill text-sm-center nav-link text-light" href="index.php">Inicio</a>
                <a class="flex-sm-fill text-sm-center nav-link text-light" href="contact.php">Contactanos</a>
                <a class="flex-sm-fill text-sm-center nav-link text-light" href="about.php">Sobre nosotros...</a>
            </nav>
            <div class="redes">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" id="red" href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="red" href="#"><i class="fa-brands fa-facebook fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="red" href="#"><i class="fa-brands fa-x-twitter fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="red" href="#"><i class="fa-brands fa-tiktok fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="red" href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="red" href="#"><i class="fa-brands fa-linkedin-in fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="red" href="#"><i class="fa-brands fa-whatsapp fa-lg"></i></a>
                    </li>
                </ul>
            </div>
            <br>
            <div class="derechos">
                <nav class="navbar">
                    <a class="navbar-brand text-white">Empresa BotanicalG | Todos los derechos reservados &copy;</a>
                    <span class="badge badge-info">
                        <?php
                        date_default_timezone_set('America/Mexico_City');
                        echo "Ultima modificación: " . date("d/m/Y H:i:s.", getlastmod());
                        ?>
                    </span>
                    <p class="navbar-item my-2 my-lg-0 text-white">Al utilizar nuestro sitio indicas que aceptas nuestro
                        <a class="text-white-50" href="#">aviso de privacidad</a>
                    </p>
                </nav>
            </div>
            <br>
        </div>
    </footer>
</body>

</html>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'plugins/phpmailer/PHPMailer-6.8.1/src/PHPMailer.php';
    require 'plugins/phpmailer/PHPMailer-6.8.1/src/SMTP.php';
    require 'plugins/phpmailer/PHPMailer-6.8.1/src/Exception.php';

    if ($_POST["metodo"] == "suscribir") {
        $nombre = $_POST["usuario"];
        $correo = $_POST["correosus"];

        $conexion = new mysqli('localhost:33065', 'root', '', 'botanical');

        if ($conexion->connect_error) {
            die("Connection failed: " . $conexion->connect_error);
        }

        $sql = 'update cuenta set suscrito=true where Usuario="'.$nombre.'"';
        $resultado = $conexion->query($sql);

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'botanicalgarden000@gmail.com';
            $mail->Password = 'fiqzpjzbeokolpop';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('botanicalgarden000@gmail.com', 'Botanical Garden');
            $mail->addAddress($correo, $nombre);

            $mail->isHTML(true);

            $mail->Subject = "Gracias por contactarnos";

            $mail->Body = "Tu mensaje esta siendo procesado por nuestro excelente equipo";

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
    }
    ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/registrar.css">
<link rel="stylesheet" href="css/menu.css">

<div class="log">
    <img src="img/logo.png" alt="Logo Botanical" height="200" width="200">
</div>

<?php
    ob_start();
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
            $mail->Password = 'qezxrgqjpfpnydgt';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('botanicalgarden000@gmail.com', 'Botanical Garden');
            $mail->addAddress($correo, $nombre);

            $mail->isHTML(true);
            $mail->Subject = 'Oferta Navidenia Exclusiva para Nuestros Clientes Suscritos!';
            $mail->Body = '<p>En esta temporada navideña, queremos agradecerte por ser parte de nuestra comunidad verde y hacer que tu hogar sea más acogedor. Para expresar nuestra gratitud, nos complace ofrecerte una exclusiva oferta navideña: ¡un descuento del 20% en todas nuestras plantas de sombra!</p><br>
                            <p>Utiliza el cupón "NAVIDAD20". Valido hasta el 31 de diciembre de 2023.</p>
                            <p>La esencia de la naturaleza, capturada en Botanical Garden.</p>';

            $rutaImagen = 'img/descuento-navidad.png';
            $mail->AddEmbeddedImage($rutaImagen, 'imagen_adjunta');

            $mail->Body .= '<div style="text-align: center;"><img src="cid:imagen_adjunta" alt="Imagen Adjunta" style="width: 500px; height: 500px; display: inline-block;"></div>';

            $mail->send();
        ?>

            <div class="alert alert-success" role="alert" id="alerta">
                <h4 class="alert-heading">Bienvenido!</h4>
                <p>Gracias por formar parte de nuestra comunidad verde.</p>
                <br>
                <p>Correo electrónico enviado. Descuento especial para clientes suscritos.</p>
                <hr>
                <h6 class="mb-0">Esta siendo redireccionado.</h6>
            </div>
            <br>
            <footer>
                <div class="foot">
                    <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                        <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                            <img src="img/logoWF.png" alt="Logo de BotanicalG" height="130" width="130">
                        </a>
                        <a class="flex-sm-fill text-sm-center nav-link text-light" href="index.php">Inicio</a>
                        <a class="flex-sm-fill text-sm-center nav-link text-light" href="about.php">Contactanos</a>
                        <a class="flex-sm-fill text-sm-center nav-link text-light" href="contact.php">Sobre nosotros...</a>
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
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="red" href="#"><i class="fa-brands fa-tiktok fa-lg"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="red" href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="red" href="#"><i class="fa-brands fa-linkedin-in fa-lg"></i></a>
                            </li> -->
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
                            <p class="navbar-item my-2 my-lg-0 text-white">Al utilizar nuestro sitio indicas que aceptas nuestro <a class="text-white-50" href="#">aviso de privacidad</a></p>
                        </nav>
                    </div>
                    <br>
                </div>
            </footer>
        <?php
            header("refresh:5;url=index.php");
            exit();
        } catch (Exception $e) {
        ?>
            <div class="alert alert-danger" role="alert" id="alerta">
                <h4 class="alert-heading">Error.</h4>
                <p>Sucedio un error inesperado, por favor intentelo de nuevo.</p>
                <hr>
                <h6 class="mb-0">Esta siendo redireccionado.</h6>
            </div>
            <br>
            <footer>
                <div class="foot">
                    <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                        <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                            <img src="img/logoWF.png" alt="Logo de BotanicalG" height="130" width="130">
                        </a>
                        <a class="flex-sm-fill text-sm-center nav-link text-light" href="index.php">Inicio</a>
                        <a class="flex-sm-fill text-sm-center nav-link text-light" href="about.php">Contactanos</a>
                        <a class="flex-sm-fill text-sm-center nav-link text-light" href="contact.php">Sobre nosotros...</a>
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
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="red" href="#"><i class="fa-brands fa-tiktok fa-lg"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="red" href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="red" href="#"><i class="fa-brands fa-linkedin-in fa-lg"></i></a>
                            </li> -->
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
                            <p class="navbar-item my-2 my-lg-0 text-white">Al utilizar nuestro sitio indicas que aceptas nuestro <a class="text-white-50" href="#">aviso de privacidad</a></p>
                        </nav>
                    </div>
                    <br>
                </div>
            </footer>
        <?php
        header("refresh:5;url=index.php");
        exit();
        }
    }
?>
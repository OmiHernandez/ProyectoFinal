<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Garden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logoWF.png">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <?php
    include("login.php");
    ?>
    <section>
        <div class="contenedorI">
            <h1>Contactanos</h1>
            <div class="mini-1">
                <p>Escríbenos a <a class="verde" href="#">BotanicalGarden@gmail.com</a></p>
                <p>También puedes llamarnos al <a class="verde" href="#">626 237 420</a> en horario de at. cliente: de
                    lunes a jueves
                    de 9
                    a 18h y viernes de 9 a 14h.</p>
                <p>Dias en los que no podras contactarnos: 11 de septiembre, 25 de septiembre, 12 de octubre, 1 de
                    noviembre, 6 y 8 de diciembre, 25 y 26 de diciembre. </p>
                <p>Si quieres recibir <b>novedades y descuentos</b> April puedes suscribirte <a class="verde"
                        href="#">haciendo clic
                        aquí</a></p>
            </div>
        </div>
    </section>

    <section class="Mega">
        <div class="contenedorII">
            <img src="img/contact_img_1.png" alt="Imagen de Contacto" width="500px" height="500p´x">
        </div>

        <div class="contenedorIII">
            <form action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="NombreForm">Nombre</label>
                        <input id="NombreForm" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="CorreoForm">Correo electrónico</label>
                        <input id="CorreoForm" class="form-control" type="email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="NumeroForm">Número de teléfono</label>
                        <input id="NumeroForm" class="form-control" type="number">
                    </div>
                </div>

                <div class="form-row">
                    <label for="MensajeForm">Mensaje</label>
                    <br>
                    <textarea name="" id="MensajeForm" class="form-control" cols="30" rows="10"></textarea>

                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input id="AceptoForm" class="form-check-input" type="checkbox">
                        <label class="form-check-label" for="AceptoForm">Acepto las condiciones generales y la
                            <b>política de privacidad</b></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">ENVIAR</button>
            </form>
        </div>
    </section>

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
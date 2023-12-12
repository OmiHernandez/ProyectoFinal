<!DOCTYPE html>
<html lang="es_mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Garden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/ayuda.css">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logoWF.png">

</head>

<body>
    <?php
        include("login.php");
    ?>

    <section class="titulo">
       <!-- <h1>Preguntas frecuentes</h1> -->
    </section>

    <br><br>
    
    <section class="preguntas">
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                    <h5>1</h5>
                    ¿Cómo puedo hacer un pedido?
                </button>
            </p>
            <div class="collapse" id="collapseExample1">
                <div class="card card-body">
                    Puede hacer un pedido en línea a través de nuestro sitio web. Simplemente agregue los productos que desea comprar a su carrito y siga los pasos para completar su pedido.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                    <h5>2</h5>
                    ¿Cuánto tiempo tardará en llegar mi pedido?
                </button>
            </p>
            <div class="collapse" id="collapseExample2">
                <div class="card card-body">
                    El tiempo de entrega depende de su ubicación y del método de envío que elija. Por lo general, los pedidos se entregan en un plazo de 3 a 5 días hábiles.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                    <h5>3</h5>
                    ¿Cómo puedo pagar mi pedido?
                </button>
            </p>
            <div class="collapse" id="collapseExample3">
                <div class="card card-body">
                    Aceptamos pagos con tarjeta de crédito, PayPal y pago en Oxxo.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
                    <h5>4</h5>
                    ¿Cómo puedo saber si una planta es adecuada para mi hogar?
                </button>
            </p>
            <div class="collapse" id="collapseExample4">
                <div class="card card-body">
                    Proporcionamos información detallada sobre los requisitos de luz, agua y temperatura de cada planta en la página del producto. Si tiene alguna pregunta adicional, no dude en ponerse en contacto con nuestro servicio al cliente.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5">
                    <h5>5</h5>    
                    ¿Cómo puedo cuidar mis plantas después de recibirlas?
                </button>
            </p>
            <div class="collapse" id="collapseExample5">
                <div class="card card-body">
                    Proporcionamos instrucciones detalladas sobre cómo cuidar cada planta en la página del producto. Si tiene alguna pregunta adicional, no dude en ponerse en contacto con nuestro servicio al cliente.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample6">
                    <h5>6</h5>
                    ¿Ofrecen asesoramiento sobre el cuidado de plantas específicas?
                </button>
            </p>
            <div class="collapse" id="collapseExample6">
                <div class="card card-body">
                    Sí, nuestro equipo de expertos en jardinería está disponible para responder tus preguntas sobre el cuidado de plantas. Puedes contactarnos por correo electrónico o chat en vivo.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample7" aria-expanded="false" aria-controls="collapseExample7">
                    <h5>7</h5>
                    ¿Ofrecen plantas adecuadas para principiantes?
                </button>
            </p>
            <div class="collapse" id="collapseExample7">
                <div class="card card-body">
                    Sí, contamos con una selección de plantas ideales para aquellos que están comenzando en el mundo de la jardinería. Estas plantas son resistentes y fáciles de cuidar.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample8" aria-expanded="false" aria-controls="collapseExample8">
                    <h5>8</h5>
                    ¿Cómo empaquetan las plantas para garantizar que lleguen en buen estado?
                </button>
            </p>
            <div class="collapse" id="collapseExample8">
                <div class="card card-body">
                    Empacamos cuidadosamente cada planta para asegurar su protección durante el transporte. Utilizamos materiales resistentes y amigables con el medio ambiente.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample9" aria-expanded="false" aria-controls="collapseExample9">
                    <h5>9</h5>
                    ¿Ofrecen garantía en sus plantas?
                </button>
            </p>
            <div class="collapse" id="collapseExample9">
                <div class="card card-body">
                    Sí, ofrecemos garantía de satisfacción. Si no estás contento con tu compra, contáctanos en los primeros días después de recibirla para discutir opciones de reemplazo o reembolso.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample10" aria-expanded="false" aria-controls="collapseExample10">
                    <h5>10</h5>
                    ¿Qué debo hacer si mis plantas llegan dañadas o en mal estado?
                </button>
            </p>
            <div class="collapse" id="collapseExample10">
                <div class="card card-body">
                    Lamentamos cualquier inconveniente. Por favor, contáctanos inmediatamente con fotos de las plantas y del embalaje, y haremos todo lo posible para resolver el problema.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample11" aria-expanded="false" aria-controls="collapseExample11">
                    <h5>11</h5>
                    ¿Puedo devolver una planta si no es lo que esperaba?
                </button>
            </p>
            <div class="collapse" id="collapseExample11">
                <div class="card card-body">
                    Sí, aceptamos devoluciones en un plazo de 7 días después de la entrega. Consulta nuestra política de devoluciones para obtener más detalles.
                </div>
                <br>
            </div>
        </div>
        <div>
            <p>
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample12" aria-expanded="false" aria-controls="collapseExample12">
                    <h5>12</h5>
                    ¿Cómo puedo rastrear mi pedido?
                </button>
            </p>
            <div class="collapse" id="collapseExample12">
                <div class="card card-body">
                    Una vez que tu pedido sea enviado, recibirás un correo electrónico con un enlace de seguimiento para que puedas rastrear el estado y la ubicación de tu paquete.
                </div>
                <br>
            </div>
        </div>
        
    </section>

    <br><br><br>

    <footer>
        <div class="foot">
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
                        <a class="nav-link" id="red" href="https://www.instagram.com/the.botanicalgarden/"><i class="fa-brands fa-instagram fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="red" href="https://www.facebook.com/profile.php?id=61553949556849"><i class="fa-brands fa-facebook fa-lg"></i></a>
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
                    </li>-->
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
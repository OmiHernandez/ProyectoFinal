<!DOCTYPE html>
<html lang="es_mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Garden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logoWF.png">

</head>

<body>
    <?php
        include("login.php");
    ?>

    <section class="carrusel">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/carrusel1.jpg" class="d-block w-100 oscurecer" alt="Carrusel 1">
                    <div class="carousel-caption d-md-block">
                        <h5>Dale mas vida a tu hogar</h5>
                        <br>
                        <p class="d-md-block d-none">Transforma tu espacio con la magia de las plantas y dale una nueva vista alegre.</p>
                        <br>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carrusel2.jpg" class="d-block w-100" alt="Carrusel 2">
                    <div class="carousel-caption d-md-block">
                        <h5>Descubre la serenidad en cada hoja</h5>
                        <br>
                        <p class="d-md-block d-none">Disfruta de la tranquilidad que puedes tener en tu hogar gracias a las hermosas platas que puedes encontrar.</p>
                        <br>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carrusel3.jpg" class="d-block w-100" alt="Carrusel 3">
                    <div class="carousel-caption d-md-block">
                        <h5 id="titulocarru">Siente la frescura, vive la naturaleza</h5>
                        <br>
                        <p class="d-md-block d-none">Goza de la naturaleza al rededor de tu hogar, sientete como en un dia de campo disfrutando de cada instante</p>
                        <br>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </button>
        </div>
    </section>
    <br><br>

    <section >
        <div class="Movie">
            <h1>Dale mas vida a tu espacio</h1>
            <h5>Explora las opciones que hay para ti</h5>
        </div>
        <div class="categorias">
            <div class="categoria">
                <a href="tienda.php">
                    <img src="img/card1.jpg" alt="Categoría 1">
                    <p>Flores</p>
                </a>
            </div>
            <div class="categoria">
                <a href="tienda.php">
                    <img src="img/card2.jpg" alt="Categoría 2">
                    <p>Suculentas</p>
                </a>
            </div>
            <div class="categoria">
                <a href="tienda.php">
                    <img src="img/card3.jpg" alt="Categoría 3">
                    <p>Cactus</p>
                </a>
            </div>
            <div class="categoria">
                <a href="tienda.php">
                    <img src="img/card4.jpg" alt="Categoría 4">
                    <p>Aromáticas</p>
                </a>
            </div>
            <div class="categoria">
                <a href="tienda.php">
                    <img src="img/card5.jpg" alt="Categoría 5">
                    <p>Arbustos</p>
                </a>
            </div>
        </div>
        
        <!-- <div class="card-deck" id="tarjetas">
            <div class="card" id="tar">
                <img src="img/card1.jpg" class="card-img-top" alt="...">
            </div>
            <div class="card" id="tar">
                <img src="img/card2menu.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Aplicaciones Móviles de Vanguardia</h5>
                    <p class="card-text text-justify">Diseñamos y desarrollamos aplicaciones móviles innovadoras
                        para plataformas iOS y Android. Desde la concepción de la idea hasta la publicación
                        en las tiendas de aplicaciones, trabajamos en estrecha colaboración contigo para crear
                        aplicaciones móviles intuitivas y funcionales que resuelvan problemas y atraigan a tu
                        audiencia.</p>
                </div>
            </div>
            <div class="card" id="tar">
                <img src="img/card2menu.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Aplicaciones Móviles de Vanguardia</h5>
                    <p class="card-text text-justify">Diseñamos y desarrollamos aplicaciones móviles innovadoras
                        para plataformas iOS y Android. Desde la concepción de la idea hasta la publicación
                        en las tiendas de aplicaciones, trabajamos en estrecha colaboración contigo para crear
                        aplicaciones móviles intuitivas y funcionales que resuelvan problemas y atraigan a tu
                        audiencia.</p>
                </div>
            </div>
            <div class="card" id="tar">
                <img src="img/card3menu.png" class="card-img-top" alt="...">
                
            </div>
        </div> -->
    </section>
    <br>
    <!-- <section>
        <div class="Movie">
            <h1>Servicios</h1>
        </div>
        <div class="row" style="padding:40px;">
            <div class="col-md-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Software personalizado</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">CONTPAQ i®</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Servidores virtuales</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Soluciones en la nube</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <br>
                        <h4 id="list-item-1"><i class="fa-solid fa-window-restore fa-lg"></i> Software personalizado</h4>
                        <p class="text-justify">En BotanicalG, entendemos que cada negocio es único, con necesidades y desafíos específicos que
                            requieren soluciones igualmente excepcionales. Es por eso que nos enorgullece ofrecer
                            servicios de desarrollo de software personalizado diseñados exclusivamente para ti. <br>
                            Nuestro enfoque en el software personalizado es simple pero poderoso: creamos aplicaciones
                            y sistemas que se adaptan perfectamente a tus requerimientos, mejorando la eficiencia,
                            la productividad y la competitividad de tu empresa. Ya sea que estés buscando una solución
                            empresarial completa, una aplicación móvil innovadora o una plataforma de comercio electrónico
                            personalizada, nuestro equipo de desarrolladores altamente calificados y experimentados está
                            aquí para convertir tus ideas en realidad. <br>
                        </p>
                        <h3>¿Por qué elegir nuestro software personalizado?</h3>
                        <ul class="text-justify">
                            <li><b>Adaptado a tus necesidades:</b> En lugar de soluciones genéricas, creamos software que se alinea con tus procesos y objetivos específicos.</li>
                            <li><b>Mayor eficiencia:</b> Elimina tareas manuales y procesos ineficientes con software diseñado para automatizar y optimizar.</li>
                            <li><b>Ventaja competitiva:</b> Nuestras soluciones personalizadas te permiten destacar en tu industria y ofrecer experiencias excepcionales a tus clientes.</li>
                            <li><b>Soporte continuo:</b> No te dejamos solo después del desarrollo. Brindamos actualizaciones, mantenimiento y soporte para garantizar que tu software siga funcionando sin problemas.</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <br>
                        <h4 id="list-item-2"><img src="img/contpaqi.png" alt="Contpaq i" height="30" width="30"> CONTPAQ i®</h4>
                        <p class="text-justify">CONTPAQ i es una suite de software de contabilidad y finanzas ampliamente reconocida
                            por su capacidad para simplificar tareas contables, mejorar la toma de decisiones y garantizar el
                            cumplimiento de las normativas fiscales. Este software ofrece un conjunto de herramientas y módulos
                            integrales que abordan todas las necesidades contables de tu empresa, desde la facturación y el control
                            de inventario hasta la generación de informes y el cumplimiento fiscal.</p>
                        <h3>Ventajas de CONTPAQ i</h3>
                        <ul class="text-justify">
                            <li><b>Eficiencia y Productividad:</b> CONTPAQ i automatiza procesos contables y financieros, lo que ahorra tiempo y recursos valiosos para tu empresa.</li>
                            <li><b>Toma de Decisiones Informadas:</b> Accede a datos en tiempo real y análisis detallados para tomar decisiones estratégicas con confianza.</li>
                            <li><b>Cumplimiento Fiscal:</b> Mantén el cumplimiento de las regulaciones fiscales y reduce los riesgos de sanciones con herramientas de cumplimiento incorporadas.</li>
                            <li><b>Personalización:</b> CONTPAQ i se adapta a las necesidades específicas de tu empresa, garantizando una solución contable que funciona para ti.</li>
                        </ul>
                        <br><br><br>
                    </div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        <br>
                        <h4 id="list-item-3"><i class="fa-solid fa-server fa-lg"></i> Servidores virtuales</h4>
                        <p class="text-justify">En un mundo empresarial cada vez más digital, la elección de la infraestructura adecuada es crucial. Los servidores
                            virtuales, alojados en la nube, representan una solución escalable y versátil para satisfacer las demandas de
                            tu empresa. En BotanicalG, nos enorgullece ofrecer soluciones de servidores virtuales de alto
                            rendimiento que te permiten llevar tu negocio al siguiente nivel.</p>
                        <h3>Ventajas de Nuestros Servidores Virtuales</h3>
                        <ul class="text-justify">
                            <li><b>Escalabilidad:</b> Aumenta o disminuye recursos en función de las necesidades cambiantes de tu empresa.</li>
                            <li><b>Rendimiento:</b> Nuestros servidores virtuales ofrecen un rendimiento de primera categoría, asegurando una experiencia
                                sin interrupciones para tus aplicaciones y sitios web.</li>
                            <li><b>Seguridad:</b> Implementamos rigurosas medidas de seguridad para proteger tus datos y garantizar la continuidad del
                                negocio.</li>
                            <li><b>Respaldo y Recuperación:</b> Realizamos copias de seguridad automáticas y ofrecemos soluciones de recuperación de
                                desastres para proteger tus datos críticos.</li>
                            <li><b>Acceso Remoto:</b> Administra tus servidores virtuales desde cualquier lugar con acceso seguro en línea.</li>
                        </ul>
                        <br><br><br><br>
                    </div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <br>
                        <h4 id="list-item-4"><i class="fa-solid fa-cloud fa-lg"></i> Soluciones en la nube</h4>
                        <p class="text-justify">Las soluciones en la nube, o cloud computing, permiten acceder a recursos informáticos esenciales a través
                            de internet. Esto incluye servidores, almacenamiento, bases de datos, aplicaciones y más. En lugar de
                            invertir en costosas infraestructuras físicas, las empresas pueden aprovechar la nube para escalar recursos
                            de manera eficiente y centrarse en su core business.</p>
                        <h3>Ventajas de Nuestras Soluciones en la Nube</h3>
                        <ul class="text-justify">
                            <li><b>Escalabilidad:</b> Aumenta o disminuye tus recursos en la nube según las demandas cambiantes de tu negocio.</li>
                            <li><b>Eficiencia:</b> La nube optimiza los costos y reduce la necesidad de mantenimiento físico.</li>
                            <li><b>Acceso Universal:</b> Trabaja desde cualquier lugar y en cualquier momento con acceso seguro a tus aplicaciones y datos en la nube.</li>
                            <li><b>Seguridad y Confiabilidad:</b> Implementamos medidas de seguridad avanzadas y mantenemos la disponibilidad para garantizar la integridad de tus datos.</li>
                            <li><b>Colaboración Mejorada:</b> Facilita la colaboración en equipo con herramientas en la nube que permiten compartir y editar documentos en tiempo real.</li>
                        </ul>
                        <br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <br>
    <section>
        <div class="parallax">
            <br><br>
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div style="display:flex;justify-content:center;"><img src="img/logoWF.png" alt="Logo BotanicalG" height="90" width="90"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <h1 style="text-align:center;color:white;">La esencia de la naturaleza, capturada en Bocanical Garden</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <p style="text-align:center;color:white;">Sumérgete en un mundo donde la frescura del aire se mezcla con la exuberancia de las hojas y el perfume de las flores. </p>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div style="text-align: center">
                        <button type="button" class="btn btn-lg" id="boton"><a class="text-white" href="contact.php">¡Contactanos!</a></button>
                    </div>
                </div>
            </div> -->
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
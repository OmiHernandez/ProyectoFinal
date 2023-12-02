<!DOCTYPE html>
<html lang="es_mx">

<?php
    $servidor='localhost:33065';
    $cuenta='root';
    $password='';
    $bd='botanical';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    $sql = 'select * from productos order by ID desc';
    $resultado = $conexion -> query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Garden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f097015f8a.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logoWF.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
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
    </section>
    <br><br>
    <section class="compromiso">
        <div class="compTitulo">
            <h1>Nuestro compromiso</h1>
        </div>
        <div class="comp">
            <div>
                <i class="fa-solid fa-house fa-2xl" style="color: #5e7e66;"></i>
                <br><br>
                <h3>Decoración para el hogar</h3>
                <p>Encuentra las mejores plantas que les dara vida a tu hogar</p>
            </div>
            <div>
                <i class="fa-brands fa-pagelines fa-2xl" style="color: #5e7e66;"></i>
                <br><br>
                <h3>Plantas sanas y frescas</h3>
                <p>Comprometidos con la vida de nuestras plantas</p>
            </div>
            <div>
                <i class="fa-solid fa-star fa-2xl" style="color: #5e7e66;"></i>
                <br><br>
                <h3>Pedidos personalizados</h3>
                <p>Encuentra la planta ideal para ti</p>
            </div>
            <div>
                <i class="fa-solid fa-headset fa-2xl" style="color: #5e7e66;"></i>
                <br><br>
                <h3>Siempre cerca de ti</h3>
                <p>Estamos atentos a cualquiera de tus preguntas</p>
            </div>
        </div>
    </section>
    <br><br><br><br>
    <section class="productos">
        <div class="Movie">
            <h1>Nuevos Productos</h1>
            <h5>Productos nuevos cada semana</h5>
        </div>
        <div class="separacion"></div>
        <br><br>
        <div>
            <div class="container"> 
                <div class="row">
                    <?php
                        $numPro = 0;
                        $new=0;
                    ?>
                    <script> var array=[];</script>
                    <?php
                        while( $fila = $resultado ->  fetch_assoc()){
                            $imagen = $fila['imagen'];
                            $nombre = $fila['Nombre'];
                            $id = $fila['ID'];
                            $descrip = $fila['Descripcion'];
                            $catego = $fila['Categoria'];
                            $precio = $fila['Precio'];
                            $precioN =$fila['PrecioN'];
                            $desc = $fila['Descuento'];
                            $cantidad = $fila['Cantidad'];


                            $agotado=false;
                            if($cantidad==0) {
                                $agotado=true;
                        }
                    ?>
                    <script>
                        array.push("<?php echo $nombre ?>");
                    </script>
                    
                    <div class="product"><!-- col-md-3 col-sm-6  -->
                        <div class="separacion2"></div>
                        <?php 
                            if($desc!=0) {
                                echo '<div class="descuent">'.$desc.'%</div>';
                            }
                        ?>
                        <div class="efecto">
                            <a href="#" class="">
                                <img class="img-fluid image" width="240" height="240" src="img/<?php echo $imagen ?>">
                            </a>
                            <div class="overlay">
                                <div class="textDesc">
                                    <?php echo "<span>ID: $id </span><br><br>$descrip"; ?>
                                </div>
                            </div>
                        </div>
                        <h5 class="titulo"><?php echo $nombre ?></h5>
                        <p class="cate"><?php echo "- $catego -"; ?></p>
                        <h4 class="precio">
                            <?php
                                if($desc!=0) {
                                     echo "<p>$".$precio."</p>";
                                     echo "$".$precioN; 
                                } else {
                                     echo "<br>$".$precioN.""; 
                                }
                            ?>
                        </h4>
                        <br>
                        <p class="cantidad"><?php echo "Existencia: $cantidad"; ?></p>
                        <?php
                        if($agotado) {
                        ?>
                            <button id="<?php echo $numPro ?>" class="agotado" disabled>
                                <i class="fa-solid fa-circle-exclamation" style="color: #ffffff;"></i>
                                Producto agotado
                            </button>
                        <?php
                        } else {
                        ?> 
                            <button id="<?php echo $numPro ?>" onclick="agregar(this.id)">
                                <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                Añadir al carrito
                            </button>
                        <?php
                        }
                        ?>
                        
                        <br><br>
                    </div>
                <?php
                        $numPro = $numPro+1;
                        $new = $new+1;
                        if($new==8) {
                            break;
                        }
                    }//fin while
                ?>
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn" id="botontienda">
                <a href="tienda.php">Ver más productos</a>
            </button>
        </div>
    </section>

    <br><br><br><br><br>
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
    
    <script>
        console.log(array); 
        
        function agregar(id) {
            var indice = parseInt(id);
            console.log(`Elegiste ${array[indice]}`);
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
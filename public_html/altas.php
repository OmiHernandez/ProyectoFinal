<!DOCTYPE html>
<html lang="es_mx">

<?php
    $servidor='localhost:33065';
    $cuenta='root';
    $password='';
    $bd='botanical';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno) {
        die('Error en la conexion');
    }
      
    if (isset($_POST['submit']) && $_POST['metodo'] == "AltaProducto" && isset($_FILES["Imagen"]) && !(empty($_FILES["Imagen"]["tmp_name"]))) {
        $nac = date("Y", strtotime($_POST['Nacimiento']));
        $Actual = date('Y');
        $edad = $Actual - $nac;

        /*Nombre -
	    Descripcion	-
	    Categoria -
	    Cantidad -
	    Precio -
	    Descuento -
	    imagen -
	    PrecioN*/

        $Nombre = $_POST['Nombre'];
        $Descripcion = $_POST['Descripcion'];
        $Categoria = $_POST['Categoria'];
        $Cantidad =  $_POST['Cantidad'];
        $Precio = $_POST['Precio'];
        $Descuento = $_POST['Descuento'];

        $targetDir = "img/";  // Directorio donde se guardarán las imágenes
        $Imagen = $targetDir . basename($_FILES["Imagen"]["name"]);

        if($Descuento!=0) {
            $aux=$Precio*($Descuento/100);
            $PrecioN=$Precio-$aux;
        } else {
            $PrecioN=$Precio;
        }
        
        $sql = "INSERT INTO productos
                VALUES(default, '$Nombre', '$Descripcion', '$Categoria', $Cantidad, $Precio, 
                $Descuento, '$Imagen', $PrecioN)";
        $resultado = $conexion->query($sql); //aplicamos sentencia
      }

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Garden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/altas.css">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f097015f8a.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logoWF.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <?php
        include("login.php");
    ?>

    <br><br>

    <section >
        <div class="Movie">
            <h1>Bienvenido Admin</h1>
            <h5>Panel de control productos</h5>
        </div>
        <br>
        <div class="separacion"></div>
        <br>
        <div class="modificacion">
            <div>
                <a href="#">
                    <p>Altas</p>
                </a>
            </div>
            <div>
                <a href="#">
                    <p>Bajas</p>
                </a>
            </div>
            <div>
                <a href="#">
                    <p>Cambios</p>
                </a>
            </div>
        </div>
    </section>

    <section class="altas">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario">
        <legend>
            <h1>Agregar producto nuevo</h1>
        </legend>
        <table>
            <tr>
            <td class="form-group">
                <label for="NombreP">Nombre del producto:</label>
                <input type="Text" class="form-control" id="NombreP" placeholder="" name="Nombre" required>
            </td>
            <td class="form-group">
                <label for="CategoriaP">Categoría</label>
                <select class="form-control" id="CategoriaP" placeholder="Seleccionar..." name="Categoria">
                <option value="Sombra">Sombra</option>
                <option value="Sol">Sol</option>
                </select>
            </td>
            <td class="form-group">
                <label for="ImagenP">Imagen</label>
                <input type="file" class="form-control subirfoto" id="ImagenP" name="Imagen" required>
            </td>
            </tr>
            <tr>
            <td class="form-group">
                <label for="CantidadP">Cantidad</label>
                <input type="Number" class="form-control" id="CantidadP" placeholder="" name="Cantidad" min="0" max="999" required>
            </td>
            <td class="form-group">
                <label for="PrecioP">Precio</label>
                <input type="Number" class="form-control" id="PrecioP" placeholder="" name="Precio" min="0" max="999" required>
            </td>
            <td class="form-group">
                <label for="DescuentoP">Descuento</label>
                <input type="Number" class="form-control" id="DescuentoP" placeholder="" name="Descuento" min="0" max="100" required>
            </td>
            </tr>
            <tr>
            <td class="form-group" colspan="3">
                <label for="DescripcionP">Descripción:</label>
                <textarea class="form-control" id="DescripcionP" rows="2" name="Descripcion" required></textarea>
            </td>
            </tr>
            <tr>
            <td colspan="3" style="text-align: center;">
                <input type="text" name="metodo" value="AltaProducto" hidden>
                <button type="submit" class="btn botonenviar" name="submit">Publicar</button>
            </td>
            </tr>
        </table>
        </form>
    </section>
    <br>
    <section class="productos">
        <div>
            <div class="container"> 
                <div class="row">
                    <?php
                        $numPro = 0;
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
                        }//fin while
                    ?>
                </div> <!--div row-->
            </div> <!--div cointaier-->
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
    
    <script>
        console.log(array);    
        
        function agregar(id){
            var indice = parseInt(id);
            console.log(`Elegiste ${array[indice]}`);       
            
        }
    </script>
</body>

</html>
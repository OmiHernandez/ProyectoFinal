<?php
// Configuración de la conexión a la base de datos
$servername = "localhost:3029";
$username = "root";
$password = "";
$dbname = "botanical";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="es_mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Garden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f097015f8a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/x-icon" href="img/logoWF.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>

    <?php include("login.php"); ?>

    <header>
        <!-- Encabezado del carrito -->
        <h1>Carrito de Compras</h1>
    </header>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <section class="carrito-container">
                    <?php
                    // Inicializa el total del carrito
                    $totalCarrito = 0;
                    $cantidadtotal = 0;
                    // Verifica si hay productos en el carrito
                    if (!empty($_SESSION['carrito'])) {
                        // Inicializa un arreglo para contar las ocurrencias de cada ID en el carrito
                        $ocurrencias = array_count_values($_SESSION['carrito']);
                        // Itera sobre los productos en el carrito
                        foreach ($ocurrencias as $producto_id => $cantidadEnCarrito) {
                            // Consulta SQL para obtener información detallada del producto
                            $sql = "SELECT * FROM productos WHERE id = $producto_id";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Obtiene los datos del producto
                                $producto = $result->fetch_assoc();

                                // Verifica si hay suficiente existencia del producto
                                if ($cantidadEnCarrito > $producto['Cantidad']) {
                                    // Si la cantidad pedida es mayor que la existencia, muestra un mensaje y no añade el producto al carrito
                                    echo "<p class='text-danger'>No hay suficiente existencia del producto '{$producto['Nombre']}'. Por favor, ajusta la cantidad en tu carrito.</p>";
                                    continue; // Salta a la próxima iteración
                                }
                                
                                // Calcula el subtotal por producto
                                $subtotal = $cantidadEnCarrito * ($producto['PrecioN'] == 0 ? $producto['Precio'] : $producto['PrecioN']);
                                $cantidadtotal += $cantidadEnCarrito;
                                // Actualiza el total del carrito
                                $totalCarrito += $subtotal;
                                $_SESSION["totalcar"]=$totalCarrito;
                                $_SESSION["totalcant"]=$cantidadtotal;
                    ?>
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="img/productos/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['Nombre']; ?></h5>
                                                <p class="card-text"><?php echo $producto['Descripcion']; ?></p>
                                                <p class="card-text"><small class="text-muted precio-valor"><?php echo $producto['PrecioN'] == 0 ? $producto['Precio'] : $producto['PrecioN']; ?></small></p>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="cantidad-<?php echo $producto_id; ?>">Cantidad</label>
                                                    </div>
                                                    <input type="number" min="0" max="<?php echo $producto['Cantidad']; ?>" value="<?php echo $cantidadEnCarrito; ?>" name="cantidad[]" id="cantidad-<?php echo $producto_id; ?>" data-producto-id="<?php echo $producto_id; ?>" class="form-control cantidad-input text-center">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger" type="button" onclick="eliminarProducto(<?php echo $producto_id; ?>)">Eliminar</button>
                                                    </div>
                                                </div>
                                                <p class="card-text"><small class="text-muted subtotal-valor">Subtotal: $<?php echo number_format($subtotal, 2); ?></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    } else {
                        // Muestra un mensaje si el carrito está vacío
                        echo "<p class='text-center'>El carrito está vacío.</p>";
                    }
                    ?>
                </section>
            </div>
            <div class="col-md-4">
                <section class="total-carrito">
                    <!-- Muestra el total de la cuenta del carrito -->
                    <h2>Total del Carrito: $<span id="total-carrito-valor"><?php echo number_format($totalCarrito, 2); ?></span></h2>
                    <button onclick="realizarCompra();" class="btn btn-primary btn-block mb-3">Realizar Compra</button>
                    <button onclick="eliminarTodos();" class="btn btn-danger btn-block">Vaciar Carrito</button>
                </section>
            </div>
        </div>
    </main>




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
                <<ul class="nav justify-content-center">
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

    <script>
        // Obtener todos los elementos de entrada de cantidad
        const cantidadInputs = document.querySelectorAll('.cantidad-input');

        // Agregar un controlador de eventos de cambio a cada entrada de cantidad
        function realizarCompra(){
            if (!empty($_SESSION['carrito'])) {
             location.href ="realizarcompra.php";   
            }
        }

        cantidadInputs.forEach(input => {
            input.addEventListener('input', actualizarSubtotal);
        });

        // Función para actualizar el subtotal y el total del carrito
        function actualizarSubtotal() {
            let totalCarrito = 0;

            cantidadInputs.forEach(input => {
                const cantidad = parseInt(input.value);
                const precio = parseFloat(input.closest('.row').querySelector('.precio-valor').innerText.replace('$', ''));
                const subtotal = cantidad * precio;

                totalCarrito += subtotal;

                // Actualizar el valor del subtotal en el DOM
                input.closest('.row').querySelector('.subtotal-valor').innerText = `$${subtotal.toFixed(2)}`;
            });

            // Actualizar el valor total del carrito en el DOM
            document.getElementById('total-carrito-valor').innerText = `${totalCarrito.toFixed(2)}`;
        }

        // Función para eliminar un producto del carrito
        function eliminarProducto(productoId) {
            // Hacer una solicitud AJAX para eliminar el producto del carrito

            fetch(`eliminar_del_carrito.php?producto_id=${productoId}`, {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Actualizar la vista del carrito después de eliminar el producto
                        // Puedes recargar la página completa o realizar una actualización dinámica usando JavaScript
                        location.reload(); // Esto recargará toda la página
                        // O puedes actualizar solo la sección del carrito usando AJAX
                        // Aquí es donde realizarías una actualización dinámica
                    } else {
                        console.error('Error al eliminar el producto del carrito');
                    }
                })
                .catch(error => {
                    console.error('Error de red:', error);
                });
        }

        function eliminarTodos() {
            // Hacer una solicitud AJAX para eliminar todos los productos del carrito
            // Puedes usar fetch o jQuery.ajax para hacer la solicitud al servidor
            // Después de eliminar los productos, puedes recargar la página o actualizar dinámicamente la sección del carrito mediante AJAX
            // Aquí es un ejemplo simple usando fetch:

            fetch('eliminar_del_carrito.php?eliminar_todo=1', {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Actualizar la vista del carrito después de eliminar todos los productos
                        // Puedes recargar la página completa o realizar una actualización dinámica usando JavaScript
                        location.reload(); // Esto recargará toda la página
                        // O puedes actualizar solo la sección del carrito usando AJAX
                        // Aquí es donde realizarías una actualización dinámica
                    } else {
                        console.error('Error al eliminar todos los productos del carrito');
                    }
                })
                .catch(error => {
                    console.error('Error de red:', error);
                });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>



</html>
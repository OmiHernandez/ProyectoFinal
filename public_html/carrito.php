<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
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
        <section class="carrito-container">
            <?php
            // Verifica si hay productos en el carrito
            if (!empty($_SESSION['carrito'])) {
                // Inicializa un arreglo para contar las ocurrencias de cada ID en el carrito
                $ocurrencias = array_count_values($_SESSION['carrito']);

                // Inicializa el total del carrito
                $totalCarrito = 0;

                // Itera sobre los productos en el carrito
                foreach ($ocurrencias as $producto_id => $cantidadEnCarrito) {
                    // Consulta SQL para obtener información detallada del producto
                    $sql = "SELECT * FROM productos WHERE id = $producto_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Obtiene los datos del producto
                        $producto = $result->fetch_assoc();

                        // Calcula el subtotal por producto
                        $subtotal = $cantidadEnCarrito * ($producto['PrecioN'] == 0 ? $producto['Precio'] : $producto['PrecioN']);

                        // Actualiza el total del carrito
                        $totalCarrito += $subtotal;
            ?>
                        <div class="row mb-4">
                            <div class="col-md-2 col-sm-12">
                                <div class="imagen">
                                    <!-- Muestra la imagen del producto -->
                                    <img src="img/productos/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="descripcion">
                                    <!-- Muestra el nombre y la descripción del producto -->
                                    <h3><?php echo $producto['Nombre']; ?></h3>
                                    <p><?php echo $producto['Descripcion']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-12">
                                <div class="precio">
                                    <!-- Muestra el precio del producto -->
                                    <h3>Precio</h3>
                                    <p class="precio-valor">$<?php echo $producto['PrecioN'] == 0 ? $producto['Precio'] : $producto['PrecioN']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="cantidad">
                                    <!-- Muestra la cantidad deseada del producto -->
                                    <h3>Cantidad</h3>
                                    <input type="number" min="0" max="<?php echo $producto['Cantidad']; ?>" value="<?php echo $cantidadEnCarrito; ?>" name="cantidad[]" data-producto-id="<?php echo $producto_id; ?>" class="form-control cantidad-input">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="subtotal">
                                    <!-- Muestra el subtotal por producto -->
                                    <h3>Subtotal</h3>
                                    <p class="subtotal-valor">$<?php echo number_format($subtotal, 2); ?></p>
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
            // Cierra la conexión a la base de datos
            $conn->close();
            ?>
        </section>

        <section class="total-carrito">
            <!-- Muestra el total de la cuenta del carrito -->
            <h2>Total del Carrito: $<span id="total-carrito-valor"><?php echo number_format($totalCarrito, 2); ?></span></h2>
            <button onclick="realizarCompra()" class="btn btn-primary">Realizar Compra</button>
        </section>
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
        // Obtener todos los elementos de entrada de cantidad
        const cantidadInputs = document.querySelectorAll('.cantidad-input');

        // Agregar un controlador de eventos de cambio a cada entrada de cantidad
        cantidadInputs.forEach(input => {
            input.addEventListener('input', actualizarSubtotal);
        });

        // Función para actualizar el subtotal y el total del carrito
        function actualizarSubtotal() {
            let totalCarrito = 0;

            cantidadInputs.forEach(input => {
                const cantidad = parseInt(input.value);
                const precio = parseFloat(input.closest('.row').querySelector('.precio-valor').innerText.slice(1));
                const subtotal = cantidad * precio;

                totalCarrito += subtotal;

                // Actualizar el valor del subtotal en el DOM
                input.closest('.row').querySelector('.subtotal-valor').innerText = `$${subtotal.toFixed(2)}`;
            });

            // Actualizar el valor total del carrito en el DOM
            document.getElementById('total-carrito-valor').innerText = totalCarrito.toFixed(2);
        }
    </script>

</body>



</html>
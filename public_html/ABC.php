<!DOCTYPE html>
<html lang="es_mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Garden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/ABC.css">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f097015f8a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logoWF.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <style>
    .chart-container {
        display: flex;
        justify-content: space-around;
    }

    .chart {
        width: 45%;
    }
    </style>
</head>

<body>
    <?php
    include("login.php");

    
    ?>

    <br><br>

    <section>
        <div class="Movie">
            <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
            <h5>Panel de control productos</h5>
        </div>
        <br>
        <div class="separacion"></div>
        <br>

    </section>
    <section>
        <div class="chart-container">
            <div class="chart">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="chart">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
        <br>
        <div class="separacion"></div>
        <br>
    </section>

    <section class="altas">
        <form action="" method="post" class="formulario" enctype="multipart/form-data">
            <legend>
                <h1>Agregar producto nuevo</h1>
            </legend>
            <hr>
            <table style="width:100%;">
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
                        <label for="foto">Imagen</label>
                        <input type="file" class="form-control subirfile" id="foto" name="foto" required>
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
                        <button type="button" class="btn botonenviar" name="submit" onclick="agregar()">Publicar</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>

    <br>

    <section class="productos">
        <div class="Movie">
            <h1>Lista de productos</h1>
        </div>
        <div class="separacion"></div>
        <br><br>
        <div>
            <div class="container">
                <div class="row">
                    <?php
                    $resultado = $conexion->query("select * from productos order by ID desc");
                    ?>
                    <script>
                        var array = [];
                    </script>
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                        $imagen = $fila['imagen'];
                        $nombre = $fila['Nombre'];
                        $id = $fila['ID'];
                        $descrip = $fila['Descripcion'];
                        $catego = $fila['Categoria'];
                        $precio = $fila['Precio'];
                        $precioN = $fila['PrecioN'];
                        $desc = $fila['Descuento'];
                        $cantidad = $fila['Cantidad'];

                    ?>
                        <script>
                        </script>

                        <div class="product"><!-- col-md-3 col-sm-6  -->
                            <div class="separacion2"></div>
                            <?php
                            if ($desc != 0) {
                                echo '<div class="descuent">' . $desc . '%</div>';
                            }
                            ?>
                            <div class="efecto">
                                <a href="#" class="">
                                    <img class="img-fluid image" width="240" height="240" src="img/productos/<?php echo $imagen ?>">
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
                                if ($desc != 0) {
                                    echo "<p>$" . $precio . "</p>";
                                    echo "$" . $precioN;
                                } else {
                                    echo "<br>$" . $precioN . "";
                                }
                                ?>
                            </h4>
                            <br>
                            <p class="cantidad"><?php echo "Existencia: $cantidad"; ?></p>
                            <div class="modificacion">
                                <div>
                                    <button onclick="eliminarProducto(<?php echo $id; ?>)">
                                        <p>Eliminar producto</p>
                                    </button>
                                </div>
                                <div>
                                    <button onclick="modificar(<?php echo $id ?>)">
                                        <p>Modificar producto</p>
                                    </button>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    <?php
                    } //fin while
                    ?>
                </div>
            </div>
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
        function agregar() {
            var form = document.querySelector('.formulario');
            var formData = new FormData(form);

            fetch('procesarAlta.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire('Éxito', 'Los datos fueron enviados correctamente', 'success')
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                    } else {
                        Swal.fire('Error', data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Error', error, 'error');
                });
        }

        function eliminarProducto(id) {
            Swal.fire({
                title: "¿Desea eliminar este producto?",
                text: "La acción no se podrá revertir.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Crear una instancia de XMLHttpRequest
                    var xhr = new XMLHttpRequest();

                    // Configurar la solicitud
                    xhr.open("POST", "procesarBaja.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    // Definir la función de devolución de llamada cuando la solicitud se complete
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            // Procesar la respuesta del servidor
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    Swal.fire({
                                            title: "Eliminado",
                                            text: "El producto con ID " + id + " ha sido eliminado.",
                                            icon: "success"
                                        })
                                        .then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                } else {
                                    Swal.fire({
                                        title: "Error",
                                        text: "No se pudo eliminar el producto.",
                                        icon: "error"
                                    });
                                }
                            } else {
                                console.error("Error en la solicitud AJAX");
                            }
                        }
                    };

                    // Enviar la solicitud con el ID como parámetro
                    xhr.send("id=" + id);
                }
            });
        }

        function modificar(id) {
            // Crear una instancia de XMLHttpRequest
            var xhr = new XMLHttpRequest();
            // Configurar la solicitud
            xhr.open("POST", "obtenerProducto.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            // Definir la función de devolución de llamada cuando la solicitud se complete
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    // Procesar la respuesta del servidor
                    if (xhr.status === 200) {
                        var producto = JSON.parse(xhr.responseText);
                        // Crear un formulario HTML
                        var formularioHTML = `
                                <form id="modificarForm">
                                    <input type="hidden" name="id" value="${id}">
                                    <label for="NombreP">Nombre del producto:</label>
                                    <input type="text" class="form-control" id="NombreP" name="NombreP" value="${producto.Nombre}" required>
                                    <br>
                                    <label for="CategoriaP">Categoría:</label>
                                    <select class="form-control" id="CategoriaP" name="CategoriaP" required>
                                        <option value="Sombra" ${producto.Categoria === 'Sombra' ? 'selected' : ''}>Sombra</option>
                                        <option value="Sol" ${producto.Categoria === 'Sol' ? 'selected' : ''}>Sol</option>
                                    </select>
                                    <br>
                                    <label for="fotoMod">Imagen actual:</label>
                                    <br>
                                    <img src="img/productos/${producto.imagen}" alt="${producto.imagen}" width="100" height="100">
                                    <br>
                                    <label for="fotoMod">Nueva imagen:</label>
                                    <input type="file" class="form-control subirfile" id="fotoMod" name="fotoMod" required>
                                    <br>
                                    <label for="CantidadP">Cantidad:</label>
                                    <input type="number" class="form-control" id="CantidadP" name="CantidadP" value="${producto.Cantidad}" min="0" max="999" required>
                                    <br>
                                    <label for="PrecioP">Precio:</label>
                                    <input type="number" class="form-control" id="PrecioP" name="PrecioP" value="${producto.Precio}" min="0" max="999" required>
                                    <br>
                                    <label for="DescuentoP">Descuento:</label>
                                    <input type="number" class="form-control" id="DescuentoP" name="DescuentoP" value="${producto.Descuento}" min="0" max="100" required>
                                    <br>
                                    <label for="DescripcionP">Descripción:</label>
                                    <textarea class="form-control" id="DescripcionP" name="DescripcionP" rows="2" required>${producto.Descripcion}</textarea>
                                </form>
                            `;

                        // Mostrar una alerta con SweetAlert que contiene el formulario
                        Swal.fire({
                            title: 'Modificación de producto nuevo',
                            html: formularioHTML,
                            showCancelButton: true,
                            confirmButtonText: 'Enviar',
                            cancelButtonText: 'Cancelar',
                            showLoaderOnConfirm: true,
                            preConfirm: () => {
                                var form = document.querySelector('#modificarForm');
                                var formData = new FormData(form);
                                fetch('procesarModificacion.php', {
                                        method: 'POST',
                                        body: formData, // Envía el objeto FormData
                                    })
                                    .then(data => {
                                        Swal.fire('Éxito', data.message, 'success')
                                            .then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.reload();
                                                }
                                            });
                                    })
                                    .catch(error => {
                                        console.error(error);
                                        Swal.fire('Error', 'Hubo un error al procesar la solicitud', 'error');
                                    });
                            }
                        });
                    } else {
                        console.error("Error en la solicitud AJAX");
                    }
                }
            };
            // Enviar la solicitud con el ID como parámetro
            xhr.send("id=" + encodeURIComponent(id));
        }

        var ctx1 = document.getElementById('myChart1').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [7, 11, 5, 8, 3, 7],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
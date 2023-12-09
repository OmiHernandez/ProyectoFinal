<script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
<?php

$servidor = 'localhost:3029';
$cuenta = 'root';
$password = '';
$bd = 'botanical';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

date_default_timezone_set('America/Mexico_City');

$horaActual = date("G");
session_start();

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function AbrirModal1() {
        $('#modal1').modal('show');
    }

    function AbrirModal2() {
        $('#modal1').modal('hide');
        $('#modal2').modal('show');
    }

    function AbrirModal3() {
        $('#modal1').modal('hide');
        $('#modal3').modal('show');
    }

    function Volver() {
        $('#modal3').modal('hide');
        $('#modal2').modal('hide');
        $('#modal1').modal('show');
    }

    function Validaciones() {
        $contra1 = document.getElementById('cons').value;
        $contra2 = document.getElementById('recons').value;
        if ($contra1.length < 8) {
            swal("Error", "La contraseña es muy debil (minimo 8 caracteres)", "error");
        } else {
            if ($contra1 == $contra2) {
                let formulario = document.getElementById('formularioregistro');
                formulario.submit();
            } else {
                swal("Error", "Las contraseñas no coinciden", "error");
            }
        }
    }

    function ValidarContra() {
        $contra1 = document.getElementById('consrec').value;
        $contra2 = document.getElementById('reconsrec').value;
        if ($contra1.length < 8) {
            swal("Error", "La contraseña es muy debil (minimo 8 caracteres)", "error");
        } else {
            if ($contra1 == $contra2) {
                let formulario = document.getElementById('recuperarcuen');
                formulario.submit();
            } else {
                swal("Error", "Las contraseñas no coinciden", "error");
            }
        }
    }

    function CambiarImage() {
        document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
    }
</script>

<header>

    <nav class="navbar navbar-expand-lg" style="background: #F7F2EE;">
        <a class="navbar-brand mb-0 h1" href="index.php">
            <img src="img/logo.png" width="90" height="90" class="d-inline-block align-top" alt="Logo de BotanicalG">
        </a>
        <a class="navbar-brand mb-0 h1" href="index.php" style="color: #5e7e66;">
            Botanical Garden
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="tienda.php">Tienda</a>
                </li>
                <li class="nav-item">
                    <div class="nav-item dropdown my-2 my-lg-0">
                        <a class="nav-link" style="color:black;" href="#" role="button" data-toggle="dropdown" aria-expanded="false"> Categorías </a>
                        <div class="dropdown-menu" style="background: #F7F2EE;">
                            <a class="dropdown-item" href="sombra.php">Sombra</a>
                            <a class="dropdown-item" href="sol.php">Sol</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="about.php">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="contact.php">Contáctanos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="ayuda.php">Ayuda</a>
                </li>
            </ul>

            <?php
            if (empty($_SESSION["nombre"])) {
            ?>
                <div class="nav-item my-2 my-lg-0">

                    <button type="button" id="btnModal1" class="btn" onclick="AbrirModal1()">Iniciar sesión / Crear una cuenta</button>

                    <div id="modal1" class="modal fade" role="dialog" style="overflow-y: hidden;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-tittle">Iniciar sesión</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="registrar.php" method="POST">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Usuario:</label>
                                                        <input type="text" name="usuario" class="form-control" id="recipient-name" value="<?php if (isset($_COOKIE["usuario"])) {
                                                                                                                                                echo $_COOKIE["usuario"];
                                                                                                                                            } ?>" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Contraseña:</label>
                                                        <input type="password" name="contraseña" class="form-control" id="recipient-name" value="<?php if (isset($_COOKIE["contraseña"])) {
                                                                                                                                                        echo $_COOKIE["contraseña"];
                                                                                                                                                    } ?>" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="elem-group">
                                                        <label for="captcha">Ingresa el siguiente captcha: </label>
                                                        <br>
                                                        <img src="captcha.php" alt="CAPTCHA" class="captcha-image"> <i class="fas fa-redo refresh-captcha" onclick="CambiarImage();" style="font-size:30px;"></i>
                                                        <br><br>
                                                        <input type="text" id="captcha" class="form-control" name="respcaptcha" pattern="[A-Z]{6}">
                                                        <br>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="recordar" id="recordar"><label for="recordar" class="form-check-label"> Recordar contraseña</label></td>
                                            </tr>
                                        </table>
                                        <input type="text" value="iniciar" name="metodo" hidden>
                                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                    </form>
                                    <p>¿Cuenta bloqueada?<button type="button" class="btn" id="btnModal3" onclick="AbrirModal3()">Recuperar cuenta</button></p>

                                </div>
                                <div class="modal-footer">
                                    <p>¿No tienes cuenta? </p>
                                    <button type="button" class="btn" id="btnModal2" onclick="AbrirModal2()">Registrarse</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="modal2" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-tittle">Registrarse</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="registrar.php" method="POST" id="formularioregistro">
                                        <table>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                                                        <input type="text" name="nombre" class="form-control" id="recipient-name" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Usuario:</label>
                                                        <input type="text" name="usuario" class="form-control" id="recipient-name idr1" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Correo:</label>
                                                        <input type="email" name="correo" class="form-control" id="recipient-name" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Contraseña:</label>
                                                        <input type="password" name="contraseña" class="form-control" id="cons" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Pregunta de seguridad:</label>
                                                        <select name="pregunta" class="custom-select">
                                                            <option value="¿Nombre de tu primera mascota?">¿Nombre de tu primera mascota?</option>
                                                            <option value="¿Lugar de nacimiento de tu madre?">¿Lugar de nacimiento de tu madre?</option>
                                                            <option value="¿Nombre de tu abuelo paterno?">¿Nombre de tu abuelo paterno?</option>
                                                            <option value="¿Ciudad donde estudiaste la primaria?">¿Ciudad donde estudiaste la primaria?</option>
                                                            <option value="¿Nombre del primer colegio al que asististe?">¿Nombre del primer colegio al que asististe?</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Repetir contraseña:</label>
                                                        <input type="password" name="repcontraseña" class="form-control" id="recons" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Respuesta:</label>
                                                        <input type="text" name="respuesta" class="form-control" id="recipient-name" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" value="registrar" name="metodo" hidden>
                                                    <button type="button" class="btn btn-primary" onclick="Validaciones();">Registrarse</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <p>¿Ya tienes cuenta? </p>
                                    <button type="button" class="btn" id="btnModal2" onclick="Volver()">Iniciar sesión</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div id="modal3" class="modal fade" role="dialog" style="overflow-y: hidden;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-tittle">Recuperar cuenta.</h4>
                            </div>
                            <div class="modal-body">
                                <form action="registrar.php" method="POST" id="recuperarcuen">
                                    <table>
                                        <tr>
                                            <td colspan="2">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Usuario:</label>
                                                    <input type="text" name="usuario" class="form-control" id="recipient-name" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Pregunta de seguridad:</label>
                                                    <select name="pregunta" class="custom-select">
                                                        <option value="¿Nombre de tu primera mascota?">¿Nombre de tu primera mascota?</option>
                                                        <option value="¿Lugar de nacimiento de tu madre?">¿Lugar de nacimiento de tu madre?</option>
                                                        <option value="¿Nombre de tu abuelo paterno?">¿Nombre de tu abuelo paterno?</option>
                                                        <option value="¿Ciudad donde estudiaste la primaria?">¿Ciudad donde estudiaste la primaria?</option>
                                                        <option value="¿Nombre del primer colegio al que asististe?">¿Nombre del primer colegio al que asististe?</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Contraseña:</label>
                                                    <input type="password" name="contraseña" class="form-control" id="consrec" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Respuesta:</label>
                                                    <input type="text" name="respuesta" class="form-control" id="recipient-name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Repetir contraseña:</label>
                                                    <input type="password" name="repcontraseña" class="form-control" id="reconsrec" required>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="text" value="recuperarcuenta" name="metodo" hidden>
                                    <button type="button" class="btn btn-primary" onclick="ValidarContra();">Enviar</button>
                                </form>
                                <p>¿Cuenta bloqueada?<button type="button" class="btn" id="btnModal3" onclick="AbrirModal3()">Recuperar cuenta</button></p>

                            </div>
                            <div class="modal-footer">
                                <p>¿Volver? </p>
                                <button type="button" class="btn" id="btnModal3" onclick="Volver()">Iniciar sesión</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="nav-item dropdown my-2 my-lg-0">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php switch ($horaActual) {
                            case ($horaActual >= 18 || $horaActual <= 5): {
                                    echo "¡Buenas noches ";
                                    break;
                                }
                            case ($horaActual >= 6 && $horaActual <= 11): {
                                    echo "¡Buenos dias ";
                                    break;
                                }
                            case ($horaActual >= 12 && $horaActual <= 17): {
                                    echo "¡Buenas tardes ";
                                    break;
                                }
                        }
                        echo $_SESSION["nombre"] . "!"; ?>
                    </a>
                    <div class="dropdown-menu">
                        <?php if ($_SESSION["nombre"] == "admin") { ?>
                            <a class="dropdown-item" href="ABC.php">Administrar productos</a>
                        <?php } ?>
                        <a class="dropdown-item" href="tienda.php">Categorías</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>

                    </div>
                </div>
                <div>
                    <a href="carrito.php">
                        <i class="fa-solid fa-cart-shopping" style="color:#968475;"></i>
                        <div id="cantidad-en-carrito" style="color:#968475;">&nbsp;<?php if (isset($_SESSION['carrito'])) {
                                                                                        echo count($_SESSION['carrito']);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?></div>
                    </a>
                </div>

            <?php
            }

            ?>

        </div>
    </nav>

</header>
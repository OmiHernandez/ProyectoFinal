<?php

$servidor = 'localhost:33065';
$cuenta = 'root';
$password = '';
$bd = 'botanical';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

$resultado = $conexion->query($sql);

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
        $('#modal3').modal('show');
    }

    function Volver() {
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
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Usuario:</label>
                                            <input type="text" name="usuario" class="form-control" id="recipient-name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Contraseña:</label>
                                            <input type="password" name="contraseña" class="form-control" id="recipient-name" required>
                                        </div>
                                        <input type="text" value="iniciar" name="metodo" hidden>
                                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                    </form>
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
                        <a class="dropdown-item" href="formulario.php">Vacantes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>
                    </div>

                </div>
            <?php
            }
            ?>

        </div>
    </nav>

</header>
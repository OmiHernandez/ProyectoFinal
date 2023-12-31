<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/registrar.css">
<link rel="stylesheet" href="css/menu.css">

<div class="log">
    <img src="img/logo.png" alt="Logo Botanical" height="200" width="200">
</div>
<?php


$servidor = '127.0.0.1:3306';
$cuenta = 'u690567133_admin';
$password = 'MHVGLAZ_Botanical1.';
$bd = 'u690567133_botanical';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);

session_start();
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    session_destroy();
    header("Location: index.php");
}

ob_start();


if ($_POST["metodo"] == "registrar") {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $contra = $_POST["contraseña"];
    $correo = $_POST["correo"];
    $pregunta = $_POST["pregunta"];
    $respuesta = $_POST["respuesta"];

    $hash = password_hash($contra, PASSWORD_DEFAULT);

    $sql = 'select * from cuenta where Usuario="' . $usuario . '"';
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows) {
?>

        <div class="alert alert-danger" role="alert" id="alerta">
            <h4 class="alert-heading">Error.</h4>
            <p>El usuario ya existe.</p>
            <hr>
            <h6 class="mb-0">Esta siendo redireccionado.</h6>
        </div>
        <br>
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
    <?php
        header("refresh:6;url=index.php");
        exit();
    }

    $sql = 'select * from cuenta where Correo="' . $correo . '"';
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows) {
    ?>

        <div class="alert alert-danger" role="alert" id="alerta">
            <h4 class="alert-heading">Error.</h4>
            <p>Este correo ya esta siendo utilizado.</p>
            <hr>
            <h6 class="mb-0">Esta siendo redireccionado.</h6>
        </div>
        <br>
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
    <?php
        header("refresh:6;url=index.php");
        exit();
    }

    $fecha_registro = date('Y-m-d');

    $sql = "INSERT INTO cuenta
          VALUES(default, '$usuario', '$correo', '$hash', '$pregunta', '$respuesta', '$nombre', default, 0, '$fecha_registro')";
    $resultado = $conexion->query($sql);

    $_SESSION["nombre"] = $usuario;
    $_SESSION["correo"] = $correo;

    ?>

    <div class="alert alert-success" role="alert" id="alerta">
        <h4 class="alert-heading">Registro exitoso.</h4>
        <p>Se ha registrado correctamente.</p>
        <hr>
        <h6 class="mb-0">Esta siendo redireccionado.</h6>
    </div>
    <br>
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
    <?php

    header("refresh:6;url=index.php");
    exit();
} else if ($_POST["metodo"] == "iniciar") {
    $usuario = $_POST["usuario"];
    $contra = $_POST["contraseña"];

    if (!isset($_POST['respcaptcha']) || $_POST['respcaptcha'] != $_SESSION['captcha_text']) {
        $_SESSION['captcha_text'] = ""
    ?>
        <div class="alert alert-danger" role="alert" id="alerta">
            <h4 class="alert-heading">Error.</h4>
            <p>Captcha incorrecto.</p>
            <hr>
            <h6 class="mb-0">Esta siendo redireccionado.</h6>
        </div>
        <br>
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
        <?php
        header("refresh:6;url=index.php");
        exit();
    }


    $sql = 'SELECT usuario, correo, contraseña, bloqueo FROM cuenta';
    $resultado = $conexion->query($sql);
    $existeCuenta = false;

    if ($resultado->num_rows) { //Si la consulta genera registros
        while ($fila = $resultado->fetch_assoc()) { //Recorremos los registros obtenidos de la tabla
            if ($usuario === $fila['usuario'] || $usuario === $fila['correo']) {
                $existeUsuario = true;

                if ($fila['bloqueo'] < 3) {
                    if (password_verify($contra, $fila['contraseña'])) {
                        if (!empty($_POST["recordar"])) {
                            setcookie("usuario", $_POST["usuario"], time() + (86400 * 30));
                            setcookie("contraseña", $_POST["contraseña"], time() + (86400 * 30));
                        } else {
                            setcookie("usuario", "");
                            setcookie("contraseña", "");
                        }

                        $_SESSION["nombre"] = $fila['usuario'];
                        $_SESSION["correo"] = $fila['correo'];

                        $sql = "UPDATE cuenta SET bloqueo=0 WHERE usuario='$usuario' OR correo='$usuario'";
                        $conexion->query($sql);
        ?>

                        <div class="alert alert-success" role="alert" id="alerta">
                            <h4 class="alert-heading">Inicio de sesión exitoso.</h4>
                            <p>Bienvenido de nuevo</p>
                            <hr>
                            <h6 class="mb-0">Esta siendo redireccionado.</h6>
                        </div>

                    <?php
                        header("refresh:6;url=index.php");
                        exit();
                    } else {
                        $insertarBloqueo = $fila['bloqueo'] + 1;
                        $sql = "UPDATE cuenta SET bloqueo='$insertarBloqueo' WHERE usuario='$usuario' OR correo='$usuario'";
                        $conexion->query($sql);
                    ?>

                        <div class="alert alert-danger" role="alert" id="alerta">
                            <h4 class="alert-heading">Contraseña incorrecta</h4>
                            <p>Vuelve a intentar.</p>
                            <hr>
                            <h6 class="mb-0">Esta siendo redireccionado.</h6>
                        </div>

                    <?php
                        header("refresh:6;url=index.php");
                        exit();
                    }
                } else {
                    ?>

                    <div class="alert alert-danger" role="alert" id="alerta">
                        <h4 class="alert-heading">Cuenta Bloqueada</h4>
                        <p>Se ha alcanzado el límite de intentos.</p>
                        <hr>
                        <h6 class="mb-0">Esta siendo redireccionado.</h6>
                    </div>

            <?php
                    header("refresh:6;url=index.php");
                    exit();
                }
            }
        }
        if (!$existeCuenta) {
            ?>

            <div class="alert alert-danger" role="alert" id="alerta">
                <h4 class="alert-heading">Cuenta no registrada</h4>
                <p>La cuenta no existe, favor de registrarse.</p>
                <hr>
                <h6 class="mb-0">Esta siendo redireccionado.</h6>
            </div>

            <?php
            header("refresh:6;url=index.php");
            exit();
        }
    }
} else if ($_POST["metodo"] == "recuperarcuenta") {
    $usuario = $_POST["usuario"];
    $contra = $_POST["contraseña"];
    $pregunta = $_POST["pregunta"];
    $respuesta = $_POST["respuesta"];
    $hash = password_hash($contra, PASSWORD_DEFAULT);

    $sql = 'SELECT usuario, correo, contraseña, pregunta, respuesta, bloqueo FROM cuenta WHERE usuario="' . $usuario . '"';
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows) {
        while ($fila = $resultado->fetch_assoc()) {
            if ($pregunta === $fila["pregunta"] && $respuesta === $fila["respuesta"]) {

                $sql = 'UPDATE cuenta SET contraseña="' . $hash . '", bloqueo=0 WHERE usuario="' . $usuario . '"';
                $resultado = $conexion->query($sql);
            ?>
                <div class="alert alert-success" role="alert" id="alerta">
                    <h4 class="alert-heading">Contraseña cambiada.</h4>
                    <p>Se ha cambiado la contraseña satisfactoriamente</p>
                    <hr>
                    <h6 class="mb-0">Esta siendo redireccionado.</h6>
                </div>
                <br>
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
        <?php
                $_SESSION["nombre"] = $fila['usuario'];
                $_SESSION["correo"] = $fila['correo'];
                header("refresh:6;url=index.php");
                exit();
            }
        }
        ?>
        <div class="alert alert-danger" role="alert" id="alerta">
            <h4 class="alert-heading">Error.</h4>
            <p>Pregunta o respuesta incorrecta.</p>
            <hr>
            <h6 class="mb-0">Esta siendo redireccionado.</h6>
        </div>
        <br>
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
    <?php
        header("refresh:6;url=index.php");
        exit();
    } else {
    ?>
        <div class="alert alert-danger" role="alert" id="alerta">
            <h4 class="alert-heading">Error.</h4>
            <p>Usuario no encontrado.</p>
            <hr>
            <h6 class="mb-0">Esta siendo redireccionado.</h6>
        </div>
        <br>
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
                    <a class="flex-sm-fill text-sm-center nav-link text-light" href="about.php">Contactanos</a>
                    <a class="flex-sm-fill text-sm-center nav-link text-light" href="contact.php">Sobre nosotros...</a>
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
<?php
        header("refresh:6;url=index.php");
        exit();
    }
}

    /*
    $handle = fopen("text/cuentas.txt", "r");
    if ($handle === false) {
        die('No se pudo abrir el archivo.');
    }

    while (!feof($handle)) {
        $palabra = fscanf($handle, "%s%s%s");
        if ($palabra) {
            if ($palabra[0] == $usuario && $palabra[2] == $contra) {
        ?>
                <br>
                <div class="alert alert-success" role="alert" id="alerta">
                    <h4 class="alert-heading">¡Inicio de sesion exitoso!</h4>
                    <p>Bienvenid@ <?php echo $palabra[0] ?></p>
                    <hr>
                    <h6 class="mb-0">Esta siendo redireccionado.</h6>
                </div>
                <br>
                <footer>
                    <div class="foot">
                        <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                            <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                                <img src="img/logob.png" alt="Logo de MHVWare" height="130" width="130">
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
                                <a class="navbar-brand text-white">Empresa MHVWare | Todos los derechos reservados &copy;</a>
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
            <?php
                $_SESSION["nombre"] = $palabra[0];
                $_SESSION["correo"] = $palabra[1];
                header("refresh:6;url=index.php");
                exit();
            } else if ($palabra[0] == $usuario && $palabra[2] != $contra) {
            ?>
                <br>
                <div class="alert alert-danger" role="alert" id="alerta">
                    <h4 class="alert-heading">Error de inicio de sesión</h4>
                    <p>Error. Contraseña incorrecta.</p>
                    <hr>
                    <h6 class="mb-0">Esta siendo redireccionado.</h6>
                </div>
                <br>
                <footer>
                    <div class="foot">
                        <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                            <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                                <img src="img/logob.png" alt="Logo de MHVWare" height="130" width="130">
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
                                <a class="navbar-brand text-white">Empresa MHVWare | Todos los derechos reservados &copy;</a>
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
    <?php
                header("refresh:6;url=index.php");
                exit();
            }
        }
    }
    fclose($handle);
    ?>
    <br>
    <div class="alert alert-danger" role="alert" id="alerta">
        <h4 class="alert-heading">Error</h4>
        <p>Error de inicio de sesión</p>
        <hr>
        <p class="mb-0">Cuenta no encontrada. Por favor, cree una cuenta.</p>
        <h6 class="mb-0">Esta siendo redireccionado.</h6>
    </div>
    <br>
    <footer>
        <div class="foot">
            <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                    <img src="img/logob.png" alt="Logo de MHVWare" height="130" width="130">
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
                    <a class="navbar-brand text-white">Empresa MHVWare | Todos los derechos reservados &copy;</a>
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
    <?php
    header("refresh:6;url=index.php");
    exit();
} else if ($_POST["metodo"] == "examen") {
    $_SESSION["codigo"] = $_POST["excode"];
    $handle = fopen("text/banned.txt", "r");
    if ($handle === false) {
        die('No se pudo abrir el archivo.');
    }
    while (!feof($handle)) {
        $palabra = fscanf($handle, "%s%s");
        if ($palabra) {
            if ($_SESSION["nombre"] == $palabra[0] || $_POST["excode"] == $palabra[1]) {
    ?>
                <br>
                <div class="alert alert-danger" role="alert" id="alerta">
                    <h4 class="alert-heading">Error</h4>
                    <p>Error de acceso al examen</p>
                    <hr>
                    <p class="mb-0">Este usuario ya tomo el examen. Revise su correo.</p>
                    <h6 class="mb-0">Esta siendo redireccionado.</h6>
                </div>
                <br>
                <footer>
                    <div class="foot">
                        <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                            <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                                <img src="img/logob.png" alt="Logo de MHVWare" height="130" width="130">
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
                                <a class="navbar-brand text-white">Empresa MHVWare | Todos los derechos reservados &copy;</a>
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
            <?php
                header("refresh:6;url=index.php");
                exit();
            }
        }
    }
    fclose($handle);

    $handle = fopen("text/access.txt", "r");
    if ($handle === false) {
        die('No se pudo abrir el archivo.');
    }
    while (!feof($handle)) {
        $palabra = fscanf($handle, "%s%s");
        if ($palabra) {
            if ($_SESSION["nombre"] == $palabra[0] && $_POST["excode"] == $palabra[1]) {
                $_SESSION["codigo"] = $_POST["excode"];
            ?>
                <br>
                <div class="alert alert-success" role="alert" id="alerta">
                    <h4 class="alert-heading">¡Ingreso exitoso!</h4>
                    <p>Bienvenid@ <?php echo $palabra[0] ?>. MHVWare le desea suerte en su examen.</p>
                    <hr>
                    <h6 class="mb-0">Esta siendo redireccionado.</h6>
                </div>
                <br>
                <footer>
                    <div class="foot">
                        <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                            <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                                <img src="img/logob.png" alt="Logo de MHVWare" height="130" width="130">
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
                                <a class="navbar-brand text-white">Empresa MHVWare | Todos los derechos reservados &copy;</a>
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
    <?php
                header("refresh:6;url=examen.php");
                exit();
            }
        }
    }
    fclose($handle);

    ?>
    <br>
    <div class="alert alert-danger" role="alert" id="alerta">
        <h4 class="alert-heading">Error</h4>
        <p>Error de acceso al examen</p>
        <hr>
        <p class="mb-0">Codigo de examen incorrecto. / Codigo de examen no encontrado.</p>
        <h6 class="mb-0">Esta siendo redireccionado.</h6>
    </div>
    <br>
    <footer>
        <div class="foot">
            <nav class="nav nav-pills flex-column flex-sm-row align-items-center justify-content-center" id="navfoot">
                <a class="flex-sm-fill text-sm-center nav-link" href="index.php">
                    <img src="img/logob.png" alt="Logo de MHVWare" height="130" width="130">
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
                    <a class="navbar-brand text-white">Empresa MHVWare | Todos los derechos reservados &copy;</a>
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
<?php
    header("refresh:6;url=index.php");
    exit();
}
?>
*/
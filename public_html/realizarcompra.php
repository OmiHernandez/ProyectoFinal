<?php

session_start();
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
// if(!isset($_SESSION["nombre"])){
//     header("Location: index.php");
// }
$aux = 0;
$totalcar = 0;
$impuestos = 0;
if (!isset($_SESSION["impuesto"]) || !isset($_POST["metodo"])) {
    $_SESSION["impuesto"] = null;
    $_SESSION["envio"] = null;
    $_SESSION["cupon"] = null;
    $_SESSION["total"] = null;
    $_SESSION["metodoPago"] = null;
    $_SESSION["direccionEnvio"] = null;
    $_SESSION["numeroTarjeta"] = null;
}
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script>
    var metod = "<?php if (isset($_POST["metodo"])) {
                        echo $_POST["metodo"];
                    } else {
                        echo "no";
                    } ?>";

    console.log(metod);

    function abrirModal() {
        $('#modal1').modal('show');
        console.log("Llegue aqui");
    }

    function AdiosFormulario1() {
        document.getElementById('añadir').classList.remove('animate__animated', "animate__fadeInLeft");
        if (document.getElementById('añadir').checkValidity()) {
            document.getElementById('añadir').classList.add('animate__animated', "animate__fadeOutLeft");
            document.getElementById('añadir').addEventListener('animationend', () => {
                document.getElementById('añadir').submit();
            });
        } else {
            document.getElementById('añadir').classList.add('animate__animated', "animate__shakeX");
            document.getElementById('añadir').addEventListener('animationend', () => {
                document.getElementById('añadir').classList.remove('animate__animated', "animate__shakeX");
            });
        }
    }

    function AdiosFormularioCupon() {
        document.getElementById('formcupo').classList.remove('animate__animated', "animate__fadeInLeft");
        if (document.getElementById('cupons').value != "") {
            var xhr = new XMLHttpRequest();
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "usado") {
                        swal("Error", "Este cupon ya ha sido utilizado.", "error");
                    } else if (this.responseText == "no encontrado") {
                        swal("Error", "Este cupon no se ha encontrado.", "error");
                    } else {
                        swal("Felicidades", "Se ha aplicado tu cupón de " + this.responseText + "% de descuento!", "success");
                        document.getElementById('calccup').classList.remove('animate__animated', "animate__fadeInRight");
                        document.getElementById('calccup').classList.add('animate__animated', "animate__fadeOutRight", "animate__delay-1s");
                        document.getElementById('calccup').addEventListener('animationend', () => {
                            document.getElementById('calccup').innerHTML = "";
                            document.getElementById('calccup').innerHTML = "<span style='color:#b8ffb8;'>" + this.responseText + "%</span>";
                            document.getElementById('calccup').classList.remove('animate__animated', "animate__fadeOutRight", "animate__delay-1s");
                            document.getElementById('calccup').classList.add('animate__animated', "animate__fadeInRight");
                        });
                        document.getElementById('calctot').classList.remove('animate__animated', "animate__fadeInRight");
                        document.getElementById('calctot').classList.add('animate__animated', "animate__fadeOutRight", "animate__delay-2s");
                        document.getElementById('calctot').addEventListener('animationend', () => {
                            document.getElementById('formcupo').submit();
                        });
                    }
                }
            };
            xhttp.open("GET", "consultarcupon.php?cupon=" + document.getElementById('cupons').value, true);
            xhttp.send();

        } else {
            document.getElementById('formcupo').classList.add('animate__animated', "animate__shakeX");
            document.getElementById('formcupo').addEventListener('animationend', () => {
                document.getElementById('formcupo').classList.remove('animate__animated', "animate__shakeX");
            });
        }
    }

    function NoTengoCupon() {
        document.getElementById('formcupo').classList.remove('animate__animated', "animate__fadeInLeft");
        document.getElementById('formcupo').classList.add('animate__animated', "animate__fadeOutLeft");
        document.getElementById('cupons').value = "";
        document.getElementById('formcupo').addEventListener('animationend', () => {
            document.getElementById('formcupo').submit();
        });
    }


    function EnviarPaypal() {
        location.href = 'https://www.paypal.com/signin';
    }

    function ActivarEstado(seleccion) {
        if (seleccion.value == "México") {
            document.getElementById('estado').disabled = false;
            document.getElementById('estcam').innerText = "Estado";
            document.getElementById('estado').innerHTML =
                '<option value="" selected>Estado... </option>' +
                '<option value="Aguascalientes">Aguascalientes</option>' +
                '<option value="Baja California">Baja California</option>' +
                '<option value="Baja California Sur">Baja California Sur</option>' +
                '<option value="Campeche">Campeche</option>' +
                '<option value="Coahuila">Coahuila</option>' +
                '<option value="Colima">Colima</option>' +
                '<option value="Ciudad de México">Ciudad de México</option>' +
                '<option value="Chiapas">Chiapas</option>' +
                '<option value="Chihuahua">Chihuahua</option>' +
                '<option value="Durango">Durango</option>' +
                '<option value="Guanajuato">Guanajuato</option>' +
                '<option value="Guerrero">Guerrero</option>' +
                '<option value="Hidalgo">Hidalgo</option>' +
                '<option value="Jalisco">Jalisco</option>' +
                '<option value="Estado de México">Estado de México</option>' +
                '<option value="Michoacán">Michoacán</option>' +
                '<option value="Morelos">Morelos</option>' +
                '<option value="Nayarit">Nayarit</option>' +
                '<option value="Nuevo León">Nuevo León</option>' +
                '<option value="Oaxaca">Oaxaca</option>' +
                '<option value="Puebla">Puebla</option>' +
                '<option value="Querétaro">Querétaro</option>' +
                '<option value="Quintana Roo">Quintana Roo</option>' +
                '<option value="San Luis Potosí">San Luis Potosí</option>' +
                '<option value="Sinaloa">Sinaloa</option>' +
                '<option value="Sonora">Sonora</option>' +
                '<option value="Tabasco">Tabasco</option>' +
                '<option value="Tamaulipas">Tamaulipas</option>' +
                '<option value="Tlaxcala">Tlaxcala</option>' +
                '<option value="Veracruz">Veracruz</option>' +
                '<option value="Yucatán">Yucatán</option>' +
                '<option value="Zacatecas">Zacatecas</option>';
        } else if (seleccion.value == "Estados Unidos") {
            document.getElementById('estado').disabled = false;
            document.getElementById('estcam').innerText = "Estado";
            document.getElementById('estado').innerHTML = '<option value="" selected>Estado... </option>' +
                '<option value="Alabama">Alabama</option>' +
                '<option value="Alaska">Alaska</option>' +
                '<option value="Arizona">Arizona</option>' +
                '<option value="Arkansas">Arkansas</option>' +
                '<option value="California">California</option>' +
                '<option value="Colorado">Colorado</option>' +
                '<option value="Connecticut">Connecticut</option>' +
                '<option value="Delaware">Delaware</option>' +
                '<option value="Florida">Florida</option>' +
                '<option value="Georgia">Georgia</option>' +
                '<option value="Hawaii">Hawaii</option>' +
                '<option value="Idaho">Idaho</option>' +
                '<option value="Illinois">Illinois</option>' +
                '<option value="Indiana">Indiana</option>' +
                '<option value="Iowa">Iowa</option>' +
                '<option value="Kansas">Kansas</option>' +
                '<option value="Kentucky">Kentucky</option>' +
                '<option value="Louisiana">Louisiana</option>' +
                '<option value="Maine">Maine</option>' +
                '<option value="Maryland">Maryland</option>' +
                '<option value="Massachusetts">Massachusetts</option>' +
                '<option value="Michigan">Michigan</option>' +
                '<option value="Minnesota">Minnesota</option>' +
                '<option value="Mississippi">Mississippi</option>' +
                '<option value="Missouri">Missouri</option>' +
                '<option value="Montana">Montana</option>' +
                '<option value="Nebraska">Nebraska</option>' +
                '<option value="Nevada">Nevada</option>' +
                '<option value="New Hampshire">New Hampshire</option>' +
                '<option value="New Jersey">New Jersey</option>' +
                '<option value="New Mexico">New Mexico</option>' +
                '<option value="New York">New York</option>' +
                '<option value="North Carolina">North Carolina</option>' +
                '<option value="North Dakota">North Dakota</option>' +
                '<option value="Ohio">Ohio</option>' +
                '<option value="Oklahoma">Oklahoma</option>' +
                '<option value="Oregon">Oregon</option>' +
                '<option value="Pennsylvania">Pennsylvania</option>' +
                '<option value="Rhode Island">Rhode Island</option>' +
                '<option value="South Carolina">South Carolina</option>' +
                '<option value="South Dakota">South Dakota</option>' +
                '<option value="Tennessee">Tennessee</option>' +
                '<option value="Texas">Texas</option>' +
                '<option value="Utah">Utah</option>' +
                '<option value="Vermont">Vermont</option>' +
                '<option value="Virginia">Virginia</option>' +
                '<option value="Washington">Washington</option>' +
                '<option value="West Virginia">West Virginia</option>' +
                '<option value="Wisconsin">Wisconsin</option>' +
                '<option value="Wyoming">Wyoming</option>';
        } else if (seleccion.value == "Canadá") {
            document.getElementById('estado').disabled = false;
            document.getElementById('estcam').innerText = "Territorio o provincia";
            document.getElementById('estado').innerHTML = '<option value="" selected>Estado... </option>' +
                '<option value="Alberta">Alberta</option>' +
                '<option value="British Columbia">British Columbia</option>' +
                '<option value="Manitoba">Manitoba</option>' +
                '<option value="New Brunswick">New Brunswick</option>' +
                '<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>' +
                '<option value="Northwest Territories">Northwest Territories</option>' +
                '<option value="Nova Scotia">Nova Scotia</option>' +
                '<option value="Nunavut">Nunavut</option>' +
                '<option value="Ontario">Ontario</option>' +
                '<option value="Prince Edward Island">Prince Edward Island</option>' +
                '<option value="Quebec">Quebec</option>' +
                '<option value="Saskatchewan">Saskatchewan</option>' +
                '<option value="Yukon">Yukon</option>';
        } else {
            <?php
            $impuestos = 0;
            ?>
            document.getElementById('estado').disabled = true;
            document.getElementById('estado').innerHTML = '<option value="" selected></option>';
        }
    }

    function CalcularImpuestos(selectedva) {
        document.getElementById('calcimp').classList.remove('animate__animated', "animate__fadeInRight");
        document.getElementById('calcimp').classList.add('animate__animated', "animate__fadeOutRight");
        document.getElementById('calcimp').addEventListener('animationend', () => {
            var xhr = new XMLHttpRequest();
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 0) {
                        document.getElementById('calcimp').innerHTML = "No aplica";
                    } else {
                        document.getElementById('calcimp').innerHTML = "$" + this.responseText;
                    }
                }
            };

            if (document.getElementById('pais').value == "México") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.16", true);
            } else if (selectedva.value == "Alberta" || selectedva.value == "Northwest Territories" || selectedva.value == "Nunavut" || selectedva.value == "Quebec" || selectedva.value == "Yukon" || selectedva.value == "Arizona" || selectedva.value == "Louisiana" || selectedva.value == "Maine" || selectedva.value == "Nebraska" || selectedva.value == "New Mexico" || selectedva.value == "North Dakota" || selectedva.value == "Ohio" || selectedva.value == "Virginia" || selectedva.value == "Wisconsin") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.05", true);
            } else if (selectedva.value == "Saskatchewan") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.11", true);
            } else if (selectedva.value == "British Columbia" || selectedva.value == "Manitoba") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.12", true);
            } else if (selectedva.value == "Ontario") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.13", true);
            } else if (selectedva.value == "New Brunswick" || selectedva.value == "Newfoundland" || selectedva.value == "Nova Scotia" || selectedva.value == "Prince Edward Island") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.15", true);
            } else if (selectedva.value == "Alaska" || selectedva.value == "Delaware" || selectedva.value == "Montana" || selectedva.value == "New Hampshire" || selectedva.value == "Oregon") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0", true);
            } else if (selectedva.value == "Florida" || selectedva.value == "Missouri") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.02", true);
            } else if (selectedva.value == "Alabama" || selectedva.value == "Georgia" || selectedva.value == "Hawaii" || selectedva.value == "Nevada" || selectedva.value == "New York" || selectedva.value == "North Carolina" || selectedva.value == "Oklahoma" || selectedva.value == "South Dakota" || selectedva.value == "Utah" || selectedva.value == "Wyoming") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.04", true);
            } else if (selectedva.value == "Arkansas" || selectedva.value == "California" || selectedva.value == "Connecticut" || selectedva.value == "Idaho" || selectedva.value == "Illinois" || selectedva.value == "Iowa" || selectedva.value == "Kansas" || selectedva.value == "Kentucky" || selectedva.value == "Maryland" || selectedva.value == "Massachusetts" || selectedva.value == "Michigan" || selectedva.value == "Minessota" || selectedva.value == "New Jersey" || selectedva.value == "Pennsylvania" || selectedva.value == "South Carolina" || selectedva.value == "Texas" || selectedva.value == "Vermont" || selectedva.value == "Washington" || selectedva.value == "West Virginia") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.06", true);
            } else if (selectedva.value == "Colorado" || selectedva.value == "Indiana" || selectedva.value == "Mississippi" || selectedva.value == "Rhode Island" || selectedva.value == "Tennessee") {
                xhttp.open("GET", "calcularimpuesto.php?valor=0.07", true);
            }
            xhttp.send();
            document.getElementById('calcimp').classList.remove('animate__animated', "animate__fadeOutRight");
            document.getElementById('calcimp').classList.add('animate__animated', "animate__fadeInRight");
        });

        var xhr = new XMLHttpRequest();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('calcenv').innerHTML = "$" + this.responseText;
            }
        };
        if (document.getElementById('pais').value == "México") {
            xhttp.open("GET", "calcularenvio.php?valor=0.18", true);
        }
        if (document.getElementById('pais').value == "Estados Unidos") {
            xhttp.open("GET", "calcularenvio.php?valor=0.35", true);
        }
        if (document.getElementById('pais').value == "Canadá") {
            xhttp.open("GET", "calcularenvio.php?valor=0.45", true);
        }
        xhttp.send();

        document.getElementById('calctot').classList.remove('animate__animated', "animate__fadeInRight");
        document.getElementById('calctot').classList.add('animate__animated', "animate__fadeOutRight", "animate__delay-2s");
        document.getElementById('calctot').addEventListener('animationend', () => {
            var xhr = new XMLHttpRequest();
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('calctot').innerHTML = "$" + this.responseText;
                }
            };
            xhttp.open("GET", "calculartotal.php", true);
            xhttp.send();

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "0") {
                        document.getElementById('calcenv').classList.add('animate__animated', "animate__rubberBand");
                        document.getElementById('calcenv').innerHTML = "<span style='color:#b8ffb8;'>¡Envío gratis!</span>";
                        document.getElementById('calcenv').addEventListener('animationend', () => {
                            document.getElementById('calcenv').classList.remove('animate__animated', "animate__rubberBand");
                        });
                    }
                }
            };
            xhr.open("GET", "enviogratis.php", true);
            xhr.send();

            document.getElementById('calctot').classList.remove('animate__animated', "animate__fadeOutRight", "animate__delay-2s");
            document.getElementById('calctot').classList.add('animate__animated', "animate__fadeInRight");
        });


    }

    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds) {
                break;
            }
        }
    }

    function InterludioOXXO() {
        document.getElementById('botoncup').hidden = true;
        document.getElementById('spinners').hidden = false;
        var primer = document.getElementById('primerpaso');
        var segundo = document.getElementById('segundopaso');
        var tercero = document.getElementById('tercerpaso');
        primer.hidden = false;
        primer.classList.add('animate__animated', "animate__fadeIn", "animate__delay-1s");
        primer.addEventListener('animationend', () => {
            primer.hidden = true;
            segundo.hidden = false;
            segundo.classList.add('animate__animated', "animate__fadeIn", "animate__delay-1s");
            segundo.addEventListener('animationend', () => {
                segundo.hidden = true;
                tercero.hidden = false;
                tercero.classList.add('animate__animated', "animate__fadeIn", "animate__delay-1s");
                tercero.addEventListener('animationend', () => {
                    document.getElementById('formuoxxo').submit();
                });
            });
        });
    }
</script>

<!DOCTYPE html>
<html lang="es_mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanical Garden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/realizarcompra.css">
    <script src="https://kit.fontawesome.com/1d83af7d53.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f097015f8a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" type="image/x-icon" href="img/logoWF.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="grideo">
        <header class="header animate__animated animate__fadeInDown">
            <div style="display:flex;justify-content:center;">
                <img src="img/logo.png" width="90" height="90" class="d-inline-block align-top" alt="Logo de BotanicalG">
            </div>
        </header>
        <section class="contenido">
            <div class="formulario">
                <?php
                if (!isset($_POST["metodo"])) {
                ?>
                    <form id="añadir" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="animate__animated animate__fadeInLeft" autocomplete="off">
                        <legend>Dirección de envío</legend>
                        <table style="width:100%;">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="pais">Pais (<span style="color:red;">*</span>)</label>
                                        <select class="form-control" id="pais" onchange="ActivarEstado(this);" name="pais" required>
                                            <option value="" selected>Pais...</option>
                                            <option value="México">México</option>
                                            <option value="Estados Unidos">Estados Unidos</option>
                                            <option value="Canadá">Canadá</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="cop">Código postal (<span style="color:red;">*</span>)</label>
                                        <input type="number" class="form-control" id="cop" name="cop" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="estado" id="estcam">Estado (<span style="color:red;">*</span>)</label>
                                        <select class="form-control" id="estado" onchange="CalcularImpuestos(this);" name="estado" disabled required></select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="ciud">Ciudad/Municipio (<span style="color:red;">*</span>)</label>
                                        <input type="text" class="form-control" id="ciud" name="ciud" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="numext">Numero exterior</label>
                                        <input type="number" class="form-control" id="numext" name="numext" placeholder="S/N">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="numint">Numero interior (opcional)</label>
                                        <input type="number" class="form-control" id="numint" name="numint">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-group">
                                        <label for="dir">Dirección (Incluya detalles) (<span style="color:red;">*</span>)</label>
                                        <textarea class="form-control" id="dir" rows="3" name="direccion" required></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>¿Es tu trabajo o casa?</p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                        <label class="form-check-label" for="exampleRadios1" style="font-size: 18px;">
                                            <i class="fa-solid fa-briefcase"></i> Trabajo
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>
                                        <label class="form-check-label" for="exampleRadios2" style="font-size: 18px;">
                                            <i class="fa-solid fa-house"></i> Casa
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="NumCon">Numero de contacto (<span style="color:red;">*</span>)</label>
                                        <input type="number" class="form-control" name="numcont" id="NumCon" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:right;">
                                    <input type="text" name="metodo" value="cupon" hidden>
                                    <input type="button" class="btn btn-primary" onclick="AdiosFormulario1();" value="Siguiente">
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php
                } else if ($_POST["metodo"] == "pago") {
                ?>
                    <h3>Añadir metodo de pago</h3>
                    <div class="accordion animate__animated animate__fadeInLeft" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration:none;">
                                        <img src="img/iconovisa.png" alt="Visa/Mastercard" height="30px" width="auto">
                                        Visa/Mastercard
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="pago" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <legend>Datos de tarjeta de credito</legend>
                                        <table style="width:100%;">
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="nomtit">Nombre del titular (<span style="color:red;">*</span>)</label>
                                                        <input type="text" class="form-control" id="nomtit" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="numtar">Numero de tarjeta (<span style="color:red;">*</span>)</label>
                                                        <input type="text" class="form-control" id="numtar" size="16" name="numeroTarjeta" required>
                                                        <?php $_SESSION["metodoPago"] = 'Visa/Mastercard'; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="mesexp">Mes de expiración (<span style="color:red;">*</span>)</label>
                                                        <input type="number" class="form-control" id="mesexp" min="1" max="12" placeholder="MM" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="anoexp">Año de expiración (<span style="color:red;">*</span>)</label>
                                                        <input type="number" class="form-control" id="anoexp" min="23" max="50" placeholder="YY" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="cvv">CVV de tres digitos (<span style="color:red;">*</span>)</label>
                                                        <input type="number" class="form-control" id="cvv" max="999" size="3" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="dirfar">Dirección de facturación (<span style="color:red;">*</span>)</label>
                                                        <textarea class="form-control" id="dirfar" rows="3" required></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="text" name="metodo" value="desglose" hidden>
                                                    <div style="display:flex;justify-content:right;"><input type="submit" class="btn btn-primary" value="Siguiente"></input></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="text-decoration:none;">
                                        <img src="img/iconoamerican.png" alt="Visa/Mastercard" height="30px" width="auto">
                                        American Express
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form id="añadir" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <legend>Datos de tarjeta de credito</legend>
                                        <table style="width:100%;">
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="nomtit">Nombre del titular (<span style="color:red;">*</span>)</label>
                                                        <input type="text" class="form-control" id="nomtit" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="numtar">Numero de tarjeta (<span style="color:red;">*</span>)</label>
                                                        <input type="text" class="form-control" id="numtar" size="16" name="numeroTarjeta" required>
                                                        <?php $_SESSION["metodoPago"] = 'American Express'; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="mesexp">Mes de expiración (<span style="color:red;">*</span>)</label>
                                                        <input type="number" class="form-control" id="mesexp" min="1" max="12" placeholder="MM" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="anoexp">Año de expiración (<span style="color:red;">*</span>)</label>
                                                        <input type="number" class="form-control" id="anoexp" min="23" max="50" placeholder="YY" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="cvv">CVV de cuatro digitos (<span style="color:red;">*</span>)</label>
                                                        <input type="number" class="form-control" id="cvv" max="9999" size="4" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="dirfar">Dirección de facturación (<span style="color:red;">*</span>)</label>
                                                        <textarea class="form-control" id="dirfar" rows="3" required></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="text" name="metodo" value="desglose" hidden>
                                                    <div style="display:flex;justify-content:right;"><input type="submit" class="btn btn-primary" value="Siguiente"></input></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="text-decoration:none;">
                                        <img src="img/iconooxxo.png" alt="Visa/Mastercard" height="30px" width="auto"> OXXO
                                        (Solo en territorio mexicano)
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <h3 style="text-align:center;">Codigo de barras</h3>
                                    <?php
                                    $diez = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10);
                                    $siete = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 7);
                                    $stringcompleto = "OX-" . $diez . "-" . $siete;
                                    ?>
                                    <div id="codigobar" style="display:flex;justify-content:center;"><img src="plugins/barcode.php?text=<?php echo $stringcompleto; ?>&size=30&codetype=Code128&print=true" />
                                    </div>
                                    <p style="text-align:center;">Presenta el codigo de barras en tu sucursal de OXXO mas
                                        cercana<br>Paga desde ahi tu compra.</p>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="formuoxxo">
                                        <div style="display:flex;justify-content:right;">
                                            <div style="justify-self:left;">
                                                <p id="primerpaso" hidden>Esperando pago...</p>
                                                <p id="segundopaso" hidden>Procesando...</p>
                                                <p id="tercerpaso" hidden><i class="fa-solid fa-circle-check fa-lg" style="color: #258113;"></i></p>
                                            </div>
                                            <input type="text" name="metodo" value="desglose" hidden>
                                            <?php $_SESSION["metodoPago"] = 'Oxxo'; ?>
                                            <input type="button" class="btn btn-primary" value="Siguiente" onclick="InterludioOXXO();" id="botoncup"></input>
                                            <div class="spinner-border text-success" role="status" id="spinners" style="text-align:center;border-color: brown; border-top:transparent;" hidden>
                                                <span><i class="fa-solid fa-seedling fa-rotate-180" style="color: #24a800;"></i></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="text-decoration:none;">
                                        <img src="img/iconopaypal.png" alt="Visa/Mastercard" height="30px" width="auto">
                                        eWallet
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <h3>Añadir una cuenta de paypal</h3>
                                    <div style="display:flex;justify-content:center;"><img src="img/iconopaypal.png" alt="Logo de Paypal" height="200px"></div>
                                    <p style="text-align:center;">El siguiente paso te redireccionará a la página oficial
                                        <br> de PayPal para que completes el proceso de inicio de sesión <br>
                                    </p>
                                    <div style="display:flex;justify-content:right;"><button class="btn btn-primary" onclick="EnviarPaypal();">Siguiente</button></div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>
                <?php
                } else if ($_POST["metodo"] == "cupon") {
                    if (empty($_POST["numext"])) {
                        $numext = "NumExt: S/N";
                    } else {
                        $numext = "NumExt: #" . $_POST["numext"];
                    }
                    if (empty($_POST["numint"])) {
                        $numint = "";
                    } else {
                        $numint = "NumInt: #" . $_POST["numint"];
                    }
                    $_SESSION["direccionEnvio"] = $_POST["direccion"] . " " . $numext . " " . $numint . " " . $_POST["cop"] . " - " . $_POST["ciud"] . ", " . $_POST["estado"] . ", " . $_POST["pais"] . " " . " Número de contacto: " . $_POST["numcont"];
                ?>
                    <form id="formcupo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="animate__animated animate__fadeInLeft">
                        <table style="width:100%;">
                            <tr>
                                <td colspan="2" style="text-align:center;font-size:30px;">
                                    ¿Posees un cupón de compra? <br> ¡Es hora de utilizarlo!
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;font-size:125px;">
                                    <i class="fa-solid fa-ticket" style="color: #25511f;"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="cupons">Ingresar cupón:</label>
                                        <input type="text" class="form-control" id="cupons" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="display:flex;justify-content:space-between;width:100%;">
                                    <input type="text" name="metodo" value="pago" hidden>
                                    <input type="button" class="btn btn-secondary" onclick="NoTengoCupon();" value="No, gracias">
                                    <input type="button" class="btn btn-primary" onclick="AdiosFormularioCupon();" value="Siguiente">
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php
                } else if ($_POST["metodo"] == "desglose") {
                    if (isset($_POST['numeroTarjeta']))
                        $_SESSION['numeroTarjeta'] = $_POST['numeroTarjeta'];

                    $carritoNuevo = array();

                    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                        if (isset($carritoNuevo[$_SESSION['carrito'][$i]])) {
                            $carritoNuevo[$_SESSION['carrito'][$i]] = $carritoNuevo[$_SESSION['carrito'][$i]] + 1;
                        } else {
                            $carritoNuevo[$_SESSION['carrito'][$i]] = 1;
                        }
                    }
                    //print_r($carritoNuevo);

                    $sql = "SELECT * FROM productos";
                    $resultado = $conn->query($sql);
                ?>

                    <div class="modal fade" id="modal1" role="dialog" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">


                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Productos a Pagar</h5>
                                </div>

                                <div class="modal-body">
                                    <form action="nota.php" method="post">
                                        <?php
                                        $totalPagar = 0;
                                        while ($fila = $resultado->fetch_assoc()) {
                                            foreach ($carritoNuevo as $idProducto => $numeroProductos) {
                                                if ($idProducto == $fila["ID"]) {
                                                    echo '<div class="form-group">';
                                                    echo '<label for="nombre">Producto: ' . $fila["Nombre"] . '</label>';
                                                    echo "<br>";
                                                    echo '<img src="img/productos/' . $fila["imagen"] . '" alt="' . $fila["Nombre"] . '" width="150" height="150">';
                                                    echo '<input type="text" class="form-control" id="nombre" aria-describedby="nombre"
                                                                    value="Número de Productos: ' . $numeroProductos . '" disabled>';
                                                    echo '<input type="text" class="form-control" id="nombre" aria-describedby="nombre"
                                                                    value="Precio: $' . $numeroProductos * $fila["PrecioN"] . '" disabled>';
                                                    echo '</div>';
                                                    $totalPagar = $totalPagar + ($numeroProductos * $fila["PrecioN"]);

                                                    echo '<input type="hidden" name="vector[' . $idProducto . ']" value="' . $numeroProductos . '">';
                                                }
                                            }
                                        }
                                        ?>

                                        <div class="form-group">
                                            <label for="tel">Número Total de Productos</label>
                                            <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo count($_SESSION['carrito']); ?>" disabled>
                                            <input type="hidden" name="totalProductos" value="<?php echo count($_SESSION['carrito']); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="tel">Subtotal: </label>
                                            <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo "$".$_SESSION['totalcar']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="tel">Cobro por envío: </label>
                                            <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php if($_SESSION["envio"] == 0){echo "¡Envío gratis!";}else{echo "$".$_SESSION['totalcar'];} ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="tel">Impuestos: </label>
                                            <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo "$".$_SESSION['impuesto']; ?>" disabled>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="tel">Total a pagar: </label>
                                            <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo "$".$_SESSION['total']; ?>" disabled>
                                        </div>

                                        <?php
                                        if ($_SESSION["metodoPago"] == 'Visa/Mastercard') {
                                        ?>
                                            <div class="form-group">
                                                <label for="tel">Método de Pago: Visa/Mastercard</label>
                                                <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo "Número de Tarjeta: " . $_SESSION['numeroTarjeta']; ?>" disabled>
                                            </div>
                                        <?php
                                        } else if ($_SESSION["metodoPago"] == 'American Express') {
                                        ?>
                                            <div class="form-group">
                                                <label for="tel">Método de Pago: American Express</label>
                                                <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo "Número de Tarjeta: " . $_SESSION['numeroTarjeta']; ?>" disabled>
                                            </div>
                                        <?php
                                        } else if ($_SESSION["metodoPago"] == 'Oxxo') {
                                        ?>
                                            <div class="form-group">
                                                <label for="tel">Método de Pago:</label>
                                                <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo "OXXO"; ?>" disabled>
                                            </div>
                                        <?php
                                        } else if ($_SESSION["metodoPago"] == 'PayPal') {
                                        ?>
                                            <div class="form-group">
                                                <label for="tel">Método de Pago:</label>
                                                <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo "PayPal"; ?>" disabled>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <div class="form-group">
                                            <label for="tel">Dirección de envio: </label>
                                            <input type="text" class="form-control" id="tel" aria-describedby="tel" value="<?php echo $_SESSION['direccionEnvio']; ?>" disabled>
                                        </div>


                                        <input type="submit" class="btn btn-secondary" name="submit" value="Confirmar Compra">
                                    </form>
                                </div>

                                <div class="modal-footer">

                                </div>


                            </div>
                        </div>
                    </div>

                    <script>
                        abrirModal();
                    </script>

                <?php
                }
                ?>
            </div>

        </section>
        <section class="sidebar">
            <div class="producto animate__animated animate__fadeInRight">
                <div class="minidesglose">
                    <?php

                    $sql = "SELECT * FROM productos WHERE id = " . $_SESSION['carrito'][0];
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $producto = $result->fetch_assoc();
                    ?>
                        <img class="animate__animated animate__zoomIn" src="img/productos/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>" height="100px" style="border-radius:100%;">
                        <div class="badge badge-pill badge-success numerito animate__animated animate__zoomIn">Productos:
                            <?php echo $_SESSION["totalcant"]; ?>
                        </div>

                        <table style="width:60%; align-self:center;">
                            <tr>
                                <th style="color:white;">
                                    Subtotal:
                                </th>
                                <td style="color:white;">
                                    <?php echo "$" . number_format($_SESSION["totalcar"], 2); ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="color:white;">
                                    Impuestos:
                                </th>
                                <td style="color:white;" id="calcimp">
                                    <?php if (!isset($_SESSION["impuesto"])) {
                                        echo "$-.--";
                                    } else {
                                        echo "$" . $_SESSION["impuesto"];
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="color:white;">
                                    Envio:
                                </th>
                                <td style="color:white;" id="calcenv">
                                    <?php if (!isset($_SESSION["envio"])) {
                                        echo "$-.--";
                                    } else {
                                        if ($_SESSION["envio"] == 0) {
                                            echo "<span style='color:#b8ffb8;'>¡Envio gratis!</span>";
                                        } else {
                                            echo "$" . $_SESSION["envio"];
                                        }
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="color:white;">
                                    Cupón:
                                </th>
                                <td style="color:white;" id="calccup">
                                    <?php if (!isset($_SESSION["cupon"])) {
                                        echo "No aplica";
                                    } else {
                                        echo $_SESSION["cupon"] . '%';
                                    } ?>
                                </td>
                            </tr>
                            <tr style="border-top:2px solid white;">
                                <th style="color:#b8ffb8;">
                                    Total:
                                </th>
                                <td style="color:#b8ffb8;" id="calctot">
                                    <?php if (!isset($_SESSION["total"])) {
                                        echo "Calculo";
                                    } else {
                                        echo '$' . $_SESSION["total"];
                                    } ?>
                                </td>
                            </tr>
                        </table>

                    <?php
                    }

                    ?>
                </div>

            </div>
        </section>
        <footer class="footer">
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
                        <p class="navbar-item my-2 my-lg-0 text-white">Al utilizar nuestro sitio indicas que aceptas
                            nuestro <a class="text-white-50" href="#">aviso de privacidad</a></p>
                    </nav>
                </div>
                <br>
            </div>
        </footer>
    </div>


</body>

</html>
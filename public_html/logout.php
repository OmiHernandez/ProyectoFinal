<?php
session_start();

$_SESSION["nombre"]="";
$_SESSION["impuesto"] = null;
$_SESSION["envio"] = null;
$_SESSION["cupon"] = null;
$_SESSION["total"] = null;
$_SESSION["metodoPago"] = null;
$_SESSION["direccionEnvio"] = null;
$_SESSION["numeroTarjeta"] = null;
session_destroy();

header("Location: index.php");
?>
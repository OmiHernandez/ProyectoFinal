<?php
session_start();
$_SESSION["impuesto"] = 0;
$impuestoap = $_GET["valor"];
$_SESSION["impuesto"] = $_SESSION["totalcar"] * $impuestoap;
echo $_SESSION["impuesto"];
?>
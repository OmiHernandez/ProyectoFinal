<?php
session_start();
$_SESSION["envio"] = 0;
$envio = $_GET["valor"];
$_SESSION["envio"] = $_SESSION["totalcar"] * $envio;
echo $_SESSION["envio"];
?>
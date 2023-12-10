<?php
session_start();
$_SESSION["total"] = $_SESSION["totalcar"] + $_SESSION["impuesto"] + $_SESSION["envio"];
if($_SESSION["total"]>700){
    $_SESSION["total"] = $_SESSION["total"]-$_SESSION["envio"];
    $_SESSION["envio"] = "0";
} 
echo $_SESSION["total"];
?>
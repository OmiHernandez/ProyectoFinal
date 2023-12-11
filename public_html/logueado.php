<?php
session_start();
if(isset($_GET['logueado'])) {
    if(isset($_SESSION['nombre'])) {
        // echo $_SESSION['nombre'];
        $logueado=0;
    } else {
        $logueado=1;
    } 
    echo $logueado;
    exit(); 
}
?>
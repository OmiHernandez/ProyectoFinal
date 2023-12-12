<?php
session_start();
if($_SESSION["envio"] == "0"){
    echo "0";
    exit();
}else{
    echo "No jale?";
    exit();
}
?>
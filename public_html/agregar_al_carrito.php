<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["producto_id"])) {
    // Obtener el ID del producto desde la solicitud POST
    $producto_id = $_POST["producto_id"];

    // Agregar el ID del producto a la sesión del carrito
    $_SESSION['carrito'][] = $producto_id;

    $cantidadEnCarrito = count($_SESSION['carrito']);

    // Responder con la cantidad actual en el carrito
    echo $cantidadEnCarrito;
} else {
    // Responder con un error si la solicitud no es válida
    echo "Solicitud no válida";
}
?>

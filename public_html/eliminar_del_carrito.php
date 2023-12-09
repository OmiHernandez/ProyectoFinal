<?php
session_start();

// Verificar si el ID del producto se proporciona en la solicitud
if (isset($_GET['eliminar_todo']) && $_GET['eliminar_todo'] == 1) {
    // Limpiar todos los productos del carrito
    $_SESSION['carrito'] = [];
    // Devolver una respuesta JSON de éxito
    echo json_encode(['success' => true]);
    exit;
}

// Verificar si el ID del producto se proporciona en la solicitud
if (isset($_GET['producto_id'])) {
    $productoId = $_GET['producto_id'];

    // Verificar si el producto está en el carrito
    if (in_array($productoId, $_SESSION['carrito'])) {
        // Eliminar todas las ocurrencias del producto en el carrito
        $_SESSION['carrito'] = array_diff($_SESSION['carrito'], [$productoId]);

        // Devolver una respuesta JSON de éxito
        echo json_encode(['success' => true]);
        exit;
    }
}

// Devolver una respuesta JSON de error si algo falla
echo json_encode(['success' => false]);

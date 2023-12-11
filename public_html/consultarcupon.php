<?php
session_start();
$servername = "localhost:3029";
$username = "root";
$password = "";
$dbname = "botanical";
$cupon = $_GET["cupon"];
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$sql = "SELECT * FROM cupones WHERE Codigo='" . $cupon . "';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $filacup = $result->fetch_assoc();
    $id = $filacup["ID"];
    $descuentos = $filacup["Descuento"];
    $metodo = $filacup["Metodo"];
} else {
    echo "no encontrado";
    exit();
}

if ($metodo == 0) {

    $sql = "SELECT * FROM cuenta WHERE Usuario='" . $_SESSION['nombre'] . "';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        $sql = "SELECT * FROM usado WHERE IDCliente=" . $producto['ID'] . " AND IDCupon=" . $id . ";";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "usado";
            exit();
        } else {
            $_SESSION["cupon"] = $descuentos;
            $desc = $_SESSION["cupon"] >= 10 ? "0." . $_SESSION["cupon"] : "0.0" . $_SESSION["cupon"];
            $sql = "INSERT INTO usado VALUES(" . $producto['ID'] . ", " . $id . ");";
            $result = $conn->query($sql);
            $_SESSION["total"] = $_SESSION["total"] - ($_SESSION["total"] * $desc);
            $auxtot = $_SESSION["total"];
            $_SESSION["total"] = 0;
            $_SESSION["total"] = $auxtot;
            echo $_SESSION["cupon"];
            exit();
        }
    }
}

if ($metodo == 1) {
    $sql = "SELECT * FROM cuenta WHERE Usuario='" . $_SESSION['nombre'] . "';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        $id_usuario = $producto["ID"];
        $sql = "SELECT * FROM usado WHERE IDCliente=" . $id_usuario . " AND IDCupon=" . $id . ";";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "usado";
            exit();
        } else {
            $_SESSION["cupon"] = $descuentos;
            $subtotal = 0;
            $cantidadtotal = 0;
            $ocurrencias = array_count_values($_SESSION['carrito']);
            foreach ($ocurrencias as $producto_id => $cantidadEnCarrito) {
                $sql = "SELECT * FROM productos WHERE ID = $producto_id AND Categoria='Sombra';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $producto = $result->fetch_assoc();
                    $subtotal = $cantidadEnCarrito * ($producto['PrecioN'] == 0 ? $producto['Precio'] : $producto['PrecioN']);
                    $cantidadtotal += $cantidadEnCarrito;
                }
            }
            $desc = $_SESSION["cupon"] >= 10 ? "0." . $_SESSION["cupon"] : "0.0" . $_SESSION["cupon"];
            $sql = "INSERT INTO usado VALUES(" . $id_usuario . ", " . $id . ");";
            $result = $conn->query($sql);
            $preciocondescuento = $subtotal * $desc;
            $_SESSION["total"] = $_SESSION["total"] - $preciocondescuento;
            $auxtot = $_SESSION["total"];
            $_SESSION["total"] = 0;
            $_SESSION["total"] = $auxtot;
            echo $_SESSION["cupon"];
            exit();
        }
    }
}

if ($metodo == 2) {
    $sql = "SELECT * FROM cuenta WHERE Usuario='" . $_SESSION['nombre'] . "';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        $id_usuario = $producto["ID"];
        $sql = "SELECT * FROM usado WHERE IDCliente=" . $id_usuario . " AND IDCupon=" . $id . ";";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "usado";
            exit();
        } else {
            $_SESSION["cupon"] = $descuentos;
            $subtotal = 0;
            $cantidadtotal = 0;
            $ocurrencias = array_count_values($_SESSION['carrito']);
            foreach ($ocurrencias as $producto_id => $cantidadEnCarrito) {
                $sql = "SELECT * FROM productos WHERE ID = $producto_id AND Categoria='Sol';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $producto = $result->fetch_assoc();
                    $subtotal = $cantidadEnCarrito * ($producto['PrecioN'] == 0 ? $producto['Precio'] : $producto['PrecioN']);
                    $cantidadtotal += $cantidadEnCarrito;
                }
            }
            $desc = $_SESSION["cupon"] >= 10 ? "0." . $_SESSION["cupon"] : "0.0" . $_SESSION["cupon"];
            $sql = "INSERT INTO usado VALUES(" . $id_usuario . ", " . $id . ");";
            $result = $conn->query($sql);
            $preciocondescuento = $subtotal * $desc;
            $_SESSION["total"] = $_SESSION["total"] - $preciocondescuento;
            $auxtot = $_SESSION["total"];
            $_SESSION["total"] = 0;
            $_SESSION["total"] = $auxtot;
            echo $_SESSION["cupon"];
            exit();
        }
    }
}

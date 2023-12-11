<?php
    session_start();
    $usuario = $_SESSION['nombre'];

    if(!isset($_SESSION['carrito'])){
        header("Location: index.php");
    }

    if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $servidor='localhost:33063';
        $cuenta = 'root';
        $password = '';
        $bd = 'botanical';
        $conexion = new mysqli($servidor, $cuenta, $password, $bd);

        $sql = "SELECT ID FROM cuenta WHERE usuario='$usuario'";
        $resultado = $conexion->query($sql);

        $_SESSION['usuarioID'] = 0;
        if ($resultado->num_rows) {
            while ($fila = $resultado->fetch_assoc()) {
                $_SESSION['usuarioID'] = $fila["ID"];
            }
        }

        $sql = "SELECT * FROM productos";
        $resultado = $conexion->query($sql);
        
        //Disminuir las existencias
        $_SESSION['carritoReacomodado'] = $_POST['vector'];
        $sqlVector = array();
        $longitudVector = 0;
        if ($resultado->num_rows) {
            while ($fila = $resultado->fetch_assoc()) {
                foreach ($_SESSION['carritoReacomodado'] as $idProducto => $numeroProductos) {
                    if($idProducto == $fila["ID"]){
                        $sqlVector[$longitudVector] = "UPDATE productos SET cantidad=".$fila["Cantidad"]-$numeroProductos." WHERE ID=".$idProducto.";";
                        $longitudVector++;
                    }
                }
            } 
        }
        for($i=0; $i<$longitudVector; $i++){
            $resultado = $conexion->query($sqlVector[$i]); 
        }

        //Agregar Carrito a Ventas
        for($i=0; $i<count($_SESSION['carrito']); $i++){
            $sql = "INSERT INTO ventas VALUES ($usuarioID,".$_SESSION['carrito'][$i].")";
            $resultado = $conexion->query($sql);
        }

        //Limpiar Carrito
        $_SESSION['carrito'] = null;
        unset($_SESSION["carrito"]);
        
        //Datos Requeridos para Hacer la Nota de Compra
        print_r($_SESSION['carritoReacomodado']);
        echo "<br>Subtotal: ".$_SESSION["totalcar"];
        echo "<br>Cobro por envío: ".$_SESSION["envio"];
        echo "<br>Impuesto: ".$_SESSION["impuesto"];
        echo "<br>Total: ".$_SESSION["total"];
        echo "<br>Método de Pago: ".$_SESSION["metodoPago"];
        echo "<br>Dirección de Envío: ".$_SESSION["direccionEnvio"];
        echo "<br>Tarjeta: ".$_SESSION["numeroTarjeta"];
        echo "<br>ID del Usuario: ".$_SESSION['usuarioID'];
    }
?>
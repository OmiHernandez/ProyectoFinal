<?php
    session_start();
    $usuario = $_SESSION['nombre'];

    if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $servidor='localhost:33063';
        $cuenta = 'root';
        $password = '';
        $bd = 'botanical';
        $conexion = new mysqli($servidor, $cuenta, $password, $bd);

        $usuarioID = 0;
        $sql = "SELECT ID FROM cuenta WHERE usuario='$usuario'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows) {
            while ($fila = $resultado->fetch_assoc()) {
                $usuarioID = $fila["ID"];
            }
        }

        $sql = "SELECT * FROM productos";
        $resultado = $conexion->query($sql);
        
        //Disminuir las existencias
        $sqlVector = array();
        $longitudVector = 0;
        if ($resultado->num_rows) {
            while ($fila = $resultado->fetch_assoc()) {
                foreach ($vector as $idProducto => $numeroProductos) {
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



        //Limpiar Carrito (El vector)

        
        //Datos Requeridos para Hacer la Nota de Compra
        print_r($_POST['vector']);
        echo "<br>Subtotal: ".$_SESSION["totalcar"];
        echo "<br>Cobro por envío: ".$_SESSION["envio"];
        echo "<br>Impuesto: ".$_SESSION["impuesto"];
        echo "<br>Total: ".$_SESSION["total"];
        echo "<br>Método de Pago: ".$_SESSION["metodoPago"];
        echo "<br>Dirección de Envío: ".$_SESSION["direccionEnvio"];
        echo "<br>Tarjeta: ".$_SESSION["numeroTarjeta"];
    }
?>
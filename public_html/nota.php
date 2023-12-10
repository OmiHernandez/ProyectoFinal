<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vector = $_POST['vector'];
        $totalProductos = $_POST['totalProductos'];
        $totalPagar = $_POST['totalPagar'];
        $tarjeta = $_POST['tarjeta'];
        $usuarioID = $_POST['usuarioID'];
    }

    if(isset($_POST["submit"])) {
        $servidor='localhost:33063';
        $cuenta = 'root';
        $password = '';
        $bd = 'botanical';
        $conexion = new mysqli($servidor, $cuenta, $password, $bd);

        $sql = "SELECT * FROM productos";
        $sqlVector = array();
        $resultado = $conexion->query($sql);
        //Disminuir las existencias
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


        //Eliminar el carrito de compras del usuario
        $sql = "DELETE FROM ventas WHERE IDCliente=$usuarioID";
        $resultado = $conexion->query($sql);


        //Hacer la Nota de Compra
        print_r($vector);
        echo "Total productos: $totalProductos <br>";
        echo "Total pagar: $totalPagar <br>";
        echo "TARJETA: $tarjeta <br>";
        echo "Usuario ID: $usuarioID <br>";
        

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <?php
    session_start();
    //$usuario = $_SESSION["usuario"]; 
    $usuario = "Gus";
    //$tarjeta = $_SESSION["tarjeta"]; 
    $tarjeta = "1234-5678-9012-3456";

    $servidor='localhost:33063';
    $cuenta = 'root';
    $password = '';
    $bd = 'botanical';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);

    $sql = "SELECT ID FROM cuenta WHERE usuario='$usuario'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows) {
        while ($fila = $resultado->fetch_assoc()) {
            $usuarioID = $fila["ID"];
        }
    }

    //Número de Productos Totales
    $sql = "SELECT COUNT(IDproducto) AS total FROM ventas GROUP BY IDcliente";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows) {
        while ($fila = $resultado->fetch_assoc()) {
            $totalProductos = $fila["total"];
        }
    }

    $sql = "SELECT IDproducto FROM ventas WHERE IDcliente='$usuarioID'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows) {
        $vector = array();
        while ($fila = $resultado->fetch_assoc()) {
            if(isset($vector[$fila["IDproducto"]])){
                $vector[$fila["IDproducto"]] = $vector[$fila["IDproducto"]] + 1;
            }
            else {
                $vector[$fila["IDproducto"]] = 1;
            }
        }
    }
    print_r($vector);

    $sql = "SELECT * FROM productos";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows) {
    ?>

    <!-- Button trigger modal -->
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#desgloseModal">
            Continuar con la compra
        </button>
    </div>

    <form action="nota.php" method="post">
        <div class="modal fade" id="desgloseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Productos a Pagar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <?php
                            $totalPagar = 0;
                            while ($fila = $resultado->fetch_assoc()) {
                                foreach ($vector as $idProducto => $numeroProductos) {
                                    if($idProducto == $fila["ID"]){
                                        echo '<div class="form-group">';
                                            echo '<label for="nombre">Nombre: '.$fila["Nombre"].'</label>';
                                            echo "<br>";
                                            echo '<img src="img/productos/'.$fila["imagen"].'" alt="'.$fila["Nombre"].'" width="150" height="150">';
                                            echo '<input type="text" class="form-control" id="nombre" aria-describedby="nombre"
                                                    value="Número de Productos: '.$numeroProductos.'" disabled>';
                                            echo '<input type="text" class="form-control" id="nombre" aria-describedby="nombre"
                                                    value="Precio: $'.$numeroProductos*$fila["PrecioN"].'" disabled>';
                                        echo '</div>';
                                        $totalPagar = $totalPagar + ($numeroProductos*$fila["PrecioN"]);

                                        echo '<input type="hidden" name="vector['.$idProducto.']" value="'.$numeroProductos.'">';
                                    }
                                }
                            }
                        ?>
                        
                        <div class="form-group">
                            <label for="tel">Número Total de Productos</label>
                            <input type="text" class="form-control" id="tel" aria-describedby="tel"
                                    value="<?php echo $totalProductos; ?>" disabled>
                            <input type="hidden" name="totalProductos" value="<?php echo $totalProductos; ?>">
                        </div>

                        <div class="form-group">
                            <label for="tel">Total a Pagar</label>
                            <input type="text" class="form-control" id="tel" aria-describedby="tel"
                                    value="<?php echo "$".$totalPagar; ?>" disabled>
                            <input type="hidden" name="totalPagar" value="<?php echo $totalPagar; ?>">
                        </div>

                        <div class="form-group">
                            <label for="tel">Tarjeta a Cobrar</label>
                            <input type="text" class="form-control" id="tel" aria-describedby="tel"
                                    value="<?php echo $tarjeta; ?>" disabled>
                            <input type="hidden" name="tarjeta" value="<?php echo $tarjeta; ?>">
                        </div>
                    </div>

                    <input type="hidden" name="usuarioID" value="<?php echo $usuarioID; ?>">
                    <input type="hidden" name="bandera" value="true">

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-secondary" name="submit" value="Confirmar Compra" >
                    </div>

                </div>
            </div>
        </div>
    </form>

    <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
            integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
            crossorigin="anonymous"> </script>
</body>
</html>
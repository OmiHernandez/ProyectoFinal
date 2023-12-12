<?php
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='botanical';

    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    $sql = 'select * from productos WHERE Categoria = ?';
    $resultado = $conexion -> query($sql);
    $stmt->bind_param("s", $_GET['q']);


    $numPro = 0;
?>

                    <script> var array=[];</script>
                    <?php
                        while( $fila = $resultado ->  fetch_assoc()){
                            $imagen = $fila['imagen'];
                            $nombre = $fila['Nombre'];
                            $id = $fila['ID'];
                            $descrip = $fila['Descripcion'];
                            $catego = $fila['Categoria'];
                            $precio = $fila['Precio'];
                            $precioN =$fila['PrecioN'];
                            $desc = $fila['Descuento'];
                            $cantidad = $fila['Cantidad'];


                            $agotado=false;
                            if($cantidad==0) {
                                $agotado=true;
                            }
                    ?>
                    <script>
                        array.push("<?php echo $nombre ?>");
                    </script>
                    
                    <div class="product"><!-- col-md-3 col-sm-6  -->
                        <div class="separacion2"></div>
                        <?php 
                            if($desc!=0) {
                                echo '<div class="descuent">'.$desc.'%</div>';
                            }
                        ?>
                        <div class="efecto">
                            <a href="#" class="">
                                <img class="img-fluid image" width="240" height="240" src="img/<?php echo $imagen ?>">
                            </a>
                            <div class="overlay">
                                <div class="textDesc">
                                    <?php echo "<span>ID: $id </span><br><br>$descrip"; ?>
                                </div>
                            </div>
                        </div>
                        <h5 class="titulo"><?php echo $nombre ?></h5>
                        <p class="cate"><?php echo "- $catego -"; ?></p>
                        <h4 class="precio">
                            <?php
                                if($desc!=0) {
                                     echo "<p>$".$precio."</p>";
                                     echo "$".$precioN; 
                                } else {
                                     echo "<br>$".$precioN.""; 
                                }
                            ?>
                        </h4>
                        <br>
                        <p class="cantidad"><?php echo "Existencia: $cantidad"; ?></p>
                        <?php
                        if($agotado) {
                        ?>
                            <button id="<?php echo $numPro ?>" class="agotado" disabled>
                                <i class="fa-solid fa-circle-exclamation" style="color: #ffffff;"></i>
                                Producto agotado
                            </button>
                        <?php
                        } else {
                        ?> 
                            <button id="<?php echo $numPro ?>" onclick="agregar(this.id)">
                                <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                                Añadir al carrito
                            </button>
                        <?php
                        }
                        ?>
                        
                        <br><br>
                    </div>
                <?php
                        $numPro = $numPro+1;
                    }//fin while
                ?>
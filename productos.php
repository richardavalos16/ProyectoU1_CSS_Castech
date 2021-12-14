<?php
    include 'global/config.php';
    include 'global/conexion.php';
    include 'carrito.php';
    include 'Bases/Encabezado.php'
?>

        <?php if($mensaje != "") {?>
        <div class = "contenedor">
            <br>
            <?php echo ($mensaje);?>
            <a href = "mostrarCarrito.php" class = "badge badge-sucess"> Ver carrito </a>
        </div>
        <?php } ?>

        <br>
        <main class= "contenedor sombra">
        <h1> <center>Productos</h1>

        <br><br><br>
        <div class= "grid">
            <?php
                $sentencia = $pdo->prepare("SELECT * FROM `productos`");
                $sentencia->execute();
                $listaProductos = $sentencia->fetchAll (PDO::FETCH_ASSOC);
                //print_r($listaProductos);
            ?>

            <?php foreach ($listaProductos as $producto) {?>
                <div class="producto">
                    <img class="producto__imagen" 
                    src=<?php echo $producto['IMAGEN'];?> 
                    alt=<?php echo $producto['NOMBRE'];?>
                    title= <?php echo $producto['NOMBRE'];?>
                    height = 354px;
                    >
                    <div class="producto__informacion">
                        <br>
                        <p class="producto__nombre"><?php echo $producto['NOMBRE'];?></p>
                        <p class= "producto__precio">$<?php echo $producto['PRECIO'];?></p>
                        <form class="formulario_producto" method = "post">

                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['NOMBRE'], COD, KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['PRECIO'], COD, KEY);?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">
                            

                            <button class="formulario_producto__submit" type="submit" name = "btnAccion" value ="Agregas">
                             Agregar al carrito
                            </button>    
                        </form>
                    </div>
                </a>
            </div> <!--.producto-->
            <?php } ?>

        </main>

        
        <br><br>
    <footer class="footer">
        <p>Todos los derechos reservados. Castech </p>
        <p>Juan Ricardo Castañeda Avalos </p>
        <p>Frida Paola Palacios Gómez </p>
    </footer>

            

</body>
</html>
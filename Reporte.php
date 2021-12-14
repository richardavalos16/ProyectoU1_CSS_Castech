<?php
    ob_start();
    include 'global/config.php';
    include 'carrito.php';
    include 'Bases/Encabezado.php'
?>

        <main class= "contenedor sombra">
        <h1> <center>Recibo</h1>
        <?php if(!empty($_SESSION['CARRITO'])) { ?>

            <br><br>
            <table class ="table table-light table-bordered">
                <tbody>
                    <tr>
                        <th width="40%">Descripción</th>
                        <th width="15%" class = "text-center">Precio</th>
                        <th width="20%" class = "text-center">Cantidad</th>
                        <th width="20%" class = "text-center">Total</th>
                        <th width="5%">--</th>
                    </tr>

                    <?php $total = 0;?>
                    <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>
                    <tr>
                        <td width="40%"><?php echo $producto['NOMBRE']?></td>
                        <td width="15%" class = "text-center"><?php echo $producto['PRECIO']?></td>
                        <td width="20%" class = "text-center"><?php echo $producto['CANTIDAD']?></td>
                        <td width="20%" class = "text-center"><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2);?></td>
                        <td width=5%> 
                            <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                            <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button></th>
                            </form>
                    </tr>
                    <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                    <?php } ?>

                    <tr>
                        <td colspan = "3" align ="right"><h3>Total</h3></td>
                        <td align ="right"><h3>$<?php echo number_format($total,2);?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </main>

        <?php }else{ ?>
            <div class = "alert alert-success">
                No se han añadido productos al carrito.
            </div>
        <?php } ?>

    <br><br>
    <footer class="footer">
        <p>Todos los derechos reservados. Castech </p>
        <p>Juan Ricardo Castañeda Avalos </p>
        <p>Frida Paola Palacios Gómez </p>
    </footer>

            

</body>
</html>

<?php

    $html=ob_get_clean();

    require_once 'Libreria/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemotedEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('letter');

    $dompdf->render();

    $dompdf->stream("Recibo_Castech.pdf", array("Attachment"=>false));

?>
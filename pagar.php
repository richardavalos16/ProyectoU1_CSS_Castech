<?php
    include 'global/config.php';
    include 'global/conexion.php';
    include 'carrito.php';
    include 'Bases/Encabezado.php'
?>

<?php
    if($_POST)
    {
        $total = 0;
        $SID = session_id();
        $correo = $_POST['email'];

        foreach($_SESSION['CARRITO'] as $indice=>$producto)
        {
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
        }

        $sentencia = $pdo->prepare("INSERT INTO `ventas` (`ID`, `CLAVE_TRANSACCION`, `PAYPAL_DATOS`, `FECHA`, `CORREO`, `TOTAL`, `STATUS`)
         VALUES (NULL, :CLAVE_TRANSACCION, '', NOW(), :CORREO, :TOTAL, 'Pendiente');");

        $sentencia->bindParam(":CLAVE_TRANSACCION", $SID);
        $sentencia->bindParam(":CORREO", $correo);
        $sentencia->bindParam(":TOTAL", $total);
        $sentencia->execute();

        $idVenta=$pdo->lastInsertId();

        foreach($_SESSION['CARRITO'] as $indice=>$producto)
        {
            $sentencia=$pdo->prepare("INSERT INTO `detalle_ventas` (`ID`, `ID_VENTA`, `ID_PRODUCTO`, `PRECIO_UNITARIO`, `CANTIDAD`, `DESCARGADO`) 
            VALUES (NULL, :ID_VENTA, :ID_PRODUCTO, :PRECIO_UNITARIO, :CANTIDAD, '0');");

            $sentencia->bindParam(":ID_VENTA", $idVenta);
            $sentencia->bindParam(":ID_PRODUCTO", $producto['ID']);
            $sentencia->bindParam(":PRECIO_UNITARIO", $producto['PRECIO']);
            $sentencia->bindParam(":CANTIDAD", $producto['CANTIDAD']);

            $sentencia->execute();
        }

        foreach($_SESSION['CARRITO'] as $indice=>$producto)
        {
            $sentencia=$pdo->prepare("UPDATE `productos` SET `EXISTENCIA` = ((SELECT `EXISTENCIA` FROM `productos` 
            WHERE `productos`.`ID` = :ID) - :CANTIDAD) WHERE `productos`.`ID` = :ID;");

            $sentencia->bindParam(":ID", $producto['ID']);
            $sentencia->bindParam(":CANTIDAD", $producto['CANTIDAD']);

            $sentencia->execute();
        }


        //echo "<h3>".$total."</h3>";
    }
?>

<div class="jumbotron">
    <h1 class="display-4"><center>¡Paso Final! </h1>
    <hr class="my-4">
    <p class="lead"><center> Estás a punto de pagar con PayPal la cantidad de:
        <h4><center>$<?php echo number_format($total, 2); ?></h4>
    </p>
        <p><strong><center>Para aclaraciones: fridapm01@hotmail.com</strong></p>

<br>


<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"MXN","value":<?php echo $total;?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>¡Gracias por su compra!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
    </div>


<br><br>
    <footer class="footer">
        <p>Todos los derechos reservados. Castech </p>
        <p>Juan Ricardo Castañeda Avalos </p>
        <p>Frida Paola Palacios Gómez </p>
    </footer>

            

</body>
</html>
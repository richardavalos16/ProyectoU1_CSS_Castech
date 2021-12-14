<?php

session_start();

$mensaje="";
if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']) {
       
        case 'Agregas':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="El id es correcto: ".$ID."<br/>";
                
            }else{$mensaje.="El id es incorrecto: ".$ID."<br/>";}

            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="El nombre es correcto: ".$NOMBRE."<br/>";
                
            }else{$mensaje.="El nombre es incorrecto: ".$NOMBRE."<br/>"; break;}
            
            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="La cantidad es correcta: ".$CANTIDAD."<br/>";
                
            }else{$mensaje.="La cantidad es incorrecta: ".$CANTIDAD."<br/>"; break;}
            
            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="El precio es correcto: ".$PRECIO."<br/>";
                
            }else{$mensaje.="El precio es incorrecto: ".$PRECIO."<br/>"; break;}
            
            if (!isset($_SESSION['CARRITO']))
            {
                $producto = array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );

                $_SESSION['CARRITO'][0]=$producto;
                $mensaje= "Producto agregado al carrito";
            }
            else
            {
                $NumeroProductos = count($_SESSION['CARRITO']);
                $producto= array (
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );

                $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                $mensaje= "Producto agregado al carrito";
            }

            //$mensaje= print_r($_SESSION, true);
            
            
        break;

        case 'Eliminar':
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                            echo "<script>alert('Producto eliminado.')</script>";
                        }
                    }
                }else{$mensaje.="El id es incorrecto: ".$ID."<br/>";}

        break;
    }
}
?>
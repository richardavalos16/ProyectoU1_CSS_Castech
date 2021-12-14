<?php
    include "global/config.php";
    include "global/conexion.php";

       if (($_GET['id_producto'] != "") && ($_GET['nombre'] != "")&&($_GET['imagen'] != "")&&($_GET['precio'] != "") &&($_GET['existencia'] != ""))
        {	 
          $id = $_GET["id_producto"];
          $nombre = $_GET["nombre"];
          $precio = $_GET["precio"];
          $imagen = $_GET["imagen"];
          $existencia = $_GET["existencia"];

          echo "Se actualizo : <br>";
          echo "Id: ".$id."<br>";
          echo "Producto: ".$nombre."<br>";
          echo "Precio: ".$precio."<br>";
          echo "Imagen: ".$imagen."<br>";
          echo "Existencia: ".$existencia."<br>";
          
          $sql=$pdo->prepare("UPDATE `productos` SET `ID`='$id',`NOMBRE`='$nombre',`PRECIO`='$precio', `IMAGEN`='$imagen',
                `EXISTENCIA`='$existencia' WHERE `ID` ='$id'");

          $sql->execute();
        } 
     

     include "CRUD_Cambios.html";

?>
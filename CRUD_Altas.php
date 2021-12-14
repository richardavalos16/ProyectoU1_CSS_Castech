<?php
    include "global/config.php";
    include "global/conexion.php";

     
       if (($_GET['nombre'] != "")&&($_GET['imagen'] != "")&&($_GET['precio'] != "") &&($_GET['existencia'] != ""))
        {	 
          $nombre = $_GET["nombre"];
          $imagen = $_GET["imagen"];
          $precio = $_GET["precio"];
          $existencia = $_GET["existencia"];

          echo "Se agregó : <br>";
          echo "Producto: ".$nombre."<br>";
          echo "Precio: ".$precio."<br>";
          echo "Imagen: ".$imagen."<br>";
          echo "Existencia: ".$existencia."<br>";
          
          $sql = $pdo->prepare("INSERT INTO `productos`(`NOMBRE`, `PRECIO`, `IMAGEN`, `EXISTENCIA`) 
                  VALUES ('$nombre','$precio', '$imagen', '$existencia')");

          $sql->execute();
        } 
     

     include "CRUD_Altas.html";

?>
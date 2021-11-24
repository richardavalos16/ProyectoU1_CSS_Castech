<?php
    $dbhost = "localhost"; //host donde esta la base de datos
   	$dbname = "castech"; //nombre de BD
   	$dbuser = "root"; // user name
   	$dbpass = ""; // password de usuario

     $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

     if (!$db)
     {
       echo "Error en la conexion";
       exit;
     }
     else
     {
       if (($_GET['nombre'] != "")&&($_GET['precio'] != "") &&($_GET['existencia'] != ""))
        {	 
          $nombre = $_GET["nombre"];
          $precio = $_GET["precio"];
          $existencia = $_GET["existencia"];

          echo "Se agregó : <br>";
          echo "Producto: ".$nombre."<br>";
          echo "Precio: ".$precio."<br>";
          echo "Existencia: ".$existencia."<br>";
          
          $sql = "INSERT INTO `producto`(`NOMBRE_PRODUCTO`, `PRECIO_PRODUCTO`, `EXISTENCIA_PRODUCTO`) 
                  VALUES ('$nombre','$precio','$existencia')";

          mysqli_query($db,$sql); 
          mysqli_close($db);
        } 
     }

     include "CRUD_Altas.html";

?>
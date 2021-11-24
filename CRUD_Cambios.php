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
       if (($_GET['id_producto'] != "") && ($_GET['nombre'] != "")&&($_GET['precio'] != "") &&($_GET['existencia'] != ""))
        {	 
          $id = $_GET["id_producto"];
          $nombre = $_GET["nombre"];
          $precio = $_GET["precio"];
          $existencia = $_GET["existencia"];

          echo "Se actualizo : <br>";
          echo "Id: ".$id."<br>";
          echo "Producto: ".$nombre."<br>";
          echo "Precio: ".$precio."<br>";
          echo "Existencia: ".$existencia."<br>";
          
          $sql = "UPDATE `producto` SET `ID_PRODUCTO`='$id',`NOMBRE_PRODUCTO`='$nombre',`PRECIO_PRODUCTO`='$precio',
                `EXISTENCIA_PRODUCTO`='$existencia' WHERE `ID_PRODUCTO` =$id";

          mysqli_query($db,$sql); 
          mysqli_close($db);
        } 
     }

     include "CRUD_Cambios.html";

?>
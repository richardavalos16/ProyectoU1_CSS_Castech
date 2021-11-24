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
       if (($_GET['id'] != ""))
        {	 
          $id = $_GET["id"];

          echo "Se elimino: <br>";
          echo "Id: ".$id."<br>";
          
          $sql = "DELETE FROM `producto` WHERE `ID_PRODUCTO` =$id";

          mysqli_query($db,"SELECT * FROM `producto`");
          mysqli_query($db,$sql); 
          mysqli_close($db);
        } 
     }

     include "CRUD_Bajas.html";
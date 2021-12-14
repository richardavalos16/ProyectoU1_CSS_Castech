<?php
    include "global/config.php";
    include "global/conexion.php";

       if (($_GET['id'] != ""))
        {	 
          $id = $_GET["id"];

          echo "Se elimino: <br>";
          echo "Id: ".$id."<br>";
          
          $sql =$pdo->prepare("DELETE FROM `productos` WHERE `ID` =$id");

          $sql->execute();
        } 

     include "CRUD_Bajas.html";
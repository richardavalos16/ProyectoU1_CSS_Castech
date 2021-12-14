<?php
      include 'global/config.php';
      include 'global/conexion.php';
    
       if (($_GET['nombres'] != "")&&($_GET['apellidos'] != "") &&($_GET['usuario'] != "")&&($_GET['correo'] != "")
            &&($_GET['contrasena'] != ""))
        {	 
          $nombres = $_GET["nombres"];
          $apellidos = $_GET["apellidos"];
          $usuario = $_GET["usuario"];
          $correo = $_GET["correo"];
          $contraseña = $_GET["contrasena"];
          
           $sql=$pdo->prepare("INSERT INTO `usuarios`(`NOMBRES`, `APELLIDOS`, `USERNAME`, `CORREO`, `CONTRASENA`) 
           VALUES ('$nombres','$apellidos','$usuario','$correo', '$contraseña')");

           $sql->execute();
        } 
     

     include "Inicio_Sesion.html";

?>
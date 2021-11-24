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
       if (($_GET['nombres'] != "")&&($_GET['apellidos'] != "") &&($_GET['Usuario'] != "")&&($_GET['correo'] != "")
            &&($_GET['contrasena'] != ""))
        {	 
          $nombres = $_GET["nombres"];
          $apellidos = $_GET["apellidos"];
          $usuario = $_GET["Usuario"];
          $correo = $_GET["correo"];
          $contraseña = $_GET["contrasena"];
          
          $sql = "INSERT INTO `usuarios`(`NOMBRES_USUARIO`, `APELLIDOS_USUARIO`, `USERNAME_USUARIO`, 
                 `CORREO_USUARIO`, `CONTRASENA_USUARIO`) VALUES ('$nombres','$apellidos','$usuario','$correo',
                 '$contraseña')";

          mysqli_query($db,$sql); 
          mysqli_close($db);
        } 
     }

     include "Inicio_Sesion.html";

?>
<?php

    require 'global/conn.php';

    session_start();

    $usuario = $_GET['usuario'];
    $contrasena = $_GET['contrasena'];

    $q = "SELECT COUNT(*) AS contar FROM `usuarios` where `USERNAME` = '$usuario' AND `CONTRASENA` = '$contrasena'";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);

    if($array['contar']>0)
    {
        $_SESSION['username'] = $usuario;
        include "productos.php";
        
    }
    else{
        echo "Datos incorrectos.";
    }

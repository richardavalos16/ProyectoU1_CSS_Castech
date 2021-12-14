<?php

    require 'global/conn.php';

    session_start();

    $usuario = $_GET['usuario'];
    $clave = $_GET['contrasena'];

    $q = "SELECT * COUNT(*) AS contar FROM `usuarios` where `username` = '$usuario' AND `contrasena` = $clave";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);

    if($array['contar']>0)
    {
        $_SESSION['username'] = $usuario;
        header("productos.php");
    }
    else{
        echo "Datos incorrectos.";
    }
?>
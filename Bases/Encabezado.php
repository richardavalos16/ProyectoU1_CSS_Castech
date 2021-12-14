<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Castech</title>

    <link rel="preload" href="CSS/normalize.css" as="normalize">
    <link rel="stylesheet" href="CSS/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Krub:400,700" rel="stylesheet">
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <link rel="stylesheet" href="CSS/Estilo.css">
    <link href="img/Logotipo.png" rel="shortcut icon">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    
</head>
<body>
    
    <header class = "titulo">
            <h1 > 
                <img class="titulo__imagen" src="img/Logotipo.png" alt="Nintendo"> Castech 
                <div class=" nav-bg_1">
                    <nav class="navegacion-principal_1 ">
                        <a  href="Inicio_Sesion.html">Iniciar Sesión</a>
                        <a  href="Salir.php">Salir</a>
                        <a  href="mostrarCarrito.php">Carrito (<?php echo (empty($_SESSION['CARRITO']))?:count($_SESSION['CARRITO']);?>) </a>
                    </nav>
                </div> 
            </h1>
        </header>

        <div class=" nav-bg">
            <nav class="navegacion-principal ">
                <a href="index.html">Inicio</a>
                <a href="Productos.php">Productos</a>
                <a href="Nosotros.html">Nosotros</a>
                <a href="Contacto.html">Contacto</a>
            </nav>
        </div>
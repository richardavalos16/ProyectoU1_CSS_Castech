<?php
 
include('conexion.php');
session_start();
 
if (isset($_GET['Ingresar'])) {
 
    $username = $_GET['Usuario'];
    $password = $_GET['contrasena'];
 
    $query = $db->prepare("SELECT * FROM usuarios WHERE USERNAME_USUARIO=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo 'Los datos son incorrectos.';
    } else {
        if (password_verify($password, $result['contrasena'])) {
            $_SESSION['user_id'] = $result['id_usuario'];
            echo 'Ya estás dentro';
        } else {
            echo 'Los datos son incorrectos';
        }
    }
}

include "index.html";
?>
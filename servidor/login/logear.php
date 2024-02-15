<?php 
session_start();

    include "../../classes/Auth.php";

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $Auth = new Auth();

    if($Auth->logear($usuario, $password)){
        header("location:../../php/interfazAdmin.php");
    }else{
        $_SESSION['login_error'] = 'ACCESO DENEGADO';
        header("location:../../index.php"); 
    }
?>
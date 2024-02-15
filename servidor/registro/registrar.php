<?php
session_start();

include "../../classes/Auth.php";

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatpassword = $_POST['repeatpassword'];

$Auth = new Auth();

// Función para registrar y notificar
function registrarYNotificar($Auth, $usuario, $email, $password, $repeatpassword) {

    $pattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/';

    if ($Auth->correoExiste($email)) {
        $_SESSION['register_error'] = 'EL CORREO YA ESTÁ REGISTRADO. POR FAVOR, ELIGE OTRO CORREO';
        header("location:../../index.php");
    } elseif ($Auth->usuarioExiste($usuario)) {
        $_SESSION['register_error'] = 'EL USUARIO YA ESTÁ REGISTRADO. POR FAVOR, ELIGE OTRO NOMBRE DE USUARIO';
        header("location:../../index.php");
    } elseif ($password != $repeatpassword) {
        $_SESSION['register_error'] = 'LAS CONTRASEÑAS NO COINCIDEN.';
        header("location:../../index.php");
    }elseif (!preg_match($pattern, $password)) {
        $_SESSION['register_error'] = 'LA CONTRASEÑA DEBE CONTENER AL MENOS UNA LETRA, UN NÚMERO Y UN CARÁCTER ESPECIAL.';
        header("location:../../index.php"); 
    }else {
        $registrado = $Auth->registrar($usuario, $email, $password);
        if ($registrado) {
            $_SESSION['register_success'] = 'REGISTRO EXITOSO';
            header("location:../../index.php");
        } else {
            $_SESSION['register_error'] = 'ERROR EN EL REGISTRO';
            header("location:../../index.php");
        }
    }
}

if ($_POST) {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];

    registrarYNotificar($Auth, $usuario, $email, $password, $repeatpassword);
}
?>
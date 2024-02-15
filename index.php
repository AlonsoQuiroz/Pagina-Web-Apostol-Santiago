<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estiloslogin.css">


</head>
<body>
    <header>
        <div class="logo">
            <img src="assets/images/logoc.png" alt="logoa">
        </div>
    </header>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia Sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>
            <!--Formulario de Login y Register-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="servidor/login/logear.php" method="post" class="formulario__login"> 
                    <h2>Iniciar Sesión</h2>
                    <?php
                        if (isset($_SESSION['login_error'])) {
                            echo '<div style="background-color: #ffcccc; color: #ff0000; font-weight: bold; padding: 10px; border: 1px solid #ff0000; border-radius: 5px; text-align: center; margin-top: 20px;">' . $_SESSION['login_error'] . '</div>';
                            unset($_SESSION['login_error']); // Limpia el mensaje después de mostrarlo
                        }
                        if (isset($_SESSION['register_error'])) {
                            echo '<div style="background-color: #ffcccc; color: #ff0000; padding: 10px; border: 1px solid #ff0000; border-radius: 5px; text-align: center; margin-top: 20px;">' . $_SESSION['register_error'] . '</div>';
                            unset($_SESSION['register_error']); // Limpia el mensaje después de mostrarlo
                        }elseif (isset($_SESSION['register_success'])) {
                            echo '<div style="background-color: #ccffcc; color: #008000; padding: 10px; border: 1px solid #008000; border-radius: 5px; text-align: center; margin-top: 20px;">' . $_SESSION['register_success'] . '</div>';
                            unset($_SESSION['register_success']); // Limpia el mensaje después de mostrarlo
                        }
                    ?>
                    <input type="text" name="usuario" id="usuario" placeholder="Username" required>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <button type="submit" name="submit">Entrar</button>
                </form>
                
                <!--Registro-->
                <form action="servidor/registro/registrar.php" method="post" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" id="usuario" name="usuario" placeholder="Username" required autofocus>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="password" id="repeatpassword" name="repeatpassword" placeholder="Confirmed Password" required>
                    <input type="email" id="email" name="email" placeholder="Correo" required>
                    <button type="submit" name="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>
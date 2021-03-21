<?php
            //inicializar sesion
        session_start();

        if (isset($_SESSION['user_id'])) {
            header('Location: /php-Login');
        }
        require 'BaseDatos.php';

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $records = $conn->prepare('SELECT id, email, password FROM Usuario WHERE email = :email');
            $records->bindParam(':email', $_POST['email']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

            $message = '';

            if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header("Location: /php-Login");
            } else {
            $message = 'Lo siento, esas credenciales no coinciden';
            }
        }

?>

<!DOCTYPE html>

    <html>
        <head>
            <meta charset="utf-8">
                <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="assets/css/style.css">       
        </head>
        <body>
        <body>

<header id="main-header">

<a id="logo-header" href="/assets/Imagenes/LOGO INVENTARIO.png">
    <span class="site-name">HOSPITAL MILITAR CENTRAL</span><br>
    <span class="site-desc">Diseño de Inventario</span>
</a> <!-- / #logo-header -->

<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="Registro.php">Registro</a></li>
        <li><a href="CerrarSesion.php">Salir</a></li>
    </ul>
</nav><!-- / nav -->

</header><!-- / #main-header -->

    
<div class="login-wrap">
    <div class="login-html">
    <div class="container">
            <h1>Iniciar Sesion</h1>
            </div>
        </div>
<div class="login-form">
    <div class="sign-in-htm">
        <div class="group">
            <label for="user" class="label">Nombre de usuario</label>
            <input id="user" type="text" class="input">
        </div>
        <div class="group">
            <label for="pass" class="label">Contraseña</label>
            <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> Mantenerme conectado</label>
        </div>
        <div class="group">
            <input type="submit" class="button" value="Registrarse">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
            <a href="#forgot">
                ¿Has olvidado tu contraseña?</a>
        </div>
    </div>

</body>
    </html>



<?php
        //inicializar sesion
        session_start();

        if (isset($_SESSION['user_id'])) {
            header('Location: /php-login');
        }
        require 'BaseDatos.php';

        //verificar los campos con la condicion
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
            $records->bindParam(':email', $_POST['email']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

            $message = '';

                //validar el usuario y si no se encuentra vacio
            if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header("Location: /php-login");
            } else {
            $message = 'Lo siento, esas credenciales no coinciden';
            }
        }

?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
               
            <link rel="stylesheet" type="text/css" href="assets/css/style.css">       
        </head>
        <body>
        <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
            <?php endif; ?>
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

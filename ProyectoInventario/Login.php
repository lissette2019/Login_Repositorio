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
                <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="assets/css/style.css">       
        </head>
        <body>
        <header id="main-header">
		
		<a id="logo-header" href="/assets/css/Imagenes/LOGO INVENTARIO>png">
			<span class="site-name">Hospital Militar Central</span>
			<span class="site-desc">Diseño web del Inventario Local</span>
		</a> <!-- / #logo-header -->

		<nav>
			<ul>
				<li><a href="/index.php">Inicio</a></li>
				<li><a href="/Registro.php">Registrarse</a></li>
				<li><a href="/CerrarSesion.php">Salir</a></li>
			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->
            <div class="container" id='login'>
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                    <h1>Login</h1>
                    </div>
                </div>
            </div>
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
            <footer id="main-footer">
		<p>&copy; 2021 <a href="https://www.fuerzaarmada.mil.sv/?page_id=751">Hospital Militar Central</a></p>
	</footer> <!-- / #main-footer -->

        </body>
    </html>

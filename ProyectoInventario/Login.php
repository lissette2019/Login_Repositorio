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
            <div class="container" id='login'>
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                    <h1>Login</h1>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <h4>Usuario</h4>
                <input class="form-control" name="email" type="text" placeholder="coloca tu correo"><br>
                <h4>contraseña</h4>
                <input class="form-control" name="password" type="password" placeholder="ingresa tu contraseña"><br>
            </div>
            <div class="panel-footer">
                <button class="btn-info">Ingresar</button>
                <button class="btn-info">Registrate</a></button>
            </div>


        </body>
    </html>



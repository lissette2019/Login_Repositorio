<?php
        //inicializar sesion
        session_start();

        require 'BaseDatos.php';

        if (isset($_SESSION['user_id'])) {
            $records = $conn->prepare('SELECT id, email, password FROM usuario WHERE id = :id');
            $records->bindParam(':id', $_SESSION['user_id']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

            $user = null;

            //verificacion de resultados sean mayor a cero

            if (count($results) > 0) {
            $user = $results;
            }
        }
?>    
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Bienvenido al Inventario</title>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <link rel="stylesheet" href="assets/css/style.css">
        </head>
        <body>

            <h1>Por favor ingresa o regístrate</h1>

            <a href="Login.php">Login</a> or
            <a href="Registro.php">Registrate</a>
    
        </body>
        </html>

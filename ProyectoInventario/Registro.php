
<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registrarse</title>
            <link rel = "preconnect" href = "https://fonts.gstatic.com">
        <link href = "https://fonts.googleapis.com/css2? family = Noto + Sans + JP: wght @ 300 & display = swap "rel =" stylesheet ">
         <link rel="stylesheet" href="assets/css/style.css">     
    </head>
    <body>

        <h1>Registrarse</h1>
        <span> or <a href="Registro.php">Registro</a></span>

        <form action="Registro.php" method="post">
            <input type="text" name="email" placeholder="Ingrese su correo">
            <input type="password" name="password" value="" placeholder="Ingresa tu contraseña">
            <input type="password" name="confirm_password" placeholder="Confirmar  contraseña">
            <input type="submit" value="send">


    </form>

        
    </body>
</html>
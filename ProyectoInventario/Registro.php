
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

        <header id="main-header">
                    
                    <a id="logo-header" href="/assets/Imagenes/LOGO INVENTARIO.png">
                        <span class="site-name">HOSPITAL MILITAR CENTRAL</span><br>
                        <span class="site-desc">Diseño de Inventario</span>
                    </a> <!-- / #logo-header -->

                    <nav>
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="CerrarSesion.php">Salir</a></li>
                        </ul>
                    </nav><!-- / nav -->
            </header><!-- / #main-header -->

            <h1>Registrarse</h1><br>
            

            <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Nombre de usuario</label>
                        <input id="user" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Contraseña</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repite la contraseña</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Dirección de correo electrónico</label>
                        <input id="pass" type="text" class="input">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Inscribirse">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">¿Ya tienes cuenta?</a><br>
                        <span> or <a href="Login.php">Iniciar Sesion</a></span>
                    </div>

        </form>

            
        </body>
</html>
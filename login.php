<?php
session_start();
if(isset($_SESSION['usuario']))
    header("Location:http://localhost:80/Rumeet/inicio.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title> Rumeet 'Compartir Casa' - Inicio Sesi&oacute;n </title>
    <link rel="stylesheet" type="text/css" href="css/style.scss">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="descripcion" content="Inicio de sesion para compartir casa y publicidad para renta y venta de casas" />
    <meta name="keywords" content="compartir casa, renta casa, venta casa, Los Mochis, publicar casa, variedad casas,
    casa ideal, compañero ideal, roomie"/>
</head>

<body>

    <img class="wave" src="img/wave.png" alt="Rumeet" class="logo">
    <div class="container">
        <div class="img">
            <img src="img/encontrar.svg"/>
        </div>
        <div class="login-content">
            <form action="verificador.php" method="POST" id="login">
                <img src="img/companero.svg"/>
                <h2 class="title"> Bienvenido a <a href="index.php"> Rumeet </a></h2>
                <h3> Encontrando compa&ntilde;ero r&aacute;pido y sencillo</h3>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input class="input" type="text" name="usuario">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contrase&nacute;a</h5>
                        <input class="input" type="password" name="pass">
                    </div>
                </div>
                <a href="registro.php" id="b">Registrate</a>
                <a href="restablecer.php" id="a">¿Olvidaste la contrase&nacute;a?</a>
                <input type="submit" class="boton5" value="Ingresar">
            </form>
        </div>
    </div>
   
    <script type="text/javascript" src=js/main.js></script>
</body>

</html>

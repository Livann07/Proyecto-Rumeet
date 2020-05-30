<?php
session_start();
if(!isset($_SESSION['usuario']))
    header("Location:http://localhost:80/Rumeet/index.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title> Rumeet 'Compartir Casa' - Configuraci&oacute;n </title>
    <link rel="stylesheet" type="text/css" href="css/configuracion.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <meta name="descripcion" content="Configura la informaci&oacute;n de tu cuenta" />

    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/configuracion.js"></script>
</head>

<body onload="cargarDatos()" >
    <img class="wave" src="img/waveinv.png" alt="Rumeet">
    <div class="container">
        <div class="titulo">
            <img src="img/companero.svg">
            <h2>Configuraci&oacute;n</h2>
        </div>
        <img src="./img/configuracion.png" class="imgen">
        <div id="informacion" class="contenido">
        </div>
        <input type="button" class="btnRegresar" value="Regresar" onclick="regresar()">
    </div>
    <div id="error"> </div>
    <div id="ayuda"> </div>
</body>

</html>
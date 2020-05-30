<?php
session_start();
if(isset($_SESSION['usuario']))
    header("Location:http://localhost:80/Rumeet/inicio.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title> Rumeet 'Compartir Casa' - Restablecer Contrase&ntilde;a</title>
    <link rel="stylesheet" type="text/css" href="css/reestablecer.scss" />

    <meta name="descripcion"
        content="Buscador de compañeros para compartir casa y publicidad para renta y venta de casas" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap" />
</head>

<body>
    <div id="margen">
    </div>
    <diV id="seccion-form">
        <h1> Recuperar Contrase&ntilde;a</h1>
        <p>Encontrando compañero rápido y sencillo</p>
        <img src="img/companero.svg" id="imgIcono">
        <p>Ingresa tu correo electronico para buscar tu cuenta&colon;<p>
        <form action="inicio.php" id="formulario" method="POST" onsubmit = "event.preventDefault(); enviar();">
            <input type="text" placeholder="Correo" name="correo" class="datos" id="correo" /> <br> 
            <input type="submit" id="enviar" value="Enviar" class="btn_fondo_corredizo"/>
        </form>
    </diV>
    <div id="ayuda"> </div>

    <script>
        document.getElementById("enviar").onclick = function () {
            enviar();
        }
        function enviar() {  
            var correo = document.getElementById("correo").value;
           
            var correo2 = JSON.stringify(correo);
            correo2 = correo2.substring((correo2.indexOf('"') + 1), correo2.length - 1);

            if (correo2.length < 1 ) {
                alert("El campo esta vacio");
            }else {
                alert('Se ha enviado el correo');
                document.getElementById("formulario").submit();
            }
        }
    </script>
</body>

</html>
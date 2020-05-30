<?php
session_start();
if(!isset($_SESSION['usuario']))
    header("Location:http://localhost:80/Rumeet/index.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title> Rumeet 'Compartir Casa' - Comunidades </title>
    <link rel="stylesheet" type="text/css" href="css/comunidad.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="descripcion" content="descripcion" />

    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script>
        function cargarDatos() {
            // AJAX
            $.ajax({
                //Tipo de envio
                type: "GET",
                //URL destino
                url: "listar-usuarios.php",
                //Datos a enviar
                data: {},
                //Procesa Dato recibido
                success: function (data) {
                    //Coloca el resultado en la pagina WEB
                        $("#resultado").html(data);
                },

                //Procesa mensaje de error
                error: function (e) {
                    //Coloca un mensaje en la pagina WEB
                    $("#error").text("error:" + e.status + "error:" + e.statusText);
                }
            });
        }
    </script>

</head>

<body onload="cargarDatos();">
    <img src="img/logo-texto-derecha.png" alt="Rummet" id="r">
    <h2 > &#161;Contacta a las personas que buscan lo mismo que tú&#33;</h2>
    <img class="vector" src="img/comunidad.png" alt="Rumeet">
        <h2 class="titulo">Aqu&iacute; se muestran los usuarios registrados en Rummet</h2>
    <div id="resultado"> </div>
    <div id="error"> </div>
    <div id="ayuda"> </div>
    
</body>


</html>
<?php
session_start();
if(!isset($_SESSION['usuario']))
    header("Location:http://localhost:80/Rumeet/index.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <img src="img/logo-texto-derecha.png" alt="Rummet" />
    <h2 > Publica la casa que quieras vender o rentar de manera r&aacute;pida y sencilla</h2>
        <title>Rumeet </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="css/publicitar.css" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" /> 
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap"/> 
        <meta name="descripcion" content="Buscador de compañeros para compartir casa y publicidad para renta y venta de casas" />
        <meta name="keywords" content="compartir casa, renta casa, venta casa, Los Mochis, publicar casa, variedad casas,
        casa ideal, compañero ideal, roomie"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#precio").forceNumeric();
                $("#telefono").forceNumeric();
            });

            // forceNumeric() plug-in implementation
            jQuery.fn.forceNumeric = function () {
                return this.each(function () {
                    $(this).keydown(function (e) {
                        var key = e.which || e.keyCode;

                        if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                        // numbers   
                            key >= 48 && key <= 57 ||
                        // Numeric keypad
                            key >= 96 && key <= 105 ||
                        // comma, period and minus, . on keypad
                            key == 190 || key == 188 || key == 109 || key == 110 ||
                        // Backspace and Tab and Enter
                            key == 8 || key == 9 || key == 13 ||
                        // Home and End
                            key == 35 || key == 36 ||
                        // left and right arrows
                            key == 37 || key == 39 ||
                        // Del and Ins
                            key == 46 || key == 45)
                            return true;

                        return false;
                    });
                });
            }
        </script>
    </head>
    <body>
        <h1>Informaci&oacute;n de la casa </h1>
        <form name="form1" id="form1" method="POST" action="registrar_casa.php" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="T&iacute;tulo de la publicación" id="titulo" max="200"/> <br> <br>
            <label class="text">Escoje la opcion a la accion que deseas hacer: </label> <br>
            <input type="radio" id="tipo_renta" name="tipo" value="Rentar_la_casa" checked class="radio"/> <label>Rentar la casa </label><br>
            <input type="radio" id="tipo_venta" name="tipo" value="Vender_la_casa" class="radio"/> <label>Vender la casa </label><br><br>
            <textarea name="descripcion" cols="100" rows="5" placeholder="Descripcion de la casa" id="descripcion"></textarea> <br> <br>
            <input type="text" name="precio" placeholder="Precio" min="1" id="precio"/> <br> <br>
            <input type="text" name="telefono" placeholder="Telefono de contacto" id="telefono"/> <br> <br>
            <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple=""/> <br> <br>
            <button type="submit" class="btn_fondo_corredizo" id="enviar">Enviar</button>
            <img src="./img/casas.png" class="casa">
        </form>
        <div id="ayuda"></div>
    </body>
</html>
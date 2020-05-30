<?php
session_start();
if(isset($_SESSION['usuario']))
    header("Location:http://localhost:80/Rumeet/inicio.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Rumeet </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/index.scss" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" /> 
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap"/> 
    <meta name="descripcion" content="Buscador de compañeros para compartir casa y publicidad para renta y venta de casas" />
    <meta name="keywords" content="compartir casa, renta casa, venta casa, Los Mochis, publicar casa, variedad casas,
    casa ideal, compañero ideal, roomie"/>
    </head>
    <Body>
        <!-- barra superior-->
        <div class="barra-superior">
            <a href="inicio.php" class="logo">
                <img src="img/resize.png" alt="Rummet" class="logo" />
            </a>
            <div id="barra-busqueda">
                <form method="GET" action="index.php">
                    <input type="text" name="buscar" placeholder="Buscar" id="barra" autocomplete="off"/>
                </form>
            </div>
            <ul>
                <li> <a href="registro.php"> <span class="rellenoBtn"> Registrarse</span> </a></li>
                <li> <a href="login.php"> <span class="rellenoBtn"> Iniciar Sesi&oacute;n</span> </a></li>
            </ul>
        </div>
         <!-- slider-->
        <section id="slider">
            <!-- slider 1 -->
            <div id="slider-1">
                <h1 id="titulo-slider-1"> Compartir Casa  </h1>
                <span id="texto-slider-1">
                    Ya sea por la necesidad de estudiar, trabajar o vivir temporalmente en Los Mochis, compartir casa es la opci&oacute;n m&aacute;s barata y rentable 
                    con la que te puedas encontrar&period; No importa desde donde vengas, encontrar la manera de compartir casa en Los Mochis nunca hab&iacute;a sido 
                    tan sencillo&period; O tal vez vives en la ciudad y tienes el espacio suficiente como para recibir a otra persona, Rummet te ofrece de una manera 
                    f&aacute;cil publicar que estas dispuesto a compartir casa&period;
                </span>
                
            </div>
            <!-- slider 2 -->
            <div id="slider-2">
                <h1 id="titulo-slider-2"> Compa&ntilde;ero para compartir casa  </h1>
                <span id="texto-slider-2">  
                    &iexcl;Se parte de nuestra comunidad y encuentra a esa persona con el que puedes tener experiencias inolvidables&excl; Con Rumeet, ser&aacute;s capaz 
                    de encontrar a ese compa&ntilde;ero para compartir casa ideal para ti&period;
                </span>
                <span id="linea"></span>
                <span id="texto-slider-2-2">
                    Adem&aacute;s de nuestro atractivo principal, ofrecemos algunos puntos extras que pueden ser de inter&eacute;s por si tus 
                    objetivos son distintos&colon; 
                </span>
            </div>
            <!-- slider 3 -->
            <div id="slider-3">
                <h1 id="titulo-slider-3"> Renta de casas </h1>
                <span id="texto-slider-3">
                    Si quieres algo m&aacute;s privado, la renta de casas puede ser tu primera opci&oacute;n&period; Rumeet ofrece la posibilidad de publicar y buscar 
                    publicaciones sobre se la renta de casas en Los Mochis desde diferentes puntos de la ciudad, teniendo una alta variedad de lugares de d&oacute;nde 
                    escoger&period; &iquest;Quieres en el centro de la ciudad&quest;, &iquest;Cerca de tu trabajo o escuela&quest;, &iexcl;No hay problema, elige donde 
                    m&aacute;s te guste&excl;
                </span>
            </div>
            <!-- slider 4 -->
            <div id="slider-4">
                <h1 id="titulo-slider-4"> Venta de casas </h1>
                <span id="texto-slider-4">
                    &iquest;Quieres comenzar una nueva vida en Los Mochis&quest; &iexcl;No esperes m&aacute;s&excl; En Rumeet tambi&eacute;n puedes encontrar la casa ideal
                     para ti&period; Tenemos una secci&oacute;n especial para la venta de casas, no dudes en buscar tu casa ideal, tal vez te est&eacute; esperando&period; 
                     Comenzar una nueva vida en Los Mochis ahora es m&aacute;s f&aacute;cil que nunca&period;
                </span>
            </div>

        </section>
    </Body>
</html>
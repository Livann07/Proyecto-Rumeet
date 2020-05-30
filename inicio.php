<?php
session_start();
if(!isset($_SESSION['usuario']))
    header("Location:http://localhost:80/Rumeet/index.php");
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
    <!-- cosas del slider de las imagenes
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>-->

    <!-- desde archivos-->
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>

    </head>
   
    <Body>
        <!-- barra superior-->
        <div class="barra-superior" >
            <a href="inicio.php" class="logo">
                <img src="img/resize.png" alt="Rummet" class="logo" />
            </a>
            <div id="barra-busqueda">
                <form method="GET" action="inicio.php">
                    <input type="text" name="buscar" placeholder="Buscar" id="barra" autocomplete="off"/>
                </form>
            </div>
            <ul>
                <div class="opc"> <li> <a href="publicitar.php"> <span class="rellenoBtn"> Publicitar Casa </span> </a> </li> </div>
                <div class="opc"> <li> <a href="comunidad.php"> <span class="rellenoBtn"> Comunidad </span> </a> </li> </div>
                    <div id="espacio_usuario">
                        <li id="usua"> 
                            <ul class="submenu">
                            </ul> 
                        </li>
                    </div>
            </ul>
        </div>
        <?php
            if(!isset($_GET['buscar']))
            {
        ?>
        
                <!-- slider-->
        <section id="slider">
            <!-- slider 1 -->
            <div id="slider-1">
                <h1 id="titulo-slider-1"> Compartir Casa</h1>
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
        <?php
            }
            else
            {
        ?>
                <script> document.body.style.overflow = "visible"; </script>
                <!-- Cuerpo -->
                <div class="seccion_resultados" >
                    <h1>Resultados</h1>
                    <hr>
                    <div id="resultados" max-height='auto' max-width='100%'>

                    </div>
                </div>
        <?php
            }
        ?>
        
    </Body>
            
    <script>
        $(document).ready(cargarUsuario());
        function cargarUsuario(){
            var usuario = document.cookie;
            var cadena = "";
            cadena = usuario.substring(usuario.indexOf("=")+1,usuario.indexOf(";"));
            document.getElementById("usua").innerHTML = cadena + 
            '<ul class="submenu"> <li><a href="configuracion.php">Configuracion</a></li> <li id="sesion"><a href="salir.php">Cerrar sesion</a></li> </ul>'; 
        }

        <?php
        if(isset($_GET['buscar']))
        {   
            ?>
            cargarUsuario();
            document.getElementById("resultados").innerHTML = 
            <?php
            $con = mysqli_connect('localhost','root','');                 

            if (!$con) {
                // imprime un mensaje de error y sale del script
                die('No se pudo conectar: ' . mysqli_error($con));                                                   
            }
            // Selecciona la BD
            mysqli_select_db($con,'rumeet');                

            // Prepara  la consulta SQL
            $sql="SELECT * FROM casas";   

            // Realiza la consulta
            $result = mysqli_query($con,$sql);
            /*************  Genera la tabla respuesta ************************/
                // Obtiene cada fila (arreglo) de resultados
                if($result)
                {
                    while($ren = mysqli_fetch_array($result)) {
                        echo "<div class='seccion-horizontal'>";
                            echo "<div class='izquierda'>";
                                echo "<h3 style='text-align: center'>" . $ren['titulo'] ."</h3> <br>";
                                
                                echo "<div class='slider'>";
                                $imagenes = $ren['nom_archivos'];
                                $unaImg = "";
                                $index = 0;
                                $arrayImg = array();
                                while(strlen($imagenes) > 0)
                                {
                                    $unaImg = substr($imagenes, $index, stripos($imagenes,"|"));
                                    $imagenes = substr($imagenes,stripos($imagenes,"|")+1);
                                    array_push($arrayImg, $unaImg);
                                }
                                $indexImg = 0;
                                while($indexImg < count($arrayImg))
                                {
                                    echo "<div class='imagen'><img src='archivos_subidos/" . $ren['id'] . "/" . $arrayImg[$indexImg] . " '> </div>";
                                    $indexImg = $indexImg + 1;
                                }
                                
                                echo "</div>";
                            echo "</div>";
                            echo "<div class='contenido'>";
                                echo"<label> Se quiere: " . $ren['tipo'] ."</label> <br>";
                                echo"<label class='desc'> Descripci&oacute;n: " . $ren['descripcion'] ."</label> <br>";
                                echo"<label> Precio: " . $ren['precio'] ."</label> <br>";
                                echo"<label> Telefono: " . $ren['telefono'] ."</label> <br>";
                            echo "</div>";
                        echo "</div>";
                        echo "<br>";
                    }
                }
            //Cierra la conexion
            mysqli_close($con);
        }
        ?>
        
    </script> 
    <script>
        $(document).ready(function(){
        $('.slider').bxSlider({
            mode: 'fade',
            slideWidth: 400,
            shrinkItems: true
           // adaptiveHeight: true
         });
        });
   </script>
</html>
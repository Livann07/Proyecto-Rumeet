<?php
session_start();
if(isset($_SESSION['usuario']))
    header("Location:http://localhost:80/Rumeet/inicio.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rumeet</title>
        <link rel="stylesheet" type="text/css" href="css/Registro.scss" />
        <meta name="descripcion" content="Buscador de compañeros para compartir casa y publicidad para renta y venta de casas" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" /> 
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap"/> 
    </head>
    <body>
    <img class="wave" src="img/wave.png" alt="Rumeet" class="logo">
    <img src="img/logo-texto-derecha.png" alt="Rummet" id="rumeet"/>
   
    <h3> Encuentra compa&ntilde;ero r&aacute;pido y sencillo</h3>
        <div id="margen">
        </div>
        <diV id="seccion-form">
            <h1> Registrarse</h1>
            <form action="verificar_registro.php" id="formulario" method="POST">
                <input type="text" placeholder="Nombre" name="nombre" id="nombre" class="datos" /> <br>
                <input type="text" placeholder="Primer Apellido" name="primer_apellido" id="primer-ap" class="datos" /> 
                <input type="text" placeholder="Segundo Apellido" name="seg_apellido" id="seg-ap" class="datos" /> <br>
                <input type="text" placeholder="Correo" name="correo"  class="datos" id="correo" /> <br>
                <input type="text" placeholder="Usuario" name="usuario" id="usuario" class="datos" /> <br>
                <input type="password" placeholder="Contrase&ntilde;a"  name="pass" id="pass" class="datos"/> 
                <input type="password" placeholder="Confirmar Contrase&ntilde;a" name="confirm-pass" id="confirm-pass" class="datos" /> <br>
            </form>
            <input type="submit" id="enviar" value="Enviar" class="btn_fondo_corredizo" />
        </diV>
        <div id="ayuda">
        </div>

        <script>
            document.getElementById("enviar").onclick = function (){
                hola();
            }
            function hola()
            {
                var nom = document.getElementById("nombre").value;
                var pri_ap = document.getElementById("primer-ap").value;
                var seg_ap = document.getElementById("seg-ap").value;
                var correo = document.getElementById("correo").value;
                var usua = document.getElementById("usuario").value;
                var pass = document.getElementById("pass").value;
                var pass_c = document.getElementById("confirm-pass").value;
                
                var nom2 = JSON.stringify(nom);
                nom2 = nom2.substring((nom2.indexOf('"')+1), nom2.length -1);

                var pri_ap2 = JSON.stringify(pri_ap);
                pri_ap2 = pri_ap2.substring((pri_ap2.indexOf('"')+1), pri_ap2.length -1);

                var seg_ap2  = JSON.stringify(seg_ap);
                seg_ap2  = seg_ap2.substring((seg_ap2.indexOf('"')+1), seg_ap2.length -1);

                var correo2 = JSON.stringify(correo);
                correo2 = correo2.substring((correo2.indexOf('"')+1), correo2.length -1);

                var usua2 = JSON.stringify(usua);
                usua2 = usua2.substring((usua2.indexOf('"')+1), usua2.length -1);

                var pass2 = JSON.stringify(pass);
                pass2 = pass2.substring((pass2.indexOf('"')+1), pass2.length -1);

                var pass_c2 = JSON.stringify(pass_c);
                pass_c2 = pass_c2.substring((pass_c2.indexOf('"')+1), pass_c2.length -1);


                if(nom2.length < 1 || pri_ap2.length < 1 || seg_ap2.length < 1 || correo2.length < 1 || usua2.length < 1 || pass2.length < 1 || pass_c2.length < 1) {
                    alert("no dejes campos vacios");
                }
                else if(pass !== pass_c){
                    alert("las contraseñas no coinciden");
                }
                else {
                    document.getElementById("formulario").submit();
                }
            }
       </script>
    </body> 
</html>
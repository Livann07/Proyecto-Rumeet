<?php // Autenticacion.php
session_start();
  // Llama al programa login.php quien contiene los datos de conexion
  require_once 'log.php';

  // Intenta conectarse a la BD
  $connection = new mysqli($hn, $un, $pw, $db);

  // Salida de error si no se pudo conectar a la BD
  if ($connection->connect_error) die("Fatal Error");

  // Verifica que PHP_AUTH_USER y PHP_AUTH_PH existan (provistos por el cuadro de dialogo)
  //if (isset($_POST['usuario']) &&
   //   isset($_POST['pass']))
  
    // Obtiene el nombre de usuario y password del cuadro de Dialogo $_SERVER['PHP_AUTH_USER'] 
    // Llama a la funcion mysql_entities_fix_string limpia cadena
    $un_temp = mysql_entities_fix_string($connection, $_POST['usuario']);
    $pw_temp = mysql_entities_fix_string($connection, $_POST['pass']);

    // Cera string de consulta SQL
    $query   = "SELECT * FROM users WHERE usuario='$un_temp'";

    //Lleva a cabo la consulta dejando la tabla resultado en la variable $result
    $result  = $connection->query($query);
    // Salida si no encontro resultados
    if (!$result) 
    {
      $_SESSION['mensaje'] = 'Los datos no existen';
      header("Location: http://localhost/Rumeet/login.php");
    }
    else if ($result->num_rows) //Obtiene los renglones de la tabla resultado
    {
       /*******************************************************************
        * $row = $result->fetch_array(MYSQLI_NUM):                        *
        *  Convierte el resultado en un arreglo tipo MYSQLI_NUM, ejemplo: *
        *            0            1                      2                * 
        *    0  |   Jose   |   Jose1234    |   acnmhj525632145511234 |    *
        *    1  |   Daniel |   Daniel234   |   jhgjhy25122hghjhg4321 |    *
        *******************************************************************/
        $row = $result->fetch_array(MYSQLI_NUM);

        //Cierra la consulta
        $result->close();

        //  Verifica que la contraseña coincide con el hash (Clave generada)
        // pw_temp: valor recibido del cuadro de dialogo
        // $row[3]: valor hash obtenido de la consulta SQL
        if (password_verify($pw_temp, $row[5]))
        {
          //echo htmlspecialchars("$row[0] $row[1] : !Hola: $row[0], Estas logueado como '$row[2]'");
          
          if(!isset($_SESSION['usuario']))
          {
             $_SESSION['usuario'] = $un_temp;
             $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
             setcookie('user', "$un_temp");
          }
          header("Location: http://localhost/Rumeet/inicio.php");
        } 
        else 
        {
          $_SESSION['mensaje'] = 'La contraseña no existe';
          header("Location: http://localhost/Rumeet/login.php");
        }
    }
    else 
    {
          $_SESSION['mensaje'] = 'El usuario no existe';
          header("Location: http://localhost/Rumeet/login.php");
    }
  
  /*else{
    //Entra a area restringida que muestra el cuadro de dialogo. 
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    //Si se dan los datos y se presiona Aceptar se corre nuevamente la pagina PHP

    //Si se cancelo el cuadro de Dialogo realiza las siguientes lineas
    header('HTTP/1.0 401 Unauthorized');
    die ("Presionaste cancelar po favor refresca la pagina e introduce tu usuario y contraseña");
  }*/

  //Cierra la conexion
  $connection->close();
  
  //Funcion que desinfecta la entrada
  function mysql_entities_fix_string($connection, $string)
  {
    // htmlentities:
    //   Si tiene valores como < o & se cambiaran por &lt o &amp, para no infiltrar caracteres de codigo en el cuadro de dialogo
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  //Funcion Cera la cadena correcta de coneccion de SQL
  function mysql_fix_string($connection, $string)
  {
    //get_magic_quotes_gpc() verifica el PHP.ini y devuelve 0 si magic_quotes_gpc esta desactivado
    // o activado para evitar problemas de seguridad inyectados
    if (get_magic_quotes_gpc()) 
       $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
?>

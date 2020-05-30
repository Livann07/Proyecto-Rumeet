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
   $usuario="";
   if(isset($_COOKIE['user'])){
    $usuario= $_COOKIE['user'];
   }
     // Llama a la funcion mysql_entities_fix_string limpia cadena
    $un_temp = mysql_entities_fix_string($connection, $usuario );
    // Cera string de consulta SQL
    $query   = "SELECT * FROM users WHERE usuario='$un_temp'";

    //Lleva a cabo la consulta dejando la tabla resultado en la variable $result
    $result  = $connection->query($query);
    // Salida si no encontro resultados
    if (!$result) 
    {
      echo 'Error al cargar los datos(1)';
      //header("Location: http://localhost/Rumeet/login.php");
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
      echo <<<EOT
            <h3>Informaci&oacute;n de la cuenta</h3>
              <label>Nombre&colon;</label> <input type='text' placeholder='Nombre' value='$row[0]' class='textbox' id='nombre' readonly="readonly" />
              <label>Primer Apellido&colon;</label> <input type='text' placeholder='Primer Apellido' value='$row[1]' class='textbox' id='primApell' readonly="readonly" />
              <label>Segundo Apellido&colon;</label><input type='text' placeholder='Segundo Apellido' value='$row[2]' class='textbox'  id='segApell' readonly="readonly"/> <br>
              <label>Usuario&colon;</label> <input type='text' placeholder='Usuario' value='$row[4]' class='textbox' id="usuario"  readonly="readonly"/><br>
              <label>Correo&colon;</label> <input type='text' placeholder='Correo' name='correo-antiguo'value='$row[3]' class='textbox' id='correo' readonly="readonly" /> <br>
              <label>Nuevo Correo&colon;</label> <input type='text' placeholder='Correo' name='correo' class='textbox' id='nuevoCorreo' />
              <input type='button'  value='Confirmar' id='confirmarCorreo' onClick='validarCorreo()' class='btnCambios'><br>
              <label>Contrase&ntilde;a&colon;</label> <input type='password' placeholder='Contrase&ntilde;a' value='unasdiezletras' class='textbox' id="contra"  readonly="readonly"/><br>
              <label>Nueva Contrase&ntilde;a&colon;</label> <input type='password' placeholder='Contrase&ntilde;a' name='pass' id='pass' class='textbox'/><br>
              <label>Confirmar Contrase&ntilde;a&colon;</label> <input type='password' placeholder='Confirmar Contrase&ntilde;a'name='confirm-pass' id='confirm-pass' class='textbox' />
              <input type='button' value='Confirmar' onClick='validarContra()' class='btnCambios'>
      EOT;
    }
    else 
    {
          echo 'Error al cargar los datos(2)';
          //header("Location: http://localhost/Rumeet/login.php");
    }
  
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
<?php // Autenticacion.php
session_start();
  // Llama al programa login.php quien contiene los datos de conexion
  require_once 'log.php';

  // Intenta conectarse a la BD
  $connection = new mysqli($hn, $un, $pw, $db);

  // Salida de error si no se pudo conectar a la BD
  if ($connection->connect_error) die("Fatal Error");

    // Cera string de consulta SQL
    $query   = "SELECT * FROM users";

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
       /********************Tabla de respuesta***************************/
        
        echo "<table role='table'>
        <colgroup span='3' width='10%'></colgroup>
        <thead role='rowgroup'>
        <tr>
            <th> <span> <b> Usuario </b> </span> </th>
            <th> <span> <b> Correo </span> </b> </th>   
        </tr>
        </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr role='row'>";
                echo "<td role='cell'>" . $row['usuario'] . "</td>";
                echo "<td role='cell'>" . $row['correo'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        //Cierra la consulta
        $result->close();

        //  Verifica que la contraseña coincide con el hash (Clave generada)
        // pw_temp: valor recibido del cuadro de dialogo
        // $row[3]: valor hash obtenido de la consulta SQL
        
    }
    else 
    {
          $_SESSION['mensaje'] = 'No hay usuarios';
          header("Location: http://localhost/Rumeet/login.php");
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
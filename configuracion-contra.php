<?php 
session_start();
  // Llama al archivo ligin.php donde estan los datos de conexion a la BD
  require_once 'log.php';

  // SIntenta conectarse a la BD
  $connection = new mysqli($hn, $un, $pw, $db);

  // Salida de error si no se pudo conectar a la BD
  if ($connection->connect_error) die("Fatal Error");

  //Salidad de error si no se pudo crear la Tabla
  /*if (!$result) {
  //die("Fatal Error No se pudo crear la tabla o ya existe");
  //header("Location: http://localhost/Rumeet/registro.html");
  }*/
  
  //Asigna datos al primer usuario
  $contra = $_POST['pass'];
  $confirmacion = $_POST['confirm-pass'];
  $usuario = $_COOKIE['user'];
  
  if($contra==$confirmacion){
    $hash = password_hash($contra, PASSWORD_DEFAULT);
  }else{
      echo "Las contraseñas no coinceden";
  }
  
  //Llama a la funcion que añade los datos a la tabla
  update_psw($connection, $usuario, $hash);

  //Asigna datos al segundo usuario
 /* $forename = 'Pauline';
  $surname  = 'Jones';
  $username = 'pjones';
  $password = 'acrobat';
  // Cera el pasword hash
  $hash     = password_hash($password, PASSWORD_DEFAULT);

  //Lama a la funcion que añade los datos a la tabla
  add_user($connection, $forename, $surname, $username, $hash); */

  /* *********************************************************
   *               FUNCION QUE AÑADE USUARIO A LA BD         *
   * *********************************************************/

  function update_psw($connection, $us, $co)
  {
    //Crea el string SQL de insertar
    if($connection){
        $stmt = $connection->prepare('UPDATE users SET passw=? WHERE usuario=?;');
        if($connection){
            /***********************************************  
            * Añade los parametros                      *
            *     bind_param( 'tipo', [valores, ...] )    *
            *       Tipos=  s: cadena                     *
            *               i: entero                     *
            *               d: doble                      *
            *               s: cadena                     *
            *                                             *
            *       ejemplo:                              *
            *           ssss= el 1er parametro es cadena, * 
            *                 el 2do parametro es cadena, *
            *                 el 3er parametro es cadena, *
            *                 el 4to parametro es cadena  *
            ***********************************************/
            $stmt->bind_param('ss', $co, $us);

            // Realiza la instruccion SQL de Update
            $stmt->execute();

            // Cierra SQL
            $stmt->close();
            echo "Contraseña modificado exitosamente \nSe cerrara la sesion";
        }else{
            echo "Error al modificar la contraseña (2)";
        }
    }else{
        echo "Error al modificar la contraseña (1)";
    }
  }
?>

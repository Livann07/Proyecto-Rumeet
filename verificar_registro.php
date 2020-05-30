<?php 
session_start();
  // Llama al archivo ligin.php donde estan los datos de conexion a la BD
  require_once 'log.php';

  // SIntenta conectarse a la BD
  $connection = new mysqli($hn, $un, $pw, $db);

  // Salida de error si no se pudo conectar a la BD
  if ($connection->connect_error) die("Fatal Error");

  //String SQL para crea la tabla users
  $query = "CREATE TABLE users (
    nombre VARCHAR(32) NOT NULL,
    primer_ap  VARCHAR(32) NOT NULL,
    segundo_ap VARCHAR(32) NOT NULL,
    correo  VARCHAR(50) NOT NULL,
    usuario  VARCHAR(32) NOT NULL UNIQUE,
    passw VARCHAR(255) NOT NULL
  )";

  // Realiza la creacion de la Tabla  
  $result = $connection->query($query);

  //Salidad de error si no se pudo crear la Tabla
  /*if (!$result) {
  //die("Fatal Error No se pudo crear la tabla o ya existe");
  //header("Location: http://localhost/Rumeet/registro.html");
  }*/
  
  //Asigna datos al primer usuario
  $nom = $_POST['nombre'];
  $priAp  = $_POST['primer_apellido'];
  $segAp = $_POST['seg_apellido'];
  $correo = $_POST['correo'];
  $usuario = $_POST['usuario'];
  $password = $_POST['pass'];
  // Cera el pasword hash
  $hash     = password_hash($password, PASSWORD_DEFAULT);
  
  //Llama a la funcion que añade los datos a la tabla
  add_user($connection, $nom, $priAp, $segAp, $correo, $usuario, $hash);

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

  function add_user($connection, $no, $pAp, $sAp, $co, $usu, $pas)
  {
    //Crea el string SQL de insertar
    $stmt = $connection->prepare('INSERT INTO users VALUES(?,?,?,?,?,?)');

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
    $stmt->bind_param('ssssss', $no, $pAp, $sAp, $co, $usu, $pas);

    // Realiza la instruccion SQL de Insert
    $stmt->execute();

    // Cierra SQL
    $stmt->close();

    header("Location: http://localhost/Rumeet/login.php");
  }
?>

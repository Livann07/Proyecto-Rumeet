<?php
    session_start();
    $cadena = "";
    $n = 1;
    // Llama al archivo ligin.php donde estan los datos de conexion a la BD
    require_once 'log.php';
  
    // SIntenta conectarse a la BD
    $connection = new mysqli($hn, $un, $pw, $db);
  
    // Salida de error si no se pudo conectar a la BD
    if ($connection->connect_error) die("Fatal Error");
  
    //String SQL para crea la tabla casas
    $query = "CREATE TABLE casas (
      id INT NOT NULL AUTO_INCREMENT,
      titulo VARCHAR(200) NOT NULL,
      tipo  VARCHAR(20) NOT NULL,
      descripcion VARCHAR(1500) NOT NULL,
      precio  VARCHAR(32) NOT NULL,
      telefono  VARCHAR(12) NOT NULL,
      nom_archivos VARCHAR(5000) NOT NULL,
      PRIMARY KEY (id)
    )";
  
    // Realiza la creacion de la Tabla  
    $result = $connection->query($query);

    // Prepara  la consulta SQL
    $sql="SELECT * FROM casas";   
    
    // Realiza la consulta
    $result = mysqli_query($connection,$sql);
    if($result){
        while($ren = mysqli_fetch_array($result)) {       
         $n = $ren['id'] + 1;
      }
    }

    //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
    foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
      //Validamos que el archivo exista
      if($_FILES["archivo"]["name"][$key]) {
        $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
        $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
              
              
        $directorio = 'archivos_subidos/' . $n . "/"; //Declaramos un  variable con la ruta donde guardaremos los archivos
        
        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if(!file_exists($directorio)){
          mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
        }
        
        $dir=opendir($directorio); //Abrimos el directorio de destino
        $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
        $cadena = $cadena . $filename . "|";
        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if(move_uploaded_file($source, $target_path)) {	
          echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
          } else {	
          echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
        closedir($dir); //Cerramos el directorio de destino
          }
          
    }
    
    
    //Asigna datos al primer usuario
    $tit = $_POST['titulo'];
    $tipo  = $_POST['tipo'];
    $desc = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $tel = $_POST['telefono'];
    $numb = 0;
    
    //Llama a la funcion que añade los datos a la tabla
    add_user($connection, $numb, $tit, $tipo, $desc, $precio, $tel, $cadena);
  
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
  
    function add_user($connection, $num, $tit, $tipo, $desc, $precio, $telef, $cad)
    {
      //Crea el string SQL de insertar
      $stmt = $connection->prepare('INSERT INTO casas VALUES(?,?,?,?,?,?,?)');
  
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
      $stmt->bind_param('issssss', $num, $tit, $tipo, $desc, $precio, $telef, $cad);
  
      // Realiza la instruccion SQL de Insert
      $stmt->execute();
  
      // Cierra SQL
      $stmt->close();
  
      header("Location: http://localhost/Rumeet/inicio.php");
    }

?>
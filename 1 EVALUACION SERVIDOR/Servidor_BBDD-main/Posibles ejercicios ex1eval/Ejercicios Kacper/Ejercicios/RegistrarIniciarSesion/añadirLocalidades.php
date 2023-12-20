<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicio</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header><h1>REPASO 1 EVALUACION</h1></header>

    <section>
        <nav></nav>
        <main>
            <?php
                  // Configuración de la conexión a la base de datos
                  $servername = "localhost";
                  $username = "victor"; // Reemplaza con tu nombre de usuario
                  $password = "arcos"; // Reemplaza con tu contraseña
                  $dbname = "geografia";

                  // Crear conexión
                  $conn = new mysqli($servername, $username, $password, $dbname);

                  // Verificar la conexión
                  if ($conn->connect_error) {
                      die("Conexión fallida: " . $conn->connect_error);
                  }


                    /*---------------------------------------------------------------------------*/

                if ($_REQUEST) {
                    $nombre = $_GET["nomLocalidad"];
                    $poblacion = $_GET["pobLocalidad"];
                    $provincia = $_GET["numProvincia"];

                    $consultaidLocalidad = "SELECT id_localidad from localidades ORDER BY id_localidad desc limit 1" ;
                    $resultConsultaidLocalidad = mysqli_query ($conn,$consultaidLocalidad)
                    or die ("Fallo en la consulta");
                    $idLocalidad = mysqli_fetch_assoc($resultConsultaidLocalidad);
                    $codInsertar = ($idLocalidad['id_localidad']) +1;
                    print ("Se procede a la insercion de una nueva localidad con código ".$codInsertar . "<br>");
                    print ("Sentencia de inserción: ". "INSERT INTO localidades VALUES ($codInsertar,'$nombre','$poblacion','$provincia')" . "<br>");
                    print ("Insertado correctamente");
                    print ("<a href='añadirLocalidades.php'>Vuelve al fromulario</a>");


                    $consultaAnadir = "INSERT INTO localidades VALUES ($codInsertar,'$nombre','$poblacion','$provincia')" ;
                    $resultConsultaCodEmpleado = mysqli_query ($conn,$consultaAnadir)
                    or die ("Fallo en la consulta");
                } else {
            ?>
            <a href="inicio.php">Inicio</a>
            <div id="login">
            <h2>AÑADIR UNA LOCALIDAD</h2>
            <form method="get" action="añadirLocalidades.php">
              <label for="nombre">Nombre localidad:</label>
              <input type="text" name="nomLocalidad" id=""><br>

              <label for="poblacion">Numero de poblacion:</label>
              <input type="text" name="pobLocalidad" id=""><br>

              <label for="provincia">Selecciona la provincia:</label>
              <select name="numProvincia">
                    <?php
                         $consultaProvincia = "SELECT n_provincia, nombre from provincias" ;
                         $resultConsultaProvincia = mysqli_query ($conn,$consultaProvincia)
                         or die ("Fallo en la consulta");

                         $nfilasConsultProvincia = mysqli_num_rows ($resultConsultaProvincia);
                         for ($i=0; $i<$nfilasConsultProvincia; $i++)
                          {
                           $resultadoConsultaProvincia = mysqli_fetch_array ($resultConsultaProvincia);
                           $numero = $resultadoConsultaProvincia['n_provincia'] ;
                           $nombre = $resultadoConsultaProvincia['nombre'] ;
                           print ("<option value=". $resultadoConsultaProvincia['n_provincia'] .">".$nombre. "</option>");
                          }

                          mysqli_close($conn);
                        ?>
                        </select><br>

              <input type="submit" value="Conectar">
            </form>
            </div>

           <?php
           }

        ?>
        </main>
        <aside></aside>
    </section>

    <footer></footer>
</body>
</html>
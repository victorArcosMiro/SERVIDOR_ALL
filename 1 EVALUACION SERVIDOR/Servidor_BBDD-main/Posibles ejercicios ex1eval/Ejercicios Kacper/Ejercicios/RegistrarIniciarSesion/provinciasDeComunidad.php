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
        <a href="inicio.php">Inicio</a>
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
                    $numComunidad = $_GET["numComunidad"];

                    $instruccion = "SELECT provincias.n_provincia, provincias.nombre as nomProvincia ,provincias.superficie, localidades.nombre as nomLocalidad, comunidades.nombre as nomComunidad
                    FROM provincias
                    INNER JOIN localidades ON provincias.id_capital = localidades.id_localidad
                    INNER JOIN comunidades ON provincias.id_comunidad = comunidades.id_comunidad
                    WHERE comunidades.id_comunidad = $numComunidad";

                $resulconsulta = mysqli_query ($conn,$instruccion)
                    or die ("Fallo en la consulta");

                 // Mostrar resultados de la consulta
                 $nfilas = mysqli_num_rows ($resulconsulta);
                 if ($nfilas > 0)
                 {
                    print ("<table class='tablabd'>");
                    print ("<tr>");
                    print ("<th>NUMERO PROVINCIA</th>");
                    print ("<th>NOMBRE PROVINCIA</th>");
                    print ("<th>SUPERFICIE PROVINCIA</th>");
                    print ("<th>NOMBRE CAPITAL</th>");
                    print ("<th>NOMBRE COMUNIDAD</th>");
                    print ("</tr>");

                    for ($i=0; $i<$nfilas; $i++)
                    {
                       $resultado = mysqli_fetch_array ($resulconsulta);
                       print ("<tr>");
                       print ("<td>" . $resultado['n_provincia'] . "</td>");
                       print ("<td>" . $resultado['nomProvincia'] . "</td>");
                       print ("<td>" . $resultado['superficie'] . "</td>");
                       print ("<td>" . $resultado['nomLocalidad'] . "</td>");
                       print ("<td>" . $resultado['nomComunidad'] . "</td>");
                       print ("</tr>");
                    }

                    print ("</table>");
                 }
                 else
                    print ("No hay comunidades");


                    mysqli_close($conn);
                } else {
            ?>
            <div id="login">
            <h2>VER PROVINCIAS POR COMUNIDADES</h2>
            <form method="get" action="provinciasDeComunidad.php">
              <label for="provincia">Selecciona la Comunidad:</label>
              <select name="numComunidad">
                    <?php
                         $consultaComunidad = "SELECT id_comunidad, nombre from comunidades" ;
                         $resultConsultaComunidad = mysqli_query ($conn,$consultaComunidad)
                         or die ("Fallo en la consulta");

                         $nfilasConsultComunidad = mysqli_num_rows ($resultConsultaComunidad);
                         for ($i=0; $i<$nfilasConsultComunidad; $i++)
                          {
                           $resultadoConsultaComunidad = mysqli_fetch_array ($resultConsultaComunidad);
                           $numero = $resultadoConsultaComunidad['id_comunidad'] ;
                           $nombre = $resultadoConsultaComunidad['nombre'] ;
                           print ("<option value=". $resultadoConsultaComunidad['id_comunidad'] .">".$nombre. "</option>");
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
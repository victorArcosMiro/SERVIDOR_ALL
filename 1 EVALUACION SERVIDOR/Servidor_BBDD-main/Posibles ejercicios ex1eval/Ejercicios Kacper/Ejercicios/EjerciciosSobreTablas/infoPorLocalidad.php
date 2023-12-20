<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de informacion sobre localidades</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header><h1>INFORMACION SOBRE LOCALIDADES</h1></header>

    <section>
        <nav></nav>
        <main>
            <a href="../../portada.php">Inicio</a>
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
           /*----------------------------------------------------*/
           if ($_REQUEST){
            $nombreLocalidad = $_GET["nombre"];
           if($conn){
               //acciones Conexion correcta
            }
            else{
                 echo "Error: conexión no realizada, respuesta del servidor: ".
                 mysqli_error($conn)."Nº de error: ".mysqli_errno($conn);
             }

            /*---------------------------------------------------------------------------*/
            $instruccion = "SELECT localidades.id_localidad, localidades.nombre AS nom_localidad, localidades.poblacion,provincias.nombre AS nom_provincia, comunidades.nombre AS nom_comunidad
                            FROM localidades
                            INNER JOIN provincias ON localidades.n_provincia = provincias.n_provincia
                            INNER JOIN comunidades ON provincias.id_comunidad = comunidades.id_comunidad
                            WHERE localidades.nombre = '$nombreLocalidad'";

            $resulconsulta = mysqli_query ($conn,$instruccion)
                or die ("Fallo en la consulta");

             // Mostrar resultados de la consulta
             $nfilas = mysqli_num_rows ($resulconsulta);
             if ($nfilas > 0)
             {
                print ("<table class='tablabd'>");
                print ("<tr>");
                print ("<th>ID LOCALIDAD</th>");
                print ("<th>NOMBRE LOCALIDAD</th>");
                print ("<th>POBLACION LOCALIDAD</th>");
                print ("<th>NOMBRE PROVINCIA</th>");
                print ("<th>NOMBRE COMUNIDAD</th>");
                print ("</tr>");

                for ($i=0; $i<$nfilas; $i++)
                {
                   $resultado = mysqli_fetch_array ($resulconsulta);
                   print ("<tr>");
                   print ("<td>" . $resultado['id_localidad'] . "</td>");
                   print ("<td>" . $resultado['nom_localidad'] . "</td>");
                   print ("<td>" . $resultado['poblacion'] . "</td>");
                   print ("<td>" . $resultado['nom_provincia'] . "</td>");
                   print ("<td>" . $resultado['nom_comunidad'] . "</td>");
                   print ("</tr>");
                }

                print ("</table>");
             }
             else
                print ("No hay comunidades");


                mysqli_close($conn);
            } else{
           ?>

            <h2>Consulta la poblacion por nombre</h2>
                <form action="infoPorLocalidad.php" method="get">
                    <label for="gama">Introduce el nombre de la localidad</label>
                    <input type="text" name="nombre" id="">
                    <br><br>
                    <input type="submit" value="Enviar consulta">
                </from>
        <?php
        }
        ?>
        </main>
        <aside></aside>
    </section>

    <footer></footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de provincia</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header><h1>CANTIDAD DE POBLACION POR PROVINCIAS</h1></header>

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

            /*---------------------------------------------------------------------------*/
            $instruccion = "SELECT provincias.nombre, SUM(localidades.poblacion) AS total_poblacion
                            FROM localidades
                            INNER JOIN provincias ON localidades.n_provincia = provincias.n_provincia
                            GROUP BY provincias.n_provincia";

            $resulconsulta = mysqli_query ($conn,$instruccion)
                or die ("Fallo en la consulta");

             // Mostrar resultados de la consulta
             $nfilas = mysqli_num_rows ($resulconsulta);
             if ($nfilas > 0)
             {
                print ("<table class='tablabd'>");
                print ("<tr>");
                print ("<th>NOMBRE PROVINCIA</th>");
                print ("<th>POBLACION TOTAL</th>");
                print ("</tr>");

                for ($i=0; $i<$nfilas; $i++)
                {
                   $resultado = mysqli_fetch_array ($resulconsulta);
                   print ("<tr>");
                   print ("<td>" . $resultado['nombre'] . "</td>");
                   print ("<td>" . $resultado['total_poblacion'] . "</td>");
                   print ("</tr>");
                }

                print ("</table>");
             }
             else
                print ("No hay comunidades");


                mysqli_close($conn);
           ?>
        </main>
        <aside></aside>
    </section>

    <footer></footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de comunidades</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header><h1>TABLA DE LOCALIDADES</h1></header>

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
            $instruccion = "SELECT id_localidad,nombre, poblacion, n_provincia from localidades";
            $resulconsulta = mysqli_query ($conn,$instruccion)
                or die ("Fallo en la consulta");

             // Mostrar resultados de la consulta
             $nfilas = mysqli_num_rows ($resulconsulta);
             if ($nfilas > 0)
             {
                print ("<table class='tablabd'>");
                print ("<tr>");
                print ("<th>ID</th>");
                print ("<th>NOMBRE</th>");
                print ("<th>POBLACION</th>");
                print ("<th>NUMERO DE PROVINCIAS</th>");
                print ("</tr>");

                for ($i=0; $i<$nfilas; $i++)
                {
                   $resultado = mysqli_fetch_array ($resulconsulta);
                   print ("<tr>");
                   print ("<td>" . $resultado['id_localidad'] . "</td>");
                   print ("<td>" . $resultado['nombre'] . "</td>");
                   print ("<td>" . $resultado['poblacion'] . "</td>");
                   print ("<td>" . $resultado['n_provincia'] . "</td>");
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
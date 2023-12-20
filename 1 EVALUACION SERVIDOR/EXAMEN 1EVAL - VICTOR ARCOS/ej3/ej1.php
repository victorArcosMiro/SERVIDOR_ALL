<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table{
            border: solid 1px black;
            border-collapse: collapse;
            font-size: 20px;
        }
        table th{
            background-color: lightblue;
        }
        td th{
            padding: 20px;
        }
    </style>
</head>
<body>
<header>
        <h1>EXAMEN 1ª EVALUACIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <h1 style="color: red;">EJERCICIO 3</h1>
        <h2>Geografia española</h2>
        <p>Esta aplicacion muestra las capitales de las Comunidades Autónomas y el numero dtotal de localidades por provincia en España.</p>
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
        if(isset($_POST['capitales']) || isset($_POST['localidades'])){
            ?>
            <p>Consulta sobre la base de datos <em>"geografia".</em></p>
            <?php
            if(isset($_POST['capitales'])){
                echo "<h2>Capitales por Comunidad Autónoma</h2>";
            // Consulta SQL
            $sql = "SELECT comunidades.*, localidades.nombre AS capital_nombre
            FROM comunidades
            JOIN localidades ON comunidades.id_capital = localidades.id_localidad";

            // Ejecutar la consulta
            $result = $conn->query($sql);

            // Verificar si se obtuvieron resultados
            if ($result->num_rows > 0) {
            // Imprimir los datos
            echo "<table border='1'>";
            echo "<tr><th>Comunidad Autónoma</th><th>Capital</th></tr>";

            while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["capital_nombre"] . "</td>";
            echo "</tr>";
            }

            echo "</table>";
            } else {
            echo "0 resultados encontrados";
            }

            }
            if(isset($_POST['localidades'])){
                echo "<h2>Número de localidades por Provincia</h2>";
                $instruccion = "SELECT localidades.id_localidad, localidades.nombre AS nom_localidad, localidades.poblacion,provincias.nombre AS nom_provincia, comunidades.nombre AS nom_comunidad
                FROM localidades
                INNER JOIN provincias ON localidades.n_provincia = provincias.n_provincia
                INNER JOIN comunidades ON provincias.id_comunidad = comunidades.id_comunidad";
                $numeroLocalidades = 0;
                $resulconsulta = mysqli_query ($conn,$instruccion)
                    or die ("Fallo en la consulta");

                // Mostrar resultados de la consulta
                $nfilas = mysqli_num_rows ($resulconsulta);
                if ($nfilas > 0)
                {
                    print ("<table border='1'>");
                    print ("<tr>");
                    print ("<th>NOMBRE PROVINCIA</th>");
                    print ("<th>Nº LOCALIDAD</th>");
                    print ("</tr>");

                    for ($i=0; $i<$nfilas; $i++)
                    {
                    $resultado = mysqli_fetch_array ($resulconsulta);
                    print ("<tr>");
                    print ("<td>" . $resultado['nom_provincia'] . "</td>");
                    print ("<td style=visibility:hidden;>" . $resultado['nom_localidad'] . "</td>");
                    print ("</tr>");
                    }

                    print ("</table>");
                }
                else{
    print "No hay comunidades";
}
                            }
        }else{
    ?>
        <form action="ej1.php" method="post">
            <input type="submit" value="Capitales de Autonomias" name="capitales">
            <input type="submit" value="Localidades por Provincia" name="localidades">
        </form>
        <?php
}
        ?>
        </main style="visi">
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
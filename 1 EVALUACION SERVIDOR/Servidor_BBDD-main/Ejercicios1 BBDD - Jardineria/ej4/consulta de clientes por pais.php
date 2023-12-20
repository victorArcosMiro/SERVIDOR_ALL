<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA DE CLIENTE POR PAIS</title>
    <link rel="stylesheet" href="../ej1/style.css">

</head>
<body>
    <header>
        <h1>CONSULTA DE CLIENTE POR PAIS</h1>
    </header>
    <section>
        <nav></nav>
        <main>

        <?php
if (isset($_GET["opciones"])) {
    $opcionSeleccionada = $_GET["opciones"];
    $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria");
    if($connection) {
        mysqli_select_db($connection, "jardineria")
            or die("No se puede seleccionar la base de datos jardineria");

        //sentencia sql
        $consultaProductos = "SELECT CodigoCliente, NombreCliente, NombreContacto, ApellidoContacto from clientes WHERE pais = \"$opcionSeleccionada\"";
        $resultadoConsulta = mysqli_query($connection, $consultaProductos) or die("Fallo en la consulta de clientes");

        $nfilas = mysqli_num_rows($resultadoConsulta);
        if($nfilas > 0) {
            print ("<p style='color:blue';>LISTADO DE CLIENRTES DE --". $opcionSeleccionada . "-- EN BASE DE DATOS JARDINERIA</p>");
            print("<table border='1'>");
            print("<tr>");
            print("<th>Código de Cliente</th>");
            print("<th>Nombre</th>");
            print("<th>Nombre de contacto</th>");
            print("<th>Apellido de contacto</th>");

            print("</tr>");
            for($i=0; $i<$nfilas; $i++) {
                $resultado = mysqli_fetch_array($resultadoConsulta);
                print("<tr>");
                print("<td>" . $resultado['CodigoCliente'] . "</td> ");
                print("<td>" . $resultado['NombreCliente'] . "</td> ");
                print("<td>" . $resultado['NombreContacto'] . "</td> ");
                print("<td>" . $resultado['ApellidoContacto'] . "</td> ");
                print("</tr>");
            }
            print("</table>");

        } else {
            print("<p style='color:blue';>Actualmente nos hay clientes de este pais.</p>");
        }
            print ("<br><a href='consulta de clientes por pais.php'>Realizar nueva consulta</a>");
        mysqli_close($connection);//Cierre de conexion
    } else {
        print "Error: conexión no realizada, respuesta del servidor: ".
        mysqli_error($conexion)."Nº de error: ".mysqli_errno($conexion);
    }
}else{
    print '
    <h2>Consulta de clientes por pais</h2>
    <form action="consulta de clientes por pais.php" method="get">
    <label for="gama">Elige un pais</label>
    <select id="opciones" name="opciones">
        <option value="USA">USA</option>
        <option value="Spain">Spain</option>
        <option value="España">España</option>
        <option value="France">France</option>
        <option value="Australia">Australia</option>
        <option value="United Kingdom">United Kingdom</option>
    </select>
    <input type="submit" value="Comprobar">
    </form>
    ';
}
    ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
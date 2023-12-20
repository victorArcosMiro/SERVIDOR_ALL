<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA DE PRODUCTOS</title>
    <link rel="stylesheet" href="../ej1/style.css">

</head>
<body>
    <header>
        <h1>CONSULTA DE PRODUCTOS</h1>
    </header>
    <section>
        <nav></nav>
        <main>

        <?php
if (isset($_GET["opciones"])) {
    $opcionSeleccionada = $_GET["opciones"];
    $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria");
    $fechaActual = date("d-m-Y");
    if($connection) {
        mysqli_select_db($connection, "jardineria")
            or die("No se puede seleccionar la base de datos jardineria");

        //sentencia sql
        $consultaProductos = "SELECT CodigoProducto, Nombre, CantidadEnStock FROM productos WHERE gama = \"$opcionSeleccionada\"";
        $resultadoConsulta = mysqli_query($connection, $consultaProductos) or die("Fallo en la consulta de clientes");

        $nfilas = mysqli_num_rows($resultadoConsulta);
        if($nfilas > 0) {
            print("<p style='color:blue';>Productos de la gama ". $opcionSeleccionada . " - Fecha: " . $fechaActual ."</p>");
            print("<table border='1'>");
            print("<tr>");
            print("<th>Codigo de Producto</th>");
            print("<th>Nombre</th>");
            print("<th>Cantidad en sto</th>");
            print("</tr>");
            for($i=0; $i<$nfilas; $i++) {
                $resultado = mysqli_fetch_array($resultadoConsulta);
                print("<tr>");
                print("<td>" . $resultado['CodigoProducto'] . "</td> ");
                print("<td>" . $resultado['Nombre'] . "</td> ");
                print("<td>" . $resultado['CantidadEnStock'] . "</td> ");
                print("</tr>");
            }
            print("</table>");

        } else {
            print("<p style='color:blue';>Actualmente nos hay productos de esta gama.</p>");
        }
            print ("<br><a href='consulta producto.php'>Realizar nueva consulta</a>");
        mysqli_close($connection);//Cierre de conexion
    } else {
        print "Error: conexión no realizada, respuesta del servidor: ".
        mysqli_error($conexion)."Nº de error: ".mysqli_errno($conexion);
    }
}else{
    print '
    <h2>Consulta de productos por gama</h2>
    <form action="consulta producto.php" method="get">
    <label for="gama">Elige una de las gamas de productos disponibles</label>
    <select id="opciones" name="opciones">
            <option value="Aromaticas">Aromáticas</option>
            <option value="Frutales">Frutales</option>
            <option value="Herbaceas">Herbaceas</option>
            <option value="Herramientas">Herramientas</option>
            <option value="Ornamentales">Ornamentales</option>
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
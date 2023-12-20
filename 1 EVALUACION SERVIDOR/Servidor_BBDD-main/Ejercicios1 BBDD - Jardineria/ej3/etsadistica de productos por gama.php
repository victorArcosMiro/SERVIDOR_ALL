<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESTADISTICA DE PRODUCTOS POR GAMA</title>
    <link rel="stylesheet" href="../ej1/style.css">

</head>
<body>
    <header>
        <h1>ESTADISTICA DE PRODUCTOS POR GAMA</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <?php
    $connection = mysqli_connect("localhost","jardinero", "jardinero","jardineria");
    if($connection) {
        mysqli_select_db($connection,"jardineria")
            or die ("No se puede seleccionar la base de datos bdprueba");

        //sentencia sql
    $constulaProductosGama ="SELECT GP.Gama, GP.DescripcionTexto, COUNT(P.CodigoProducto) AS NumeroTotalProductos
                            FROM GamasProductos GP
                            LEFT JOIN Productos P ON GP.Gama = P.Gama
                            GROUP BY GP.Gama, GP.DescripcionTexto
                            HAVING COUNT(P.CodigoProducto) > 0;
        ";
        $resultadoConsulta = mysqli_query($connection, $constulaProductosGama) or die ("Fallo en la consulta de clientes");

        $nfilas = mysqli_num_rows($resultadoConsulta);
        if($nfilas > 0){
            print ("<table border='1'>");
                print ("<tr>");
                    print ("<th>Gama</th>");
                    print ("<th>Descripción</th>");
                    print ("<th>Nº de productos</th>");
                print ("</tr>");
            for($i=0; $i<$nfilas; $i++){
                $resultado = mysqli_fetch_array($resultadoConsulta);
                print ("<tr>");
                    print ("<td>" . $resultado['Gama'] . "</td> ");
                    print ("<td>" . $resultado['DescripcionTexto'] . "</td> ");
                    print ("<td>" . $resultado['NumeroTotalProductos'] . "</td> ");
                print ("</tr>");
            }
            print ("</table>");
        }else{
            print ("No hay datos disponibles.");
        }
        mysqli_close($connection);//Cierre de conexion
        }else{
            print "Error: conexión no realizada, respuesta del servidor: ".
            mysqli_error($conexion)."Nº de error: ".mysqli_errno($conexion); }
    ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
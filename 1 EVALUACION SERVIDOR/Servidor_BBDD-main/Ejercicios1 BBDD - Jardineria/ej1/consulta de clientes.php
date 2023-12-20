<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA DE CLIENTES</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <h1>CONSULTA DE CLIENTES</h1>
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
        $consultaClientes = "SELECT CodigoCliente, NombreCliente, NombreContacto, Telefono FROM clientes";

        //Ejecucion de consulta
        $resultadoConsulta = mysqli_query($connection, $consultaClientes) or die ("Fallo en la consulta de clientes");

        //NUmero de ROWS de la consulta
        $nfilas = mysqli_num_rows($resultadoConsulta);
        if($nfilas > 0){
            print ("<table border='1'>");
                print ("<tr>");
                    print ("<th>Codigo de Cliente</th>");
                    print ("<th>Nombre del Cliente</th>");
                    print ("<th>Nombre de Contacto</th>");
                    print ("<th>Telefono</th>");
                print ("</tr>");
            for($i=0; $i<$nfilas; $i++){
                //Introduccion de consulta en ARRAY
                $resultado = mysqli_fetch_array($resultadoConsulta);
                print ("<tr>");
                    print ("<td>" . $resultado['CodigoCliente'] . "</td> ");
                    print ("<td>" . $resultado['NombreCliente'] . "</td> ");
                    print ("<td>" . $resultado['NombreContacto'] . "</td> ");
                    print ("<td>" . $resultado['Telefono'] . "</td> ");
                print ("</tr>");
            }
            print ("</table>");
        }else{
            print ("No hay datos disponibles.");
        }
        mysqli_close($connection);//Cierre de conexion
        }else{
            print "Error: conexión no realizada, respuesta del servidor: ".
            mysqli_error($conexion)."Nº de error: " . mysqli_errno($conexion); }
    ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>

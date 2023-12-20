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
         $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria");
        // Consulta SQL para obtener la lista de empleados

        $sql = "SELECT CodigoEmpleado, Nombre, Apellido1 FROM Empleados";
        $result = mysqli_query($connection, $sql) or die("Consulta fallida");

if (isset($_GET["enviar"])) {

        $nombreCliente = $_GET['nombreCliente'];
        $nombreContacto = $_GET['nombreContacto'];
        $apellidoContacto = $_GET['apellidoContacto'];
        $telefono = $_GET['telefono'];
        $fax = $_GET['fax'];
        $lineaDireccion1 = $_GET['lineaDireccion1'];
        $lineaDireccion2 = $_GET['lineaDireccion2'];
        $ciudad = $_GET['ciudad'];
        $region = $_GET['region'];
        $pais = $_GET['pais'];
        $codigoPostal = $_GET['codigoPostal'];
        $limiteCredito = $_GET['limiteCredito'];
        $codigoEmpleado = $_GET['codigoEmpleadoRepVentas'];
    if($connection) {
        mysqli_select_db($connection, "jardineria")
        or die("No se puede seleccionar la base de datos jardineria");

        $maxCodeQuery = "SELECT MAX(CodigoCliente) FROM Clientes";
        $maxCodeRow = mysqli_fetch_array(mysqli_query($connection, $maxCodeQuery));
        $maxCodigoCliente = $maxCodeRow[0];

        $maxCodigoCliente++;

        $InserccionDeCliente = "INSERT INTO Clientes VALUES ($maxCodigoCliente, '$nombreCliente', '$nombreContacto', '$apellidoContacto', '$telefono', '$fax', '$lineaDireccion1', '$lineaDireccion2', '$ciudad', '$region', '$pais', '$codigoPostal', $codigoEmpleado, $limiteCredito)";


        if(mysqli_query($connection, $InserccionDeCliente)){
            print("Insercion exitosa");
        }else{
           echo "Error: " . $InserccionDeCliente . "<br>" . mysqli_error($connection);
        }
        print ("<br><a href='insertar cliente.php'>Realizar nueva inserción</a>");
        mysqli_close($connection);//Cierre de conexion
    } else {
        print "Error: conexión no realizada, respuesta del servidor: ".
        mysqli_error($conexion)."Nº de error: ".mysqli_errno($conexion);
    }
}else{
    ?>
    <h2>Formulario para insertar nuevo cliente</h2>
    <form action="insertar cliente.php" method="get">
    <table>
    <tr>
        <td><label for="nombreCliente">Nombre Cliente:</label></td>
        <td><input type="text" id="nombreCliente" name="nombreCliente" required></td>
    </tr>
    <tr>
        <td><label for="nombreContacto">Nombre de Contacto:</label></td>
        <td><input type="text" id="nombreContacto" name="nombreContacto" required></td>
    </tr>
    <tr>
        <td><label for="apellidoContacto">Apellido de Contacto:</label></td>
        <td><input type="text" id="apellidoContacto" name="apellidoContacto" required></td>
    </tr>
    <tr>
        <td><label for="telefono">Teléfono:</label></td>
        <td><input type="number" id="telefono" name="telefono" required></td>
    </tr>
    <tr>
        <td><label for="fax">Fax:</label></td>
        <td><input type="number" id="fax" name="fax" required></td>
    </tr>
    <tr>
        <td><label for="lineaDireccion1">Dirección 1:</label></td>
        <td><input type="text" id="lineaDireccion1" name="lineaDireccion1" required></td>
    </tr>
    <tr>
        <td><label for="lineaDireccion2">Dirección 2:</label></td>
        <td><input type="text" id="lineaDireccion2" name="lineaDireccion2"></td>
    </tr>
    <tr>
        <td><label for="ciudad">Ciudad:</label></td>
        <td><input type="text" id="ciudad" name="ciudad" required></td>
    </tr>
    <tr>
        <td><label for="region">Región:</label></td>
        <td><input type="text" id="region" name="region"></td>
    </tr>
    <tr>
        <td><label for="pais">País:</label></td>
        <td><input type="text" id="pais" name="pais" required></td>
    </tr>
    <tr>
        <td><label for="codigoPostal">Código Postal:</label></td>
        <td><input type="number" id="codigoPostal" name="codigoPostal" required></td>
    </tr>
    <tr>
        <td><label for="limiteCredito">Límite de Crédito:</label></td>
        <td><input type="number" id="limiteCredito" name="limiteCredito" required></td>
    </tr>
    <tr>
        <td><label for="codigoEmpleadoRepVentas">Código Empleado:</label></td>
        <td>
            <select id="codigoEmpleadoRepVentas" name="codigoEmpleadoRepVentas" required>
                <?php
                 if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="' . $row["CodigoEmpleado"] . '">' . $row["CodigoEmpleado"]. " - " . $row["Nombre"] . " " . $row["Apellido1"] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay empleados disponibles</option>';
                }
                ?>
            </select>
        </td>
    </tr>
    </table>
    <br>
    <input type="submit" value="Introducir nuevo cliente" name="enviar">
    <input type="reset" value="Borrar datos">
    </form>

    <?php
}
    ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
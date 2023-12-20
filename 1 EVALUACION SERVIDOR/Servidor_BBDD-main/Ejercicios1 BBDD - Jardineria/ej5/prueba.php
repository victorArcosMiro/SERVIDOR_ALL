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
            $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria");
            $opcionSeleccionada = $_GET['opciones'];

            if ($connection) {
                mysqli_select_db($connection, "jardineria")
                    or die("No se puede seleccionar la base de datos jardineria");

                // Sentencia SQL para obtener clientes por país
                $consultaClientes = "SELECT CodigoCliente, NombreCliente, NombreContacto, ApellidoContacto FROM clientes WHERE pais = '$opcionSeleccionada'";
                $resultadoClientes = mysqli_query($connection, $consultaClientes) or die("Fallo en la consulta de clientes");

                // Consulta SQL para obtener la lista de empleados
                $sql = "SELECT CodigoEmpleado, CONCAT(Nombre, ' ', Apellido1) AS NombreCompleto FROM Empleados";
                $result = mysqli_query($connection, $sql);

                $nfilas = mysqli_num_rows($resultadoClientes);
                if ($nfilas > 0) {
                    echo "<p style='color:blue;'>LISTADO DE CLIENTES DE $opcionSeleccionada EN BASE DE DATOS JARDINERIA</p>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Código de Cliente</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Nombre de Contacto</th>";
                    echo "<th>Apellido de Contacto</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($resultadoClientes)) {
                        echo "<tr>";
                        echo "<td>" . $row['CodigoCliente'] . "</td>";
                        echo "<td>" . $row['NombreCliente'] . "</td>";
                        echo "<td>" . $row['NombreContacto'] . "</td>";
                        echo "<td>" . $row['ApellidoContacto'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='color:blue;'>Actualmente no hay clientes de este país.</p>";
                }
                echo "<br><a href='consulta_de_clientes_por_pais.php'>Realizar nueva consulta</a>";
                mysqli_close($connection); // Cierre de conexión
            } else {
                echo "Error: conexión no realizada, respuesta del servidor: " . mysqli_error($conexion) . " Nº de error: " . mysqli_errno($conexion);
            }
        } else {
            ?>
            <h2>Formulario para insertar nuevo cliente</h2>
            <form action="insertar_cliente.php" method="get">
                <table>
                    <tr>
                        <td><label for="nombreCliente">Nombre Cliente:</label></td>
                        <td><input type="text" id="nombreCliente" name="nombreCliente" required></td>
                    </tr>
                    <!-- Otros campos del formulario -->
                    <tr>
                        <td><label for="codigoEmpleadoRepVentas">Código Empleado Rep. Ventas:</label></td>
                        <td>
                            <select id="codigoEmpleadoRepVentas" name="codigoEmpleadoRepVentas" required>
                                <?php
                                if ($result) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $row["CodigoEmpleado"] . '">' . $row["NombreCompleto"] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">No hay empleados disponibles</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Insertar Cliente">
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

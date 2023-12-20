<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include('../includes/meta_datos.php');
    ?>
<body>
<?php
include('../includes/header.php');
include('../includes/nav_header.php');
?>
<section>
<?php
include('../includes/nav_bbdd.php');
?>
<main>

<?php
if(isset($_POST['cerrar_sesion'])) {
    unset($_SESSION['usuario']);

}
if(isset($_SESSION['usuario'])) {
    include('../includes/bdconnect.php');


    print "<div class='index_user'>
                    <h4 class='inicio'><a href='index.php'>Inicio Ejercicios - BBDD</a></h4>
                    <div class='user'>
                        <h4>Usuario: " . $_SESSION['usuario'] . "</h4><br>
                            <form action='lista_clientes.php' method='post'>
                                <button type='submit' name='cerrar_sesion'>Cerrar sesión</button>
                            </form>
                        </div>
                    <br>
                </div>
                <h3>Formulario para modificar cliente</h3>
                <br>
        ";
    // Consulta SQL para obtener la lista de Teléfonos y clientes
    $sql    = "SELECT Telefono, NombreCliente FROM clientes";
    $result = mysqli_query($connection, $sql) or exit("Consulta fallida");

    if ($_GET) {
        $telefonoExistente = $_GET['telefono']; // Obtengo el número de teléfono del formulario de selección

        if (isset($_GET['Modificar'])) {
            $nombreCliente              = $_GET['nombreCliente'];
            $nombreContacto             = $_GET['nombreContacto'];
            $apellidoContacto           = $_GET['apellidoContacto'];
            $telefono_ClienteModificado = $_GET['telefono'];
            $fax                        = $_GET['fax'];
            $lineaDireccion1            = $_GET['lineaDireccion1'];
            $lineaDireccion2            = $_GET['lineaDireccion2'];
            $ciudad                     = $_GET['ciudad'];
            $region                     = $_GET['region'];
            $pais                       = $_GET['pais'];
            $codigoPostal               = $_GET['codigoPostal'];
            $limiteCredito              = $_GET['limiteCredito'];
            $codigoEmpleado             = $_GET['codigoEmpleadoRepVentas'];

            if ($connection) {
                mysqli_select_db($connection, "jardineria") or exit("No se puede seleccionar la base de datos jardineria");

                // Sentencia para modificar cliente
                $sqlUpdate = "UPDATE Clientes
                SET
                  NombreCliente = '$nombreCliente',
                  NombreContacto = '$nombreContacto',
                  ApellidoContacto = '$apellidoContacto',
                  Telefono = '$telefono_ClienteModificado',
                  Fax = '$fax',
                  LineaDireccion1 = '$lineaDireccion1',
                  LineaDireccion2 = '$lineaDireccion2',
                  Ciudad = '$ciudad',
                  Region = '$region',
                  Pais = '$pais',
                  CodigoPostal = '$codigoPostal',
                  LimiteCredito = '$limiteCredito',
                  CodigoEmpleadoRepVentas = '$codigoEmpleado'
                WHERE Telefono = '$telefonoExistente'";

                $resultUpdate = mysqli_query($connection, $sqlUpdate);

                if ($resultUpdate) {
                    print "Cliente actualizado correctamente.";
                    print "<br><a href='modificar_cliente.php'>Volver a listado de clientes</a>";
                } else {
                    print "Error al actualizar el cliente: " . mysqli_error($connection);
                }
            } else {
                print "Error: conexión no realizada, respuesta del servidor: " .
                mysqli_error($conexion) . "Nº de error: " . mysqli_errno($conexion);
            }
        } else {
            $telefono = $_GET['telefono'];
            if ($connection) {
                mysqli_select_db($connection, "jardineria")
                or exit("No se puede seleccionar la base de datos jardineria");

                // Sentencia para recuperar datos según el Teléfono seleccionado
                $sqlClienteTlf       = "SELECT * FROM Clientes WHERE Telefono = '$telefono'";
                $resultadoClienteTlf = mysqli_query($connection, $sqlClienteTlf) or exit("Fallo en la consulta");

                $nfilas    = mysqli_num_rows($resultadoClienteTlf);
                $resultado = mysqli_fetch_array($resultadoClienteTlf);

                // Sentencia para obtener empleados
                $sqlEmp    = "SELECT CodigoEmpleado, Nombre, Apellido1 FROM Empleados";
                $resultEmp = mysqli_query($connection, $sqlEmp) or exit("Consulta fallida");
                ?>
                <form action="modificar_cliente.php" method="get">
                    <table>
                        <tr>
                            <td><label for="CodigoCliente">Codigo Cliente:</label></td>
                            <td><input type="text" id="CodigoCliente" name="CodigoCliente" value="<?php print $resultado['CodigoCliente']; ?>" required readonly></td>
                        </tr>
                        <tr>
                            <td><label for="nombreCliente">Nombre Cliente:</label></td>
                            <td><input type="text" id="nombreCliente" name="nombreCliente" value="<?php print $resultado['NombreCliente']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="nombreContacto">Nombre de Contacto:</label></td>
                            <td><input type="text" id="nombreContacto" name="nombreContacto" value="<?php print $resultado['NombreContacto']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="apellidoContacto">Apellido de Contacto:</label></td>
                            <td><input type="text" id="apellidoContacto" name="apellidoContacto" value="<?php print $resultado['ApellidoContacto']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="telefono">Teléfono:</label></td>
                            <td><input type="number" id="telefono" name="telefono" value="<?php print $resultado['Telefono']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="fax">Fax:</label></td>
                            <td><input type="number" id="fax" name="fax" value="<?php print $resultado['Fax']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="lineaDireccion2">Dirección 1:</label></td>
                            <td><input type="text" id="lineaDireccion1" name="lineaDireccion1" value="<?php print $resultado['LineaDireccion1']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="lineaDireccion2">Dirección 2:</label></td>
                            <td><input type="text" id="lineaDireccion2" name="lineaDireccion2" value="<?php print $resultado['LineaDireccion2']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="ciudad">Ciudad:</label></td>
                            <td><input type="text" id="ciudad" name="ciudad" value="<?php print $resultado['Ciudad']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="region">Región:</label></td>
                            <td><input type="text" id="region" name="region" value="<?php print $resultado['Region']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="pais">País:</label></td>
                            <td><input type="text" id="pais" name="pais" value="<?php print $resultado['Pais']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="codigoPostal">Código Postal:</label></td>
                            <td><input type="number" id="codigoPostal" name="codigoPostal" value="<?php print $resultado['CodigoPostal']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="limiteCredito">Límite de Crédito:</label></td>
                            <td><input type="number" id="limiteCredito" name="limiteCredito" value="<?php print $resultado['LimiteCredito']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="codigoEmpleadoRepVentas">Código Empleado:</label></td>
                            <td>
                                <select id="codigoEmpleadoRepVentas" name="codigoEmpleadoRepVentas" required>
                                <?php
                                if ($resultEmp) {
                                    while ($rowEmp = mysqli_fetch_array($resultEmp)) {
                                        print '<option value="' . $rowEmp["CodigoEmpleado"] . '"';
                                        if ($rowEmp['CodigoEmpleado'] == $resultado['CodigoEmpleadoRepVentas']) {
                                            print 'selected';
                                        }
                                        print '>' . $rowEmp["CodigoEmpleado"] . " - " . $rowEmp["Nombre"] . " " . $rowEmp["Apellido1"] . '</option>';
                                    }
                                } else {
                                    print '<option value="">No hay empleados disponibles</option>';
                                }
                ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="Modificar" name="Modificar">
                </form>
                <br><a href="modificar_cliente.php">Volver a listado de clientes</a>
                <?php
            } else {
                print "Error: conexión no realizada, respuesta del servidor: " .
                mysqli_error($conexion) . "Nº de error: " . mysqli_errno($conexion);
            }
        }
    } else {
        ?>
        <form action="modificar_cliente.php" method="get">
            <label for="selectTlf">Selecciona el teléfono del cliente</label>
            <select id="Telefono" name="telefono" required>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    print '<option value="' . $row["Telefono"] . '">' . $row["Telefono"] . " - " . $row["NombreCliente"] . '</option>';
                }
            } else {
                print '<option value="">No hay clientes disponibles</option>';
            }
        ?>
            </select><br>
            <input type="submit" value="Enviar consulta" name="Enviar">
        </form>
        <?php
    }
}else {
    print "Esta sección tiene el acceso restringido a usuarios registrados en la base de datos, por favor <a href='login.php'>identifíquese</a> o <a href='register.php'>registrese</a>";
}
    ?>
</main>
<?php
include('../includes/aside.php');
?>
</section>
<?php
include('../includes/footer.php');
?>
</body>
</html>
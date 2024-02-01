<form action="index.php" method="get">
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
                $empleados = $data['empleados'];
                foreach($empleados as $empleado){
                        echo '<option value="' . $empleado[0] . '">' . $empleado[0]. " - " . $empleado[1] . " " . $empleado[2] . '</option>';
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
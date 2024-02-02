<?php
$clientes = $data['clientes'];
$empleados = $data['empleados'];

?>
<form action="index.php" method="get">
                    <table>
                        <tr>
                            <td><label for="CodigoCliente">Codigo Cliente:</label></td>
                            <td><input type="text" id="CodigoCliente" name="CodigoCliente" value="<?php print $clientes[0][0]; ?>" required readonly></td>
                        </tr>
                        <tr>
                            <td><label for="nombreCliente">Nombre Cliente:</label></td>
                            <td><input type="text" id="nombreCliente" name="nombreCliente" value="<?php print $clientes[0][1]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="nombreContacto">Nombre de Contacto:</label></td>
                            <td><input type="text" id="nombreContacto" name="nombreContacto" value="<?php print $clientes[0][2]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="apellidoContacto">Apellido de Contacto:</label></td>
                            <td><input type="text" id="apellidoContacto" name="apellidoContacto" value="<?php print $clientes[0][3]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="telefono">Teléfono:</label></td>
                            <td><input type="number" id="telefono" name="telefono" value="<?php print $clientes[0][4]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="fax">Fax:</label></td>
                            <td><input type="number" id="fax" name="fax" value="<?php print $clientes[0][5]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="lineaDireccion2">Dirección 1:</label></td>
                            <td><input type="text" id="lineaDireccion1" name="lineaDireccion1" value="<?php print $clientes[0][6]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="lineaDireccion2">Dirección 2:</label></td>
                            <td><input type="text" id="lineaDireccion2" name="lineaDireccion2" value="<?php print $clientes[0][7]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="ciudad">Ciudad:</label></td>
                            <td><input type="text" id="ciudad" name="ciudad" value="<?php print $clientes[0][8]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="region">Región:</label></td>
                            <td><input type="text" id="region" name="region" value="<?php print $clientes[0][9]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="pais">País:</label></td>
                            <td><input type="text" id="pais" name="pais" value="<?php print $clientes[0][10]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="codigoPostal">Código Postal:</label></td>
                            <td><input type="number" id="codigoPostal" name="codigoPostal" value="<?php print $clientes[0][11]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="limiteCredito">Límite de Crédito:</label></td>
                            <td><input type="number" id="limiteCredito" name="limiteCredito" value="<?php print $clientes[0][13]; ?>" required></td>
                        </tr>
                        <tr>
                            <td><label for="codigoEmpleadoRepVentas">Código Empleado:</label></td>
                            <td>
                                <select id="codigoEmpleadoRepVentas" name="codigoEmpleadoRepVentas" required>
                                <?php
                                foreach($empleados as $empleado){
                                    if($empleado[0] == $clientes[0][12]){
                                        echo '<option selected value="' . $empleado[0] . '">' . $empleado[0]. " - " . $empleado[1] . " " . $empleado[2] . '</option>';
                                    }
                                        echo '<option value="' . $empleado[0] . '">' . $empleado[0]. " - " . $empleado[1] . " " . $empleado[2] . '</option>';
                                }
                                ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="controller" value="ClientesController">

                    <input type="submit" value="Modificar" name="Modificar">
                </form>
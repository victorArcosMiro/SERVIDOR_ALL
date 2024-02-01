     <form action="index.php" method="get">
            <label for="selectTlf">Selecciona el teléfono del cliente: </label>
            <select id="Telefono" name="telefono" required>
            <?php
                $clientes = $data['clientes'];

                foreach($clientes as $cliente) {
                    print '<option value="' . $cliente[0] . '">' . $cliente[4] . " - " . $cliente[1] . '</option>';
                }
        ?>
            </select><br>
            <input type="hidden" name="controller" value="ClientesController">
            <input type="hidden" name="action" value="modificarCliente">

            <input type="submit" value="Enviar consulta" name="Enviar">
        </form>
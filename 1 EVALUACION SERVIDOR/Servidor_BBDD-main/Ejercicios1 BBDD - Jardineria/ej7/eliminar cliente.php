<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria") or die("Fallo en la conexion con servidor");

    if($_GET && isset($_GET['seleccionarCliente'])) {
        $telefono = $_GET['seleccionarCliente'];
        $sqlSelect = "SELECT * from clientes WHERE Telefono = '$telefono'";
        if($connection) {
            mysqli_select_db($connection, "jardineria") or die("No se puede seleccionar la base de datos jardineria");
            $resultSelect = mysqli_query($connection, $sqlSelect);
            $DatosSelect = mysqli_fetch_array($resultSelect);

            // Mostrar los detalles del cliente
            print("
            Código Cliente: " . $DatosSelect[0] . "<br>
            Nombre Cliente: " . $DatosSelect['NombreCliente'] . "<br>
            Nombre de Contacto: " . $DatosSelect['NombreContacto'] . "<br>
            Apellido de Contacto: " . $DatosSelect['ApellidoContacto'] . "<br>
            Teléfono: " . $DatosSelect['Telefono'] . "<br>
            Fax: " . $DatosSelect['Fax'] . "<br>
            Dirección 1: " . $DatosSelect['LineaDireccion1'] . "<br>
            Dirección 2: " . $DatosSelect['LineaDireccion2'] . "<br>
            Ciudad: " . $DatosSelect['Ciudad'] . "<br>
            Región: " . $DatosSelect['Region'] . "<br>
            País: " . $DatosSelect['Pais'] . "<br>
            Código Postal: " . $DatosSelect['CodigoPostal'] . "<br>
            Código Cliente: " . $DatosSelect['CodigoCliente'] . "<br>
            Límite de Crédito: " . $DatosSelect['LimiteCredito'] . "<br>
            Código Empleado: " . $DatosSelect['CodigoEmpleadoRepVentas'] . "
            <br>
            ¿Quieres eliminar este cliente?
            ");

            if(isset($_GET['boton'])) {
                if($_GET['boton'] == 'Si') {
                    $sqlDelete = "DELETE from clientes WHERE Telefono = '$telefono'";
                    $codigo = $_GET['codigo'];
                    //Seleccionamos el CodigoClinete para hacer DELETE tambien de las tablas asociadas (pagos y pedidos)
                    $sqlCodClienteQuery = "SELECT CodigoCliente from clientes WHERE Telefono = '$telefono'";
                    $sqlCodClienteRow = mysqli_fetch_array(mysqli_query($connection, $sqlCodClienteQuery));
                    $codCliente = $sqlCodClienteRow[0];
                    //Sentencias para las tablas asociadas
                    $sqlDeletePagos = "DELETE from pagos WHERE CodigoCliente = '$codCliente'";
                    $sqlDeletePedidos = "DELETE from pedidos WHERE CodigoCliente = '$codCliente'";
                    $sqlDeleteDetallePedidos ="DELETE WHERE CodigoPedido IN (SELECT DISTINCT CodigoPedido FROM pedidos WHERE CodigoPEdido = '$codigo'";



                    if($connection) {
                        mysqli_select_db($connection, "jardineria") or die("No se puede seleccionar la base de datos jardineria");
                        $resultDelete = mysqli_query($connection, $sqlDelete);
                        $resultDeletePagos = mysqli_query($connection, $sqlDeletePagos);
                        $resultDeletePedidos = mysqli_query($connection, $sqlDeletePedidos);
                        $resultDeletePedidos = mysqli_query($connection, $sqlDeleteDetallePedidos);

                        if($resultDelete && $resultDeletePagos && $resultDeletePedidos && $sqlDeleteDetallePedidos) {
                            print("Se elemino el cliente correctamente");
                        } else {
                            print("No se pudo eliminar el cliente correctamente");
                        }
                    } else {
                        print("Fallo de conexion con la BBDD");
                    }
                    header("Location: eliminar cliente.php");
                    exit();
                } else {
                    header("Location: eliminar cliente.php");
                    exit();
                }
            }
            ?>
            <form action="eliminar cliente.php">
                <input type="hidden" name="codigo" value='<?php $DatosSelect['CodigoCliente'] ?>'>
                <input type="submit" name="boton" value="Si">
                <input type="submit" name="boton" value="No">
            </form>
            <?php

        } else {
            print "Error: conexión no realizada con base de datos, respuesta del servidor: ".
            mysqli_error($conexion)."Nº de error: ".mysqli_errno($conexion);
        }

    } else {
        ?>
      <form action="eliminar cliente.php" method="get">
        <label for="seleccionarCliente">Escribe el teléfono del cliente: </label>
        <input type="number" name="seleccionarCliente">

        <input type="submit" name="EnviarDatos" value="Enviar">
      </form>
      <?php
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDOS DE CLIENTES</title>
    <link rel="stylesheet" href="../ej1/style.css">

</head>
<body>
    <header>
        <h1>CONSULTA DE CLIENTES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
                 $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria");

                if(isset($_REQUEST['consultar'])){
                    $codigoCliente = $_GET['clientes'];
                    //Consulta sql
                    $sqlClientePedidos ="SELECT
                                        Pedidos.CodigoPedido,
                                        Pedidos.FechaPedido,
                                        Productos.Nombre,
                                        Productos.PrecioVenta,
                                        DetallePedidos.Cantidad
                                    FROM
                                        Pedidos
                                    JOIN
                                        DetallePedidos ON Pedidos.CodigoPedido = DetallePedidos.CodigoPedido
                                    JOIN
                                        Productos ON DetallePedidos.CodigoProducto = Productos.CodigoProducto
                                    WHERE
                                        Pedidos.CodigoCliente = '$codigoCliente';
                                    ";
                    //Ejecucion de consulta
                    $resultClientePedidos = mysqli_query($connection, $sqlClientePedidos) or die ("Fallo en consulta de pedidos de cliente");

                    $arrayResultClientePedido = mysqli_fetch_array($resultClientePedidos);

                    //NUmero de ROWS de la consulta
                    $nfilas = mysqli_num_rows($resultClientePedidos);

                    if($nfilas > 0){
                        while($arrayResultClientePedido = mysqli_fetch_array($resultClientePedidos)){// Utilizo el WHILE para que muestre ROWS hasta que no haya mas elemntos que mostrar
                            ?>
                            <table>
                                <tr>
                                    <th colspan="3">Pedido código <?php echo $arrayResultClientePedido[0]; ?> de fecha <?php echo $arrayResultClientePedido[1]; ?></th>
                                </tr>
                                <tr>
                                    <td>Nombre del Producto</td><td>Precio Unidad</td><td>Cantidad</td>
                                </tr>
                                <tr>
                                    <td><?php echo $arrayResultClientePedido[2]; ?></td><td><?php echo $arrayResultClientePedido[3]; ?></td><td><?php echo $arrayResultClientePedido[4]; ?></td>
                                </tr>
                            </table>
                            <br>
                            <?php
                        }
                    }else{
                        print("No hay datos disponibles");
                    }
                }else{
                    $sqlClientes = "SELECT CodigoCliente, NombreCliente FROM clientes";
                    $resultSqlClientes = mysqli_query($connection, $sqlClientes) or die("Fallo en consulta de clientes");
                    ?>
                    <form action="#" method="get">
                        <select name="clientes">
                        <?php
                        if($resultSqlClientes){
                            while($rowClientes = mysqli_fetch_array($resultSqlClientes)){
                                echo '<option value="' . $rowClientes[0] . '">' . $rowClientes[1] . '</option>';
                            }
                        }else{
                            echo 'No hay clientes disponibles';
                        }
                        mysqli_close($connection);//Cierre de conexion
                        ?>
                        </select>
                        <input type="submit" name="consultar" value="Consultar">
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
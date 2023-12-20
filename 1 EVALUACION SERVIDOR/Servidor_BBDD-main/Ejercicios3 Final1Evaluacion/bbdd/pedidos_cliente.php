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


        print("<div class='index_user'>
                    <h4 class='inicio'><a href='index.php'>Inicio Ejercicios - BBDD</a></h4>
                    <div class='user'>
                        <h4>Usuario: " . $_SESSION['usuario']  . "</h4><br>
                            <form action='lista_clientes.php' method='post'>
                                <button type='submit' name='cerrar_sesion'>Cerrar sesión</button>
                            </form>
                        </div>
                    <br>
                </div>
                <h3>Pedidos de clientes</h3>
                <br>
        ");
        if(isset($_REQUEST['consultar'])){
            $codigoCliente = $_GET['clientes'];
            /* ------------Seleccionar datos de historia de compra del cliente ------------  */
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
                            $resultClientePedidos = mysqli_query($connection, $sqlClientePedidos) or die ("Fallo en consulta de pedidos de cliente");

                            $arrayResultClientePedido = mysqli_fetch_array($resultClientePedidos);

                            //NUmero de ROWS de la consulta
                            $nfilas = mysqli_num_rows($resultClientePedidos);
            /* ------------Seleccionar nombre del cliente ------------  */
            $sqlNombreCliente = "SELECT NombreCliente FROM clientes WHERE CodigoCliente = '$codigoCliente'";

            $resultadoNombreCliente = mysqli_query($connection, $sqlNombreCliente);

            $arrayNombreCliente = mysqli_fetch_array($resultadoNombreCliente);

            $stringNombreCliente = $arrayNombreCliente['NombreCliente'];
            print("Historial de pedidos de: <strong>" . $stringNombreCliente . "</strong><br>");
            /* ------------------------  */

            if($nfilas > 0){
                while($arrayResultClientePedido = mysqli_fetch_array($resultClientePedidos)){// Utilizo el WHILE para que muestre ROWS hasta que no haya mas elemntos que mostrar
                    ?><br>
                    <table style="min-width: 70%;">
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
                print("<br>
                <a href='pedidos_cliente.php'>Nueva consulta</a>");
            }else{
                print("No hay datos disponibles<br><br>
                <a href='pedidos_cliente.php'>Nueva consulta</a>");
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
    } else {
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
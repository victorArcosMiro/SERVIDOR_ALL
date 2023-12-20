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
                <h3>Eliminar clientes de la base de datos.</h3>
                <br>
        ");
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
    $codigo    = $_GET['codigo'];
    //Seleccionamos el CodigoClinete para hacer DELETE tambien de las tablas asociadas (pagos y pedidos)
    $sqlCodClienteQuery = "SELECT CodigoCliente from clientes WHERE Telefono = '$telefono'";
    $sqlCodClienteRow   = mysqli_fetch_array(mysqli_query($connection, $sqlCodClienteQuery));
    $codCliente         = $sqlCodClienteRow[0];
    //Sentencias para las tablas asociadas
    $sqlDeletePagos          = "DELETE from pagos WHERE CodigoCliente = '$codCliente'";
    $sqlDeletePedidos        = "DELETE from pedidos WHERE CodigoCliente = '$codCliente'";
    $sqlDeleteDetallePedidos = "DELETE WHERE CodigoPedido IN (SELECT DISTINCT CodigoPedido FROM pedidos WHERE CodigoPEdido = '$codigo'";

    if($connection) {
        mysqli_select_db($connection, "jardineria") or exit("No se puede seleccionar la base de datos jardineria");
        $resultDelete        = mysqli_query($connection, $sqlDelete);
        $resultDeletePagos   = mysqli_query($connection, $sqlDeletePagos);
        $resultDeletePedidos = mysqli_query($connection, $sqlDeletePedidos);
        $resultDeletePedidos = mysqli_query($connection, $sqlDeleteDetallePedidos);

        if($resultDelete && $resultDeletePagos && $resultDeletePedidos && $sqlDeleteDetallePedidos) {
            print "Se elemino el cliente correctamente";
        } else {
            print "No se pudo eliminar el cliente correctamente";
        }
    } else {
        print "Fallo de conexion con la BBDD";
    }
    print "<br><a href='borrar_cliente.php'>Volver a borrar cliente</a>";
}
            }
            ?>
            <form action="borrar_cliente.php">
                <input type="hidden" name="codigo" value='<?php $DatosSelect['CodigoCliente'] ?>'>
                <input type="submit" name="boton" value="Si">
                <input type="submit" name="boton" value="No">
            </form>
            <?php

        } else {
            print "Error: conexión no realizada con base de datos.";
        }

    } else {
        ?>
      <form action="borrar_cliente.php" method="get">
        <label for="seleccionarCliente">Escribe el teléfono del cliente: </label>
        <input type="number" name="seleccionarCliente">

        <input type="submit" name="EnviarDatos" value="Enviar">
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
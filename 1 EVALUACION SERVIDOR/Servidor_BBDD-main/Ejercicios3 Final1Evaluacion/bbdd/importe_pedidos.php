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
if (isset($_REQUEST['enviar'])){
	$menu=$_REQUEST['menu'];
	//1º Mostramos encabezado con el nombre del cliente y su código:
	$datoscli=explode(":",$menu);
	$codigocli=$datoscli[0];
	$nombrecli=$datoscli[1];
	echo "<h3>Listado de pedidos del cliente: $nombrecli <br>Con codigo:  $codigocli</h3><br>";

	//2º Buscamos los pedidos del cliente cuyo código se ha enviado desde el formulario
	$sql1="SELECT CodigoPedido, FechaPedido FROM pedidos WHERE pedidos.CodigoCliente='$codigocli' ";
	$resulconsultapedidos = mysqli_query ($connection,$sql1) or die ("Fallo en la consulta de pedidos");

	//3º Para cada pedido mostramos sus datos y luego buscamos sus líneas de detalle
	// y el nombre de cada producto, devolviéndolo todo en una tabla HTML
	$npedidos = mysqli_num_rows ($resulconsultapedidos);



	if($npedidos==0)
		echo "<h3>Este cliente no tiene ningún pedido </h3>";
	else {
		$imp_total=0;
		for($fp=1;$fp<=$npedidos;$fp++){
			$imp_pedido=0;
			$filapedido = mysqli_fetch_row ($resulconsultapedidos);
			echo "<table style='min-width:100%'>";
			echo "<tr>
					<th colspan='4'>Pedido código ". $filapedido[0]." de fecha ".$filapedido[1]."</th>
				</tr>";
			echo "<tr>
					<th>Nombre del Producto</th>
					<th>Precio Unidad</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>";

			//Obtenemos todos los detallepedidos y nombres de productos del pedido de código $filapedido[0]
			// y los devolvemos en forma de tabla HTML
			$sql2="SELECT Nombre,PrecioUnidad,Cantidad FROM detallepedidos NATURAL JOIN productos WHERE detallepedidos.CodigoPedido=$filapedido[0]";
			$resulconsultadetallespedido=mysqli_query ($connection,$sql2) or die ("Fallo en la consulta de detallepedidos y productos");
			$ndetalles = mysqli_num_rows ($resulconsultadetallespedido);

			if ($ndetalles == 0) {
				print "<tr>
						<td colspan='4'>No se han registrado detalles de este pedido</td>
					</tr>";
			}
			else{
				for($fd = 1; $fd <= $ndetalles; $fd++) {
					$filadetalle = mysqli_fetch_row($resulconsultadetallespedido);
					print '<tr>';
					foreach($filadetalle as $columna) {
						echo '<td>',$columna,'</td>';
					}
					//Además vamos calculando y acumulando el importe de cada detalle del pedido actual
					$imp_detalle = $filadetalle[1] * $filadetalle[2];
					$imp_pedido += $imp_detalle;
						echo '<td>',$imp_detalle,'</td>';
					print '</tr>';
				}
			}
			echo "<tr>
					<td colspan='3'>Importe total de este pedido</td>
					<td>$imp_pedido</td>
				</tr>";
			echo "</table> <br/>";
			$imp_total+=$imp_pedido; //Vamos acumlando los importe de los pedidos del cliente, para después poder mostrarlo
		}
	echo "<h3>Importe total de pedidos del cliente:  $imp_total</h3><br>";
	}
}else{

    //Sacamos menu de selección para elegir el cliente
    $consulta = mysqli_query($connection, "select CodigoCliente,NombreCliente from clientes") or exit("Fallo en la consulta");
    $nfilas   = mysqli_num_rows($consulta);
    print "<h3>Selecciona cliente a consultar</h3><br>";
    print "<form  action='importe_pedidos.php' method='get'>";
    print "<select name='menu'>";
    for($f = 1; $f <= $nfilas; $f++) {
        $fila     = mysqli_fetch_row($consulta);
        $datoscli = $fila[0] . ':' . $fila[1];		//Forma de pasar dos datos en un mismo value y recuperarlos con explode
        print "<option value='$datoscli'>";
        print $fila[1];
        print "</option>";
    }
    print "</select>&nbsp;&nbsp;";
    print "<input type='submit' name='enviar' value='Enviar consulta'>";
    print "</form>";
    mysqli_close($connection);
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
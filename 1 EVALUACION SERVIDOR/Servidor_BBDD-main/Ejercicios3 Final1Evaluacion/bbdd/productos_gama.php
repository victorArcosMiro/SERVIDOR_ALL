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
            <h3>Consulta de clientes.</h3>
            <br>
    ";
    if (isset($_GET["opciones"])) {
        $opcionSeleccionada = $_GET["opciones"];

        $fechaActual        = date("d-m-Y");
        if($connection) {
            mysqli_select_db($connection, "jardineria")
                or exit("No se puede seleccionar la base de datos jardineria");

            //sentencia sql
            $consultaProductos = "SELECT CodigoProducto, Nombre, CantidadEnStock FROM productos WHERE gama = \"$opcionSeleccionada\"";
            $resultadoConsulta = mysqli_query($connection, $consultaProductos) or exit("Fallo en la consulta de clientes");

            $nfilas = mysqli_num_rows($resultadoConsulta);
            if($nfilas > 0) {
                print "<p style='color:blue';>Productos de la gama " . $opcionSeleccionada . " - Fecha: " . $fechaActual . "</p>";
                print "<table border='1'>";
                print "<tr>";
                print "<th>Codigo de Producto</th>";
                print "<th>Nombre</th>";
                print "<th>Cantidad en sto</th>";
                print "</tr>";
                for($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_array($resultadoConsulta);
                    print "<tr>";
                    print "<td>" . $resultado['CodigoProducto'] . "</td> ";
                    print "<td>" . $resultado['Nombre'] . "</td> ";
                    print "<td>" . $resultado['CantidadEnStock'] . "</td> ";
                    print "</tr>";
                }
                print "</table>";

            } else {
                print "<p style='color:blue';>Actualmente nos hay productos de esta gama.</p>";
            }
            print "<br><a href='productos_gama.php'>Realizar nueva consulta</a>";
            mysqli_close($connection); //Cierre de conexion
        } else {
            print "Error: conexión no realizada." ;
        }
    } else {
        print '
    <form action="productos_gama.php" method="get">
    <label for="gama">Elige una de las gamas de productos disponibles</label>
    <select id="opciones" name="opciones">
            <option value="Aromaticas">Aromáticas</option>
            <option value="Frutales">Frutales</option>
            <option value="Herbaceas">Herbaceas</option>
            <option value="Herramientas">Herramientas</option>
            <option value="Ornamentales">Ornamentales</option>
        </select>
        <input type="submit" value="Comprobar">
    </form>
    ';
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
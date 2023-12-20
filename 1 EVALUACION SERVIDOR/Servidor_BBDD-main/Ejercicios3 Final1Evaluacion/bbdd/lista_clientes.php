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
                <h3>Consulta de clientes.</h3>
                <br>
        ");
        if($connection) {
            mysqli_select_db($connection, "jardineria")
                or exit("No se puede seleccionar la base de datos bdprueba");

            //sentencia sql
            $consultaClientes = "SELECT CodigoCliente, NombreCliente, NombreContacto, Telefono FROM clientes";

            //Ejecucion de consulta
            $resultadoConsulta = mysqli_query($connection, $consultaClientes) or exit("Fallo en la consulta de clientes");

            //NUmero de ROWS de la consulta
            $nfilas = mysqli_num_rows($resultadoConsulta);
            if($nfilas > 0) {
                print "<table border='1'>";
                print "<tr>";
                print "<th>Codigo de Cliente</th>";
                print "<th>Nombre del Cliente</th>";
                print "<th>Nombre de Contacto</th>";
                print "<th>Telefono</th>";
                print "</tr>";
                for($i = 0; $i < $nfilas; $i++) {
                    //Introduccion de consulta en ARRAY
                    $resultado = mysqli_fetch_array($resultadoConsulta);
                    print "<tr>";
                    print "<td>" . $resultado['CodigoCliente'] . "</td> ";
                    print "<td>" . $resultado['NombreCliente'] . "</td> ";
                    print "<td>" . $resultado['NombreContacto'] . "</td> ";
                    print "<td>" . $resultado['Telefono'] . "</td> ";
                    print "</tr>";
                }
                print "</table>";
            } else {
                print "No hay datos disponibles.";
            }
            mysqli_close($connection); //Cierre de conexion
        } else {
            print "Error: conexión no realizada, respuesta del servidor: " .
            mysqli_error($conexion) . "Nº de error: " . mysqli_errno($conexion);
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
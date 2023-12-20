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
            <h3>Estadística de productos en stock.</h3>
            <br>
    ";
    if($connection) {
        //sentencia sql
    $constulaProductosGama ="SELECT GP.Gama, GP.DescripcionTexto, COUNT(P.CodigoProducto) AS NumeroTotalProductos
                            FROM GamasProductos GP
                            LEFT JOIN Productos P ON GP.Gama = P.Gama
                            GROUP BY GP.Gama, GP.DescripcionTexto
                            HAVING COUNT(P.CodigoProducto) > 0;
        ";
        $resultadoConsulta = mysqli_query($connection, $constulaProductosGama) or die ("Fallo en la consulta de clientes");

        $nfilas = mysqli_num_rows($resultadoConsulta);
        if($nfilas > 0){
            print ("<table border='1'>");
                print ("<tr>");
                    print ("<th>Gama</th>");
                    print ("<th>Descripción</th>");
                    print ("<th>Nº de productos</th>");
                print ("</tr>");
            for($i=0; $i<$nfilas; $i++){
                $resultado = mysqli_fetch_array($resultadoConsulta);
                print ("<tr>");
                    print ("<td>" . $resultado['Gama'] . "</td> ");
                    print ("<td>" . $resultado['DescripcionTexto'] . "</td> ");
                    print ("<td>" . $resultado['NumeroTotalProductos'] . "</td> ");
                print ("</tr>");
            }
            print ("</table>");
        }else{
            print ("No hay datos disponibles.");
        }
        mysqli_close($connection);//Cierre de conexion
        }else{
            print "Error: conexión no realizada.";
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
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
    if (isset($_REQUEST['enviar']))
    {
        $pais=$_REQUEST['Pais'];
        // Enviar consulta
        $instruccion = "SELECT CodigoCliente, NombreCliente, NombreContacto, ApellidoContacto  FROM  clientes WHERE Pais='$pais' ORDER BY CodigoCliente";
        $resconsulta = mysqli_query ($connection,$instruccion)
            or die ("Fallo en la consulta");
        // Mostrar resultados de la consulta
        echo "<h1>LISTADO  DE CLIENTES DE --".$pais."-- EN BD JARDINERIA</h1><br>";
        echo "<table>";
        echo "<tr> <th>CÓDIGO</th> <th>NOMBRE</th> <th>NOMBRE CONTACTO</th> <th>APELLIDO CONTACTO</th> </tr>";
        while ($resultado = mysqli_fetch_row ($resconsulta))
        {
            echo "<tr>";
            for($i=0;$i<4;$i++){
                echo"<td>" .$resultado[$i]. "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</br><a href='clientes_por_pais.php'>Realizar nueva consulta</a>";
    }
    else
    {
        echo "<h1>Consulta de clientes por pais</h1><br>";
        $instruccion = "SELECT DISTINCT Pais FROM clientes ORDER BY Pais";
        $resconsulta = mysqli_query ($connection,$instruccion)
            or die ("Fallo en la consulta");

        print ("<form action='clientes_por_pais.php' method='GET'>");
        print ("Elige País &nbsp");
        print ("<select name='Pais'>");
        $nfilas = mysqli_num_rows ($resconsulta);
        if ($nfilas > 0)
        {
            for ($i=1; $i<=$nfilas; $i++)
            {
                $resultado = mysqli_fetch_row ($resconsulta);
                echo "<option>". $resultado[0]."</option>";
            }
        }
        print ("</select>");
        print ("<br><br><p><input type='submit' name='enviar' value='Enviar consulta'></p>");
        print ("</form>");
    }
    // Cerrar conexión
    mysqli_close ($connection);
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
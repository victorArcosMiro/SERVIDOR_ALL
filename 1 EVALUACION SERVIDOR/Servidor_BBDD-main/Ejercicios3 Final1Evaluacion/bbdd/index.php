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
    $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria");

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
    ?>
    <h3>Zona de ejercicios con bases de datos.</h3>
    <br>
    <p>Aqui puedes consultar desde el menú de navegacion los ejercicios realizados en el módulo sobre programación de acceso a datos con PHP y MySQL.</p>
<?php
} else {
    print "Esta sección tiene el acceso restringido a usuarios registrados en la base de datos, por favor <a href='login.php'>identifíquese</a> o <a href='register.php'>registrese.</a>";
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
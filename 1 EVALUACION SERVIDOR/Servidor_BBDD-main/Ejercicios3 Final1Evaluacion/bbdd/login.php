<?php
session_start();
//Funcion que devuelve TRUE en caso de realizar la consulta para comprobar si ya hay una persona registrada el la base de datos con el nombre introducido por formulario

function comprobarContraseña($connection, $usuario, $contrasena) {
    // Sentencia SQL para comprobar si el nombre de usuario ya está registrado
    $comprobarContraseña = "SELECT clave FROM usuarios WHERE nombre='$usuario'";

    $resultadoContraseña = mysqli_query($connection, $comprobarContraseña);

    if ($resultadoContraseña !== false && mysqli_num_rows($resultadoContraseña) > 0) {
        $resultado = mysqli_fetch_array($resultadoContraseña);

        if ($resultado !== null) {
            $stringContraseña = $resultado['clave']; // Guardo el resultado de la consulta (Contraseña encriptada) en una variable

            if (password_verify($contrasena, $stringContraseña)) {
                print "Bienvenido/a ". $usuario . ". Ahora puedes navegar por los distintos ejercicios de la sección.";
                $_SESSION['usuario'] = $usuario;
            } else {
                print "La contraseña para el usuario " . $usuario . " es incorrecta. Prueba otra vez <a href='login.php'>aquí.</a>";
            }
        } else {
            print "Error al obtener los datos del usuario.";
        }
    } else {
        print "Usuario no registrado. Regístrese <a href='register.php'>aquí.</a>";
    }
}

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
<h4><a href="index.php">Inicio Ejercicios - BBDD</a></h4>
<br>

<h3>Loguear usuario:</h3>

<br>
<?php
            $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria");

            // Verificar la conexión
            if (!$connection) {
                die("La conexión ha fallado: " . mysqli_connect_error());
            }



            if (isset($_POST["aceptar"])) {
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                comprobarContraseña($connection, $usuario, $contrasena);

            } else {
        ?>
        <form action="login.php" method="post">
            <table>
                <tr>
                    <td><label for="usuario">Usuario:</label></td>
                    <td><input type="text" id="usuario" name="usuario" required></td>
                </tr>
                <tr>
                    <td><label for="contrasena">Contraseña:</label></td>
                    <td><input type="password" id="contrasena" name="contrasena" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Aceptar" name="aceptar">
            <input type="reset" value="Borrar datos">
        </form>
        <?php
            }
            // Cerrar la conexión
            mysqli_close($connection);
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
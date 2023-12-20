<?php
//Funcion que devuelve TRUE en caso de realizar la consulta para comprobar si ya hay una persona registrada el la base de datos con el nombre introducido por formulario

function usuarioYaRegistrado($connection, $usuario) {
    // Sentencia SQL para comprobar si el nombre de usuario ya está registrado
    $comprobar_ya_registrado = "SELECT nombre FROM usuarios WHERE nombre='$usuario'";

    // Ejecutar la consulta
    $resultado_consulta = mysqli_query($connection, $comprobar_ya_registrado);

    if ($resultado_consulta) {
        // La consulta se ejecutó correctamente
        // Verificar si hay filas en el resultado
        return mysqli_num_rows($resultado_consulta) > 0;
    } else {
        // Manejar el caso en que la consulta no se ejecutó correctamente
        return false;
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
<h3>Registrar usuario:</h3>

<br>
<?php
            $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria");

            // Verificar la conexión
            if (!$connection) {
                die("La conexión ha fallado: " . mysqli_connect_error());
            }

            // Sentencia SQL para crear la tabla si no existe
            $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                nombre VARCHAR(50) NOT NULL,
                clave VARCHAR(100) NOT NULL,
                PRIMARY KEY (nombre)
            ) ENGINE=InnoDB;";

            // Ejecutar la sentencia SQL
            if (!mysqli_query($connection, $sql)) {
                die("Error al crear la tabla: " . mysqli_error($connection));
            }

            if (isset($_POST["aceptar"])) {
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                $contrasena2 = $_POST['contrasena2'];
                $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

                // Sentencia SQL para insertar usuarios
                $insert_sql = "INSERT INTO usuarios (nombre, clave) VALUES ('$usuario', '$contrasenaEncriptada')";

                if($contrasena!=$contrasena2){
                    print "<p>Las contraseñas no coinciden. Vuelve a introducir los datos en el <a href='register.php'>formulario.</a> de registro.</p>";
                }else{
                    if(usuarioYaRegistrado($connection,$usuario)){

                        print("El usuario ya esta registrado. Pueba otro nombre o logeate <a href='login.php'>aqui.</a>.");

                    } else {
                        // Puedes continuar con la inserción del nuevo usuario
                        mysqli_query($connection, $insert_sql);
                        print("Usuario " . $usuario . " insertado con éxito. Ahora puede <a href='login.php'>identificarse</a> para visualizar los ejercicios de esta sección.");
                    }
                }

            } else {
        ?>
        <form action="register.php" method="post">
            <table>
                <tr>
                    <td><label for="usuario">Usuario:</label></td>
                    <td><input type="text" id="usuario" name="usuario" required></td>
                </tr>
                <tr>
                    <td><label for="contrasena">Contraseña:</label></td>
                    <td><input type="password" id="contrasena" name="contrasena" required></td>
                </tr>
                <tr>
                    <td><label for="contrasena2">Repetir contraseña:</label></td>
                    <td><input type="password" id="contrasena2" name="contrasena2" required></td>
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
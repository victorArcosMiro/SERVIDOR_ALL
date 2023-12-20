<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA DE CLIENTE POR PAIS</title>
    <link rel="stylesheet" href="../ej1/style.css">
</head>
<body>
    <header>
        <h1>REGISTRO DE USUARIOS</h1>
    </header>
    <section>
        <nav></nav>
        <main>
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
                $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

                // Sentencia SQL para insertar usuarios
                $insert_sql = "INSERT INTO usuarios (nombre, clave) VALUES ('$usuario', '$contrasenaEncriptada')";
                $comprobar_ya_registrado = "SELECT nombre, clave FROM usuarios where nombre='$usuario' AND clave='$contrasenaEncriptada'";
                if(mysqli_query($connection, $comprobar_ya_registrado)){
                    print("Usuario ya registrado.");
                    print("");
                }else{
                    if (mysqli_query($connection, $insert_sql)) {
                        echo "Usuario '$usuario' registrado con éxito.\n";
                    } else {
                        echo "Error al insertar usuario '$usuario': " . mysqli_error($connection) . "\n";
                    }
                }
                // Ejecutar la sentencia SQL

            } else {
        ?>
        <h2>Registrar usuario:</h2>
        <form action="registrar usuario.php" method="post">
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
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>

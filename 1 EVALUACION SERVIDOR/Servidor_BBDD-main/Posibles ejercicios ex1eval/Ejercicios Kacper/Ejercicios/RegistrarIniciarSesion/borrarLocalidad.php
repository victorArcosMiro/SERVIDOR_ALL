<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicio</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header><h1>BORRAR LOCALIDAD POR NOMBRE</h1></header>

    <section>
        <nav></nav>
        <main>
            <?php
                // Configuración de la conexión a la base de datos
                $servername = "localhost";
                $username = "victor"; // Reemplaza con tu nombre de usuario
                $password = "arcos"; // Reemplaza con tu contraseña
                $dbname = "geografia";

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }


                    /*---------------------------------------------------------------------------*/

                if ($_REQUEST) {
                    $nombre = $_GET["nomLocalidad"];

                    $consultaidLocalidad = "SELECT id_localidad from localidades where nombre='$nombre'" ;
                    $resultConsultaidLocalidad = mysqli_query ($conn,$consultaidLocalidad)
                    or die ("Fallo en la consulta");
                    $idLocalidad = mysqli_fetch_assoc($resultConsultaidLocalidad);
                    $codLocalidad = ($idLocalidad['id_localidad']);
                    print ("Se procede a la eliminacion de la localidad: ".$nombre.", con codigo ".$codLocalidad."<br>");
                    print ("Borrado correctamente");
                    print ("<a href='borrarLocalidad.php'>Vuelve al fromulario</a>");


                    $consultaAnadir = "DELETE FROM localidades WHERE id_localidad = $codLocalidad" ;
                    $resultConsultaCodEmpleado = mysqli_query ($conn,$consultaAnadir)
                    or die ("Fallo en la consulta");
                } else {
            ?>
            <a href="inicio.php">Inicio</a>
            <div id="login">
            <h2>BORRAR UNA LOCALIDAD POR NOMBRE</h2>
            <form method="get" action="borrarLocalidad.php">
              <label for="nombre">Nombre localidad:</label>
              <input type="text" name="nomLocalidad" id=""><br>

              <input type="submit" value="Conectar">
            </form>
            </div>

           <?php
           }

        ?>
        </main>
        <aside></aside>
    </section>

    <footer></footer>
</body>
</html>
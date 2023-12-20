<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Comunidades y Provincias</title>
</head>
<body>
    <h1>Selecciona una Comunidad</h1>

    <form action="" method="post">
        <label for="comunidad">Comunidad:</label>
        <select name="comunidad" id="comunidad" onchange="this.form.submit()">
            <option value="">Selecciona una comunidad</option>
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

            // Consulta SQL para obtener todas las comunidades
            $sqlComunidades = "SELECT * FROM comunidades";
            $resultComunidades = $conn->query($sqlComunidades);

            // Imprimir las opciones del select
            while ($rowComunidad = $resultComunidades->fetch_assoc()) {
                echo "<option value='" . $rowComunidad['id_comunidad'] . "'>" . $rowComunidad['nombre'] . "</option>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </select>
    </form>

    <?php
// Verificar si se ha seleccionado una comunidad
if (isset($_POST['comunidad']) && !empty($_POST['comunidad'])) {
    // Obtener el ID de la comunidad seleccionada
    $comunidadID = $_POST['comunidad'];

    // Crear una nueva conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para obtener el nombre de la comunidad seleccionada
    $sqlNombreComunidad = "SELECT nombre FROM comunidades WHERE id_comunidad = $comunidadID";
    $resultNombreComunidad = $conn->query($sqlNombreComunidad);

    // Obtener el nombre de la comunidad
    $nombreComunidad = "";
    if ($resultNombreComunidad->num_rows > 0) {
        $rowNombreComunidad = $resultNombreComunidad->fetch_assoc();
        $nombreComunidad = $rowNombreComunidad['nombre'];
    }

    // Imprimir el nombre de la comunidad seleccionada
    echo "<h2>Provincias de la Comunidad seleccionada: $nombreComunidad</h2>";

    // Consulta SQL para obtener todas las provincias de la comunidad seleccionada
    $sqlProvincias = "SELECT * FROM provincias WHERE id_comunidad = $comunidadID";
    $resultProvincias = $conn->query($sqlProvincias);

    // Imprimir las provincias en forma de tabla
    echo "<table border='1'>";
    echo "<tr><th>ID Provincia</th><th>Nombre Provincia</th><th>Superficie</th><th>ID Capital</th><th>ID Comunidad</th></tr>";

    while ($rowProvincia = $resultProvincias->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rowProvincia['n_provincia'] . "</td>";
        echo "<td>" . $rowProvincia['nombre'] . "</td>";
        echo "<td>" . $rowProvincia['superficie'] . "</td>";
        echo "<td>" . $rowProvincia['id_capital'] . "</td>";
        echo "<td>" . $rowProvincia['id_comunidad'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Cerrar la conexión
    $conn->close();
}
?>
</body>
</html>

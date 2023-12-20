<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provincias y Localidades</title>
</head>
<body>

<form method="post" action="">
    <label for="provincia">Selecciona una provincia:</label>
    <select name="provincia" id="provincia">
        <?php
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "victor";
        $password = "arcos";
        $dbname = "geografia";

        // Crear una nueva conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta SQL para obtener las provincias
        $sqlProvincias = "SELECT * FROM provincias";
        $resultProvincias = $conn->query($sqlProvincias);

        // Imprimir las opciones del select con las provincias
        while ($rowProvincia = $resultProvincias->fetch_assoc()) {
            echo "<option value='" . $rowProvincia['n_provincia'] . "'>" . $rowProvincia['nombre'] . "</option>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </select>
    <input type="submit" value="Mostrar Localidades">
</form>
<?php
// Función para obtener el nombre de la provincia a partir de su ID
function obtenerNombreProvincia($idProvincia) {
    global $conn;
    $sql = "SELECT nombre FROM provincias WHERE n_provincia = $idProvincia";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['nombre'];
    }
    return "Desconocido";
}

// Verificar si se ha seleccionado una provincia
if (isset($_POST['provincia']) && !empty($_POST['provincia'])) {
    // Obtener el ID de la provincia seleccionada
    $provinciaID = $_POST['provincia'];

    // Crear una nueva conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para obtener las localidades de la provincia seleccionada
    $sqlLocalidades = "SELECT * FROM localidades WHERE n_provincia = $provinciaID";
    $resultLocalidades = $conn->query($sqlLocalidades);

    // Imprimir las localidades en forma de tabla
    echo "<h2>Localidades de la Provincia seleccionada: " . obtenerNombreProvincia($provinciaID) . "</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID Localidad</th><th>Nombre Localidad</th><th>Población</th><th>ID Provincia</th></tr>";

    while ($rowLocalidad = $resultLocalidades->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rowLocalidad['id_localidad'] . "</td>";
        echo "<td>" . $rowLocalidad['nombre'] . "</td>";
        echo "<td>" . $rowLocalidad['poblacion'] . "</td>";
        echo "<td>" . $rowLocalidad['n_provincia'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Cerrar la conexión
    $conn->close();
}
?>


</body>
</html>

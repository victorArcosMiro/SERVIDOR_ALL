<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Obtener todas las localidades con información de la provincia a la que pertenecen:-->
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

// Consulta SQL
$sql = "SELECT localidades.*, provincias.nombre AS nombre_provincia
        FROM localidades
        JOIN provincias ON localidades.n_provincia = provincias.n_provincia";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Imprimir los datos
    echo "<table border='1'>";
    echo "<tr><th>ID (localidad) </th><th>Nombre (localidad)</th><th>Población (localidad)</th><th>ID Provincia</th><th>Nombre Provincia</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_localidad"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["poblacion"] . "</td>";
        echo "<td>" . $row["n_provincia"] . "</td>";
        echo "<td>" . $row["nombre_provincia"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 resultados encontrados";
}

// Cerrar la conexión
$conn->close();

?>
</body>
</html>
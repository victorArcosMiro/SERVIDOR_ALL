<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Obtener todas las localidades con información de la provincia y la comunidad a la que pertenecen, mostrando solo las que tienen una población superior a cierto valor (por ejemplo, 100,000) -->
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
$sql = "SELECT localidades.*, provincias.nombre AS nombre_provincia, comunidades.nombre AS nombre_comunidad
FROM localidades
JOIN provincias ON localidades.n_provincia = provincias.n_provincia
LEFT JOIN comunidades ON provincias.id_comunidad = comunidades.id_comunidad
WHERE localidades.poblacion > 100000";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Imprimir los datos
    echo "<table border='1'>";
    echo "<tr><th>ID Localidad</th><th>Nombre Localidad</th><th>Población</th><th>ID Provincia</th><th>Nombre Provincia</th><th>ID Comunidad</th><th>Nombre Comunidad</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_localidad"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["poblacion"] . "</td>";
        echo "<td>" . $row["n_provincia"] . "</td>";
        echo "<td>" . $row["nombre_provincia"] . "</td>";

        // Verificar si la clave existe antes de intentar acceder a ella
        echo "<td>";
        if (isset($row["id_comunidad"])) {
            echo $row["id_comunidad"];
        } else {
            echo "N/A";
        }
        echo "</td>";

        echo "<td>";
        if (isset($row["nombre_comunidad"])) {
            echo $row["nombre_comunidad"];
        } else {
            echo "N/A";
        }
        echo "</td>";

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
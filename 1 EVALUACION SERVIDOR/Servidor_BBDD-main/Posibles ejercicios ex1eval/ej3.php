<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Obtener todas las comunidades con información de la localidad que actúa como capital -->
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
$sql = "SELECT comunidades.*, localidades.nombre AS capital_nombre
        FROM comunidades
        JOIN localidades ON comunidades.id_capital = localidades.id_localidad";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Imprimir los datos
    echo "<table border='1'>";
    echo "<tr><th>ID Comunidad</th><th>Nombre Comunidad</th><th>ID Capital</th><th>Nombre Capital</th><th>Máx. Provincias</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_comunidad"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["id_capital"] . "</td>";
        echo "<td>" . $row["capital_nombre"] . "</td>";
        echo "<td>" . $row["max_provincias"] . "</td>";
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
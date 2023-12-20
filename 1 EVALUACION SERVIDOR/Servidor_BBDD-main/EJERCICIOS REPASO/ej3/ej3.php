<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Array de nombres de alumnos
$nombresAlumnos = array("Juan", "María", "Pedro", "Ana", "Carlos", "Laura", "David", "Sofía", "Miguel", "Isabel");

// Array de nombres de asignaturas
$nombresAsignaturas = array("Matemáticas", "Lengua", "Historia", "Ciencias", "Inglés");

// Función para crear un array bidimensional con números aleatorios
function generarCalificacionesAleatorias($alumnos, $asignaturas) {
    $calificaciones = array();

    foreach ($alumnos as $alumno) {
        foreach ($asignaturas as $asignatura) {
            // Generar número aleatorio entre 0 y 10 con dos decimales
            $calificacion = number_format(mt_rand(0, 100) / 10, 2);

            // Asignar la calificación al array bidimensional
            $calificaciones[$alumno][$asignatura] = $calificacion;
        }
    }

    return $calificaciones;
}

// Crear el array bidimensional con calificaciones aleatorias
$calificacionesAleatorias = generarCalificacionesAleatorias($nombresAlumnos, $nombresAsignaturas);

// Imprimir el array bidimensional
echo "<pre>";
print_r($calificacionesAleatorias);
echo "</pre>";
?>


</body>
</html>
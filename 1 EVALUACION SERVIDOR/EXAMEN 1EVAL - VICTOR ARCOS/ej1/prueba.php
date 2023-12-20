<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// CODIGO COMPLETO

// Función para sumar dos matrices
function sumarMatrices($matriz1, $matriz2) {
    $filas = count($matriz1);
    $columnas = count($matriz1[0]);

    // Verificar que las matrices tengan las mismas dimensiones
    if (count($matriz2) != $filas || count($matriz2[0]) != $columnas) {
        return false; // No se pueden sumar matrices de dimensiones diferentes
    }

    // Inicializar una nueva matriz para almacenar la suma
    $resultado = array();

    // Iterar sobre cada elemento y sumarlos
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $resultado[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
        }
    }

    return $resultado;
}

// Definir dos matrices para sumar
$matrizA = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

$matrizB = array(
    array(9, 8, 7),
    array(6, 5, 4),
    array(3, 2, 1)
);

// Llamar a la función para sumar las matrices
$resultadoSuma = sumarMatrices($matrizA, $matrizB);

// Mostrar las matrices y el resultado
echo "Matriz A:\n";
imprimirMatriz($matrizA);

echo "Matriz B:\n";
imprimirMatriz($matrizB);

echo "Resultado de la suma:\n";
imprimirMatriz($resultadoSuma);

// Función para imprimir una matriz
function imprimirMatriz($matriz) {
    foreach ($matriz as $fila) {
        foreach ($fila as $elemento) {
            echo $elemento . " ";
        }
        echo "\n";
    }
    echo "\n";
}
?>

</body>
</html>
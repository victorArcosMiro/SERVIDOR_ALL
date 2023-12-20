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
include('../includes/nav_arrays.php');
?>
<main>
<h4><a href="index.php">Inicio Ejercicios - Arrays</a></h4>
<br>
<h3>Implementación de funciones de arrays.</h3>
<?php
function generarArrayAleatorio($length, $min, $max)
{
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

function eliminarRepetidos($array)
{
    return array_unique($array);
}

function calcularMedia($array)
{
    return array_sum($array) / count($array);
}

$randomArray = generarArrayAleatorio(50, 1, 100);
$uniqueArray = eliminarRepetidos($randomArray);
$average = calcularMedia($uniqueArray);

print "<br>Array aleatorio: " . implode(", ", $randomArray) . "<br>";
print "<br>Array sin duplicados: " . implode(", ", $uniqueArray) . "<br>";
print "<br>Media de los números:".round($average,2)."<br>";
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
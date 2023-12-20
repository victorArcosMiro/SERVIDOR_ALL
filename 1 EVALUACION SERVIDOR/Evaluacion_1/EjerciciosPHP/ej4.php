<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $n1=$_GET["numero1"];
    $n2=$_GET["numero2"];
    $n3=$_GET["numero3"];
    $numeros = [$n1, $n2, $n3];
    sort($numeros);
    echo "Los numeros ordenados: ";
   /* print_r($numeros); */

   $lenght = count($numeros);

    for($i = 0; $i < $lenght; ++$i){
        print $numeros[$i];
    }
    echo " <br>";
    ?>
<a href="ej4.html">Reestablecer datos</a>
</body>
</html>
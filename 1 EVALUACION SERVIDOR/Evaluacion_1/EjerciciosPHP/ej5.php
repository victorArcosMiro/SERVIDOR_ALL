<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $n1 = rand(1, 500);


    echo "El numero aleatorio es: ", $n1, "<br>";
    if($n1>0 && $n1<100){
        echo "El numero esta entre 0 - 100. ";
    }else if($n1>100 && $n1<200){
        echo "El numero esta entre 100 - 200. ";
    }else if($n1>200 && $n1<300){
        echo "El numero esta entre 200 - 300. ";
    }else if($n1>300 && $n1<400){
        echo "El numero esta entre 300 - 400. ";
    }else if($n1>500 && $n1<500){
        echo "El numero esta entre 400 - 500. ";
    }

    ?>
<a href="ej5.html">Reestablecer datos</a>
</body>
</html>
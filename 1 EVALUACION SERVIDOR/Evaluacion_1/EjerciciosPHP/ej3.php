<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $n1=$_REQUEST["num"];
    if($n1<1 || $n1>7){
        echo "El número esta fuera de rango";
    }else{
        switch($n1) {
            case 1:
                echo "El numero ", $n1, " corresponde al Lunes";
                break;
            case 2:
                echo "El numero ", $n1, " corresponde al Martes";
                break;
            case 3:
                echo "El numero ", $n1, " corresponde al Miercoles";
                break;
            case 4:
                echo "El numero ", $n1, " corresponde al Jueves";
                break;
            case 5:
                echo "El numero ", $n1, " corresponde al Viernes";
                break;
            case 6:
                echo "El numero ", $n1, " corresponde al Sabado";
                break;
            case 7:
                echo "El numero ", $n1, " corresponde al Domingo";
                break;
        }
        echo "<br>";
    }
    ?>
<a href="ej3.html">Reestablecer datos</a>
</body>
</html>
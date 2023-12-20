<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $n1=$_GET["num"];
    if($n1%2==0){
        echo "El numero", $n1," es par";

    }else{
        echo "El numero", $n1," es impar";

    }
    ?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <?php
    function comprobarNumerosAmigos($n1,$n2){
        $sumaDivisoresN1 = 0;
        $sumaDivisoresN2 = 0;
        print("Divisores del primer número: ");
        for($i = 1; $i<$n1;$i++){
            if($n1%$i==0){
                $sumaDivisoresN1 += $i;
                print($i."<br>");
            }
        }
        print("Divisores del segundo número: ");
        for($j = 1;$j<$n2; $j++){
            if($n2%$j==0){
                $sumaDivisoresN2 += $j;
                print($j."<br>");
            }
        }
        if($n1==$sumaDivisoresN2 && $n2==$sumaDivisoresN1){
            print($n1." y ". $n2 . "... ¡Son números amigos!");
        }else{
            print($n1." y ". $n2 . "... No son amigos :(");
        }
    }
    ?>
</head>
<body>
    <header>
        <h1>Números amigos</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <?php
    if(isset($_GET['comprobar'])){
        $n1 = $_GET['n1'];
        $n2 = $_GET['n2'];

       comprobarNumerosAmigos($n1,$n2);
    }else{
    ?>
    <h3>Comprobación de números amigos</h3>
    <form action="ej1.php" method="get">
        <label for="n1">Introduce el primer número:</label>
        <input type="number" name="n1" required><br><br>
        <label for="n2">Introduce el segundo número:</label>
        <input type="number" name="n2" required><br><br>
        <input type="submit" name="comprobar" value="Comprobar">
    </form>
    <?php
}
    ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
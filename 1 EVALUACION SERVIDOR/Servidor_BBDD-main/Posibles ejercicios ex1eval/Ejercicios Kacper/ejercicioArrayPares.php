<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1>REPASO 1 EVALUACION</h1></header>

<section>
    <nav></nav>
    <main>
        <div id="inicio"><a id="enlace" href="portada.php">Inicio</a></div>
        <h2>EJERCICIO NUMEROS PARES</h2>

        <?php
        if ($_REQUEST){
            $filas = $_GET["filas"];
            $columnas = $_GET["columnas"];

            $numerosPares = array();
            $contadorPares =0;
            function esPar($x)
                {
                    if ($x%2 == 0) {
                        return true;
                    }else{
                        return false;
                    }
                }

            for ($i=0;$i<1000;$i++){
                if (esPar($i)){
                    $numerosPares[$contadorPares] = $i;
                    $contadorPares++;
                }
            }

            function tablas($n, $m, $numerosPares){
                $contador=1;
                $mult = $n*$m;
                print("<p>Tabla de $n filas y $m columnas con los primeros $mult núperos primos</p>");
                print ("<table class='tablabd'>");
                for ($i=1; $i<=$n; $i++){
                    print ("<tr>");
                    for ($j=1; $j<=$m; $j++){
                        print("<td>".$numerosPares[$contador]."</td>");
                        $contador ++;
                    }
                    print ("</tr>");
                }
                print("</table>");
            }

            tablas($filas, $columnas, $numerosPares);

        }
    ?>
    <h3>Tabla de n filas y m columnas</h3>
    <div id="formulariotabla">
        <form method="get" action="ejercicioArrayPares.php">
            <label for="filas">Introducir el numero de filas de la tabla</label>
            <input type="number" name="filas" id="" min="0" required> <br>
            <label for="columnas">Introducir el numero de columnas de la tabla</label>
            <input type="text" name="columnas" id="" min="0" required><br>
            <input type="submit" value="Enviar">
        </form>
       </div>
    </main>
    <aside></aside>
</section>

<footer></footer>
</body>
</html>
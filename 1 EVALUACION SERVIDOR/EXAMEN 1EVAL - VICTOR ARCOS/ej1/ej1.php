<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .tabla_matrices{
    border: 1px solid blue;
    height: 100px;
    width: 700px;
}
    </style>
</head>
<body>
    <header>
        <h1>EXAMEN 1ª EVALUACIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h1 style="color: red;">EJERCICIO 1</h1>
        <?php
         $matrizA;
         $matrizB;
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
        function generarNumeroAleatorio(){

                $numeroAleatorio = rand(-20, 20);

            return $numeroAleatorio;
        }

        if(isset($_POST['enviar'])){

            $dimension=$_POST['dimension'];

            //Rellenar matrizA
            for($i=0;$i<$dimension;$i++){
                for($j=0;$j<$dimension;$j++){

                       $matrizA[$i][$j] = generarNumeroAleatorio();

                }

            }
            //Rellenar matrizB
            for($k=0;$k<$dimension;$k++){
                for($m=0;$m<$dimension;$m++){

                       $matrizB[$k][$m] = generarNumeroAleatorio();
                }
            }
            $sumaDeMarizes = sumarMatrices($matrizA, $matrizB);

            echo '<h1>RESULTADO</h1>
            <br><p>Con los datos introducidos, el producto de las matrices A y B es:</p><br>
        ';

        echo '<div class="tablas"><table>
            ';
                for($i=0;$i<$dimension;$i++){
                    echo '<tr>';
                    for($j=0;$j<$dimension;$j++){
                        echo "<td class='matriz'>
                                ".$matrizA[$i][$j]."
                            </td>
                        ";
                    }
                    echo '</tr>';
                }

            echo '  </table>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p>&nbsp; X &nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <table>
            ';
                for($i=0;$i<$dimension;$i++){
                    echo '<tr>';
                    for($j=0;$j<$dimension;$j++){
                        echo "<td class='matriz'>
                                ".$matrizB[$i][$j]."
                            </td>
                        ";
                    }
                    echo '</tr>';
                }

            echo '</div></table>';

            echo '  </table>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p>&nbsp; = &nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <table>
            ';
                for($i=0;$i<$dimension;$i++){
                    echo '<tr>';
                    for($j=0;$j<$dimension;$j++){
                        echo "<td class='matriz'>
                                ".$sumaDeMarizes[$i][$j]."
                            </td>
                        ";
                    }
                    echo '</tr>';
                }

            echo '</div></table>';

        }else{
        ?>
        <h3>Suma de matrizes</h3>
        <p>ESta aplicacion resuelve la suma de dos matrices cuadradas de dimensiones NxN cuyos elementos son numeros aleatorios entre -20 y 20. La dimension N no puede ser mayor de 5</p>
        <div class="tabla_matrices">
            <form action="ej1.php" method="post">
                <label for="dimension">Introduce la dimension de las matrices</label>
                <input type="number" name="dimension">
                <input type="submit" name="enviar" value="Enviar">
            </form>
        </div>
        <?php
        }
        ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
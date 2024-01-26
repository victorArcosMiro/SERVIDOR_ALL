<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>CAIDA LIBRE</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php

use Monolog\Handler\FirePHPHandler;

            function tiempo($altura){
                $g = 9.8;
                $t = (2* $altura)/$g;
                $t = sqrt($t);
                return $t;
            }
            function velocidad($tiempo){
                $g = 9.8;
                $velocidad = $g*$tiempo;
                return $velocidad;
            }
            function altura($altura, $tiempo) {
                $g = 9.8;
                $h = $altura - (1/2) * $g * pow($tiempo, 2);
                return $h;
            }
            if(isset($_GET['calcula'])){
                $altura = $_GET['altura'];
                $tiempo = tiempo($altura);
                print "Has selecionado una altura de " . $altura .".<br> Los datos de velocidad y altura en cada instante de tiempo son los sigientes:";
                ?>
                <table>
                <tr>
                    <th>t(s)</th>
                    <th>v<sub>f</sub>(m/s)</th>
                    <th>h(m)</th>
                </tr>

                <?php
                for($i = 0; $i < $tiempo; $i++){
                    ?>
                    <tr>
                        <td>
                            <?php
                                print $i;
                            ?>
                        </td>
                        <td>
                            <?php
                                print velocidad($i);
                            ?>
                        </td>
                        <td>
                            <?php
                                $haltura = altura($altura,$i);
                                print number_format($haltura,1);
                            ?>
                        </td>
                    </tr>
                    <?php
                }

                ?>
                </table>
                <a href="ej1.php">Selecciona otra altura</a>
                <?php
            }else{
    ?>
            <form action="ej1.php" method="get">
                <label for="">Escribe una altura entre 1 y 1000 metros para calcular la caida libre de un objeto:</label><br>
                <input type="text" name="altura"><br>
                <input type="submit" name="calcula" value="Calcula">
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
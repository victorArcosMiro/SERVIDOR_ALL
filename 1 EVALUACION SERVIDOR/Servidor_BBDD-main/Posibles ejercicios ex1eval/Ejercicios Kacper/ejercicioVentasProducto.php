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
            $enero = $_GET["enero"];
            $febrero = $_GET["febrero"];
            $marzo = $_GET["marzo"];
            $abril = $_GET["abril"];
            $mayo = $_GET["mayo"];
            $junio = $_GET["junio"];
            $julio = $_GET["julio"];
            $agosto = $_GET["agosto"];
            $septiembre = $_GET["septiembre"];
            $octubre = $_GET["octubre"];
            $noviembre = $_GET["noviembre"];
            $diciembre = $_GET["diciembre"];

            $ventas = array($enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre);
            
            print ("<table class='tablabd'>
            <tr>
                <th>Mes</th>
                <th>Ventas</th>
            </tr>
            <tr>
                <td>Enero</td>
                <td>$enero</td>
            </tr>
            <tr>
                <td>Febrero</td>
                <td>$febrero</td>
            </tr>
            <tr>
                <td>Marzo</td>
                <td>$marzo</td>
            </tr>
            <tr>
                <td>Abril</td>
                <td>$abril</td>
            </tr>
            <tr>
                <td>Mayo</td>
                <td>$mayo</td>
            </tr>
            <tr>
                <td>junio</td>
                <td>$junio</td>
            </tr>
            <tr>
                <td>Julio</td>
                <td>$julio</td>
            </tr>
            <tr>
                <td>Agosto</td>
                <td>$agosto</td>
            </tr>
            <tr>
                <td>Septiembre</td>
                <td>$septiembre</td>
            </tr>
            <tr>
                <td>Octubre</td>
                <td>$octubre</td>
            </tr>
            <tr>
                <td>Noviembre</td>
                <td>$noviembre</td>
            </tr>
            <tr>
                <td>Diciembre</td>
                <td>$diciembre</td>
            </tr>
        </table>");

        $maxima = max($ventas);
        $minima = min($ventas);
        
        $suma = 0;

        for ($i=0; $i<count($ventas);$i++){
            /*Una forma de hacerlo
            $maxima = PHP_INT_MIN ;
            $minima = PHP_INT_MAX;*/
            $suma = $suma + $ventas[$i];
            
        }
        $media = $suma/count($ventas);

        print ("<table class='tablabd'>
            <tr>
                <th>Venta media</th>
                <th>Ventas máxima</th>
                <th>Ventas mínima</th>
            </tr>
            <tr>
                <td>$media</td>
                <td>$maxima</td>
                <td>$minima</td>
            </tr>
        </table>");

        }else {
    ?>
    <div id="formulariotabla">
        <form method="get" action="ejercicioVentasProducto.php">
            <table class='tablabd'>
                <tr>
                    <th>Mes</th>
                    <th>Ventas</th>
                </tr>
                <tr>
                    <td><label for="Enero">Enero</label></td>
                    <td><input type="number" name="enero" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Febrero">Febrero</label></td>
                    <td><input type="number" name="febrero" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Marzo">Marzo</label></td>
                    <td><input type="number" name="marzo" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Abril">Abril</label></td>
                    <td><input type="number" name="abril" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Mayo">Mayo</label></td>
                    <td><input type="number" name="mayo" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Junio">Junio</label></td>
                    <td><input type="number" name="junio" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Julio">Julio</label></td>
                    <td><input type="number" name="julio" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Agosto">Agosto</label></td>
                    <td><input type="number" name="agosto" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Septiembre">Septiembre</label></td>
                    <td><input type="number" name="septiembre" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Octubre">Octubre</label></td>
                    <td><input type="number" name="octubre" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Noviembre">Noviembre</label></td>
                    <td><input type="number" name="noviembre" id="" min="0" required></td>
                </tr>
                <tr>
                    <td><label for="Diciembre">Diciembre</label></td>
                    <td><input type="number" name="diciembre" id="" min="0" required></td>
                </tr>
            </table>
            <input type="submit" value="Enviar">
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
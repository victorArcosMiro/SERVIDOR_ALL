<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <h1>Datos de ventas anules.</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <?php
        if(isset($_POST['enviar'])){
            // Inicializar el array para almacenar los valores de los meses
            $meses = array();

            // Recorrer cada mes y recuperar su valor
            $nombres_meses = array(
                "enero", "febrero", "marzo", "abril", "mayo", "junio",
                "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
            );
            $ventaMedia = 0;
            foreach ($nombres_meses as $mes) {
                // Verificar si el mes está presente en los datos POST
                if (isset($_POST[$mes])) {
                    // Almacenar el valor en el array asociativo
                    $meses[$mes] = $_POST[$mes];
                } else {
                    // Si el mes no está presente, asignar un valor por defecto (puede ser 0, null, etc.)
                    $meses[$mes] = 0;
                }
            }
            asort($meses);
            $primerValor =  reset($meses);
            $ultimoValor =  end($meses);
            $media = array_sum($meses) / count($meses);

             //Imprimir los valores del array
             ?>
             <h2>Resultado ventas</h2>
             <table>
                <tr>
                    <th>Mes</th>
                    <th>Ventas</th>
                </tr>

             <?php
            foreach ($meses as $nombre_mes => $valor) {
                ?>
                <tr>

                    <td><?php print(str_pad($nombre_mes, 4, '0', STR_PAD_LEFT)) ?></td>
                    <td><?php print(str_pad($valor, 4, '0', STR_PAD_LEFT)) ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
            <br>
            <table>
                <tr>
                    <th>Venta media</th>
                    <th>Venta máxima</th>
                    <th>Venta mínima</th>
                </tr>
                <tr>
                    <td> <?php print(str_pad(number_format($media, 2), 4, '0', STR_PAD_LEFT)) ?></td>
                    <td> <?php print(str_pad($ultimoValor, 4, '0', STR_PAD_LEFT)) ?></td>
                    <td> <?php print(str_pad($primerValor, 4, '0', STR_PAD_LEFT)) ?></td>
                </tr>
            </table>

            <?php
                }else{
            ?>
            <h2>Formulario petición ventas</h2>
            <form action="ej2.php" method="post">
            <table>
                <tr><th>Mes</th><th>Ventas</th></tr>
                <tr>
                    <td>Enero:</td>
                    <td><input type="number" name="enero" required></td>
                </tr>
                <tr>
                    <td>Febrero:</td>
                    <td><input type="number" name="febrero" required></td>
                </tr>
                <tr>
                    <td>Marzo:</td>
                    <td><input type="number" name="marzo" required></td>
                </tr>
                <tr>
                    <td>Abril:</td>
                    <td><input type="number" name="abril" required></td>
                </tr>
                <tr>
                    <td>Mayo:</td>
                    <td><input type="number" name="mayo" required></td>
                </tr>
                <tr>
                    <td>Junio:</td>
                    <td><input type="number" name="junio" required></td>
                </tr>
                <tr>
                    <td>Julio:</td>
                    <td><input type="number" name="julio" required></td>
                </tr>
                <tr>
                    <td>Agosto:</td>
                    <td><input type="number" name="agosto" required></td>
                </tr>
                <tr>
                    <td>Septiembre:</td>
                    <td><input type="number" name="septiembre" required></td>
                </tr>
                <tr>
                    <td>Octubre</td>
                    <td><input type="number" name="octubre" required></td>
                </tr>
                <tr>
                    <td>Noviembre:</td>
                    <td><input type="number" name="noviembre" required></td>
                </tr>
                <tr>
                    <td>Diciembre:</td>
                    <td><input type="number" name="diciembre" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="enviar" value="Enviar">
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
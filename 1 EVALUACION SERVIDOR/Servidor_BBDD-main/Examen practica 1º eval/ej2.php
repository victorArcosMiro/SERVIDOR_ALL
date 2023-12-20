<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <?php
function esPrimo($numero){
    for($i=2;$i<$numero;$i++){
        if($numero%$i == 0){
            return false;
        }else{
            return true;
        }
    }
}
function tablaNxM($filas, $columnas, $numerosPrimos){
    $cont=0;
    for($c=1;$c<=$columnas;$c++){
        print("<tr>");
        for($f=1;$f<=$filas;$f++){
            print("<td>");
            print($numerosPrimos[$cont]);
            print("</td>");
            $cont++;
        }
        print("</tr>");
    }
}
  ?>
</head>
<body>
  <header>
    <h1>REPASO 1ª EVALUACIÓN</h1>
  </header>
  <section>
    <nav></nav>
    <main>
        <div class="enlace">
            <a href="index.html">Inicio</a>
        </div>
      <div class="main">
        <h2>EJERCICIO 2</h2>
        <br>
        <div class="ejercicio">
            <?php
            if(isset($_GET['enviar'])){
                $filas = $_GET['filas'];
                $columnas = $_GET['columnas'];

                $cantidadPrimos = $filas * $columnas;

                $numerosPrimos = [];
                $iterador = 1;
                $cont= 0;

                while(count($numerosPrimos)<$cantidadPrimos){
                    if(esPrimo($iterador)){
                        $numerosPrimos[$cont] = $iterador;
                        $cont++;
                    }
                    $iterador++;
                }
                ?>
                <div class="tabla">
                    <h3>Tabla de <?php print($filas) ?> filas y <?php print($columnas)?> columnas con los <?php print($cantidadPrimos) ?> números primos.</h3><br>
                <table>
                <?php
                tablaNxM($filas, $columnas, $numerosPrimos);
                ?>
                </table>
                </div>
                <?php

            }
               ?>
               <h3>Tabla de <em>n</em> filas y <em>m</em> columnas</h3>
               <div class="formulario">

               <form action="ej2.php" method="get">
                <label for="filas">Introduzca el número filas de la tabla: </label>
                <input type="number" name="filas"><br><br>
                <label for="columnas">Introduzca el número de columnas: </label>
                <input type="text" name="columnas" required><br><br>
                <input type="submit" name="enviar" value="Enviar">
               </form>
               </div>
        </div>
      </div>
    </main>
    <aside></aside>
  </section>
  <footer></footer>
</body>
</html>
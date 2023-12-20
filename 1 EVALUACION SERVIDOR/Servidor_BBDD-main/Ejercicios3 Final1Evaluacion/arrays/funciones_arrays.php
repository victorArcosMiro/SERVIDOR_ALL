<?php
//Array que contiene nombre de equipos (claves) y puntos obtenidos en la liga (valor).
//Se supone que no va a haber 2 equipos con la misma puntuación.
$listaEquipos = [
    "F.C. Barcelona"  => 82,
    "Real Madrid"     => 84,
    "Atlético Madrid" => 78,
    "Valencia"        => 75,
    "Sevilla"         => 76,
    "Villarreal"      => 60,
    "Málaga"          => 50,
    "Espanyol"        => 47,
    "Athletic Bilbao" => 55,
    "Celta"           => 51,
    "Real Sociedad"   => 46,
    "Rayo Vallecano"  => 49,
    "Getafe"          => 36,
    "Osasuna"         => 33,
    "Elche"           => 41,
    "Deportivo"       => 38,
    "Almería"         => 29,
    "Levante"         => 37,
    "Granada"         => 35,
    "Zaragoza"        => 32];

function dibujarArray($array)
{
    print "<h2>DATOS DEL ARRAY RECIBIDO</h2>";
    print "<table>";
    print "<tr>";
    print "<th>INDICE</th>";
    print "<th>VALOR</tdh";
    print "</tr>";
    foreach ($array as $indice => $valor) {
        print "<tr>";
        print "<td>$indice</td>";
        print "<td>$valor</td>";
        print "</tr>";
    }
    print "</table>";
}

function dibujarArrayOrdenadoPorValor($array)
{
    //Primero ordenamos el array por valor de mayor a menor.
    //No se va a utilizar la llamada a rsort($array) ya que entonces ordena por valor
    //pero convierte a indices escalares con lo que perdemos las claves.
    //Mejor utilizamos arsort para que conserve  los índices originales
    //respetando cada índice con su correspondiente valor.
    arsort($array);
    print "<h2>DATOS DEL ARRAY RECIBIDO ORDENADOS POR VALOR</h2>";
    print "<table>";
    print "<tr>";
    print "<th>INDICE</th>";
    print "<th>VALOR</tdh";
    print "</tr>";
    foreach ($array as $indice => $valor) {
        print "<tr>";
        print "<td>$indice</td>";
        print "<td>$valor</td>";
        print "</tr>";
    }
    print "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include('../includes/meta_datos.php');
    ?>
<body>
<?php
include('../includes/header.php');
include('../includes/nav_header.php');
?>
<section>
<?php
include('../includes/nav_arrays.php');
?>
<main>
<h4><a href="index.php">Inicio Ejercicios - Arrays</a></h4>
<br>
<h3>Funciones de arrays.</h3>
<br>
<?php
if (!$_REQUEST) {
    print "<form action='funciones_arrays.php' method='GET'>";
    print "<label for='desplegable' style='font-size:12pt;'>Elija el equipo:&nbsp;</label>";
    print "<select id='desplegable' name='nombreEquipo'>";

    //Ordenamos el array por clave para que el menú de selección muestre los equipos en orden alfabético
    ksort($listaEquipos);

    foreach($listaEquipos as $nombre => $p) {
        print "<option value='$nombre'>$nombre</option>";
    }
    print "</select><br><br>";
    print "<input type='submit' value='Comprobar'/>";
    print "</form>";
    print "<br><br>";

    dibujarArray($listaEquipos);

} else {
    //Obtenemos el nombre del equipo a consultar
    $nombreEquipo = $_REQUEST["nombreEquipo"];

    //Obtenemos los puntos del equipo que nos interesa
    $puntos = $listaEquipos[$nombreEquipo];

    $lista=$listaEquipos;   //Guardamos la lista en una variable auxiliar para no perder los índices
    rsort($listaEquipos);   //Este comando ordena la lista de equipos por puntos y convierte el índice a escalar

    //Se obtiene la posición del equipo en el array convertido a array escalar
    $posicion = array_search($puntos, $listaEquipos) + 1;

    //Mostramos los resultados obtenidos
    print "<br><p>El $nombreEquipo tiene $puntos puntos, ahora mismo es el ".$posicion."º en la clasificación.</p>";
    print "<br><a href='funciones_arrays.php'>Nueva consulta</a><br>";
    dibujarArrayOrdenadoPorValor($lista);
}
?>
</main>
<?php
include('../includes/aside.php');
?>
</section>
<?php
include('../includes/footer.php');
?>
</body>
</html>
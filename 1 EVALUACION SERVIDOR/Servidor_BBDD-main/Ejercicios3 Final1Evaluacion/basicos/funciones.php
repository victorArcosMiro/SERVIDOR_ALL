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
include('../includes/nav_basicos.php');
?>
<main>
    <h4><a href="index.php">Inicio Ejercicios básicos</a></h4>
    <h3>Tabla de conversiones</h3><br>
<?php
if(isset($_GET['enviar'])){
    $dolar = $_GET["dolar"];
    $libra = $_GET["libras"];
    $fecha = new DateTime();
    print "<h2>CAMBIO DE DIVISAS A FECHA DE " . $fecha->format('d-m-Y') . "</h2>
    <br>
    <table class='tabla-alternante'>
      <tr>
          <th>Euros</th>
          <th>Dolares</th>
          <th>Libras</th>
      <tr>
    ";

    for($num1=1;$num1<=10;$num1++){
      print " <tr class>
                  <td>$num1</td>
                  <td>" .$num1*$dolar . "</td>
                  <td>" .$num1*$libra . "</td>
              </tr>
      ";
    }
    print "</table>";
}else{
    echo '
    <form action="funciones.php" method="GET">
        <label for="dolar">Cambio de 1 euro a dólares estadounidenses: </label>
        <input type="number" name="dolar" step="0.0001" required><br>
        <label for="libras">Cambio de 1 euro a libras esterlinas: </label>
        <input type="number" name="libras" step="0.0001" required>
        <br>
        <input type="submit" name="enviar" value="Enviar">
      </form>
    ';
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
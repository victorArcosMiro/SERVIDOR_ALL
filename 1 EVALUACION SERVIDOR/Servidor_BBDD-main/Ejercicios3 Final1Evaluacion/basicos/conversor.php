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
    <h3>Conversor de monedas</h3><br>
<?php
if(isset($_POST['convertir'])){
    $euros = $_POST["euros"];
    $currencySelecionada = $_POST["moneda"];
    switch ($currencySelecionada){
        case "dolar":
            print "- ".$euros . "€  son " . $euros*1.08 . "$.";
            break;
        case "libra":
            print "- ".$euros. "€  son " . $euros*0.87 . "£.";
            break;
        default:
            echo "Opcion no reconocida";
    }
}else{
    echo '
    <form action="conversor.php" method="POST">
    <label for="euros">Introduce la cantidad de euros a convertir:</label>
    <input type="number" name="euros"><br><br><br>
    <label for="moneda">Selecciona moneda de destino:</label>
    <select name="moneda">
      <option value="dolar">Dolares estadounidenses ($)</option>
      <option value="libra">Libras estelinas (£)</option>
    </select>
    <br><br><br>
    <input type="submit" name="convertir" value="Convertir">
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
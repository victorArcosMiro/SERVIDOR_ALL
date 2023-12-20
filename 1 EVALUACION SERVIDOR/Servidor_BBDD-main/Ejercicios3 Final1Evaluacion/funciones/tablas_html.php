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
include('../includes/nav_funciones.php');
?>
<main>
<h4><a href="index.php">Inicio Ejercicios - Funciones</a></h4><br>
<h3>Creación de tablas con funciones.</h3><br>
<?php
 function tablaNxM($n,$m)
 {
     echo "<h1>TABLA HTML DE $n x $m</h1>";
     echo "<table border='1'; style='min-width:100%;'>";
     $numero=1;
     for ($i=1;$i<=$n;$i++)
     {
         echo '<tr>' ;
         for ($j=1;$j<=$m;$j++)
         {
             echo '<td>';
             echo $numero;
             echo '</td>';
             $numero++;
         }
         echo '</tr>';
     }
     echo "</table>";
 }

 //Varias llamadas a la función para probarla
 tablaNxM(5,7);

 $nfilas=6;
 $ncolumnas=3;
 tablaNxM($nfilas,$ncolumnas);

 echo '</div><div>';

 $nfilas=10;
 $ncolumnas=10;
 tablaNxM($nfilas,$ncolumnas);

 $nfilas=2;
 $ncolumnas=15;
 tablaNxM($nfilas,$ncolumnas);

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
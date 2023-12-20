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
<h4><a href="index.php">Inicio Ejercicios - Funciones</a></h4>
<br>
<h3>Pruebas de función para números perfectos.</h3>
<br>
<?php
					function sumadivisores($n)
					{
						$sumadiv = 1;
						for($i = 2; $i <= $n/2; $i++) {		//Realiza divisiones con divisores desde 2 hasta n/2, los números mayores de n/2 no serán divisores del número
							if($n % $i == 0) {
								$sumadiv += $i;
							}
						}
						return $sumadiv;
					}

					function esperfecto($n)
					{
						if ($n == sumadivisores($n)) {
							return true;
						}

						return false;
					}


				$n1 = 28;
				echo "La suma de divisores  de $n1 es: ",sumadivisores($n1),"<br/>";
				if (esperfecto($n1)) {
					print "El número $n1 SI es perfecto<br/><br/>";
				} else {
					print "El número $n1 NO es perfecto<br/><br/>";
				}

				$n1 = 35;
				echo "La suma de divisores  de $n1 es: ",sumadivisores($n1),"<br/>";
				if (esperfecto($n1)) {
					print "El número $n1 SI es perfecto<br/><br/>";
				} else {
					print "El número $n1 NO es perfecto<br/><br/>";
				}

				// Ahora vamos a calcular y mostrar los números perfectos del 1 al 5000
				print "Los números perfectos del 1 al 5000 son:<br/>";
				for ($i = 1; $i <= 5000; $i++) {
					if(esperfecto($i)) {
						print "$i, ";
					}
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
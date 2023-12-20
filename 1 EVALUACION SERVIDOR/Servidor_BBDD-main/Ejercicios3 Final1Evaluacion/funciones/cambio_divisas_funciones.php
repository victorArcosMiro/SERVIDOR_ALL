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
<h3>Pruebas de función para el cambio de divisas.</h3>

<br><br>
<?php
                function conversordemonedas($euros, $divisa) //El parámetro $divisa significa la divisa destino, de la siguiente forma: 0 serán dolares y 1 serán libras
                {
                    if ($divisa == 0) {
                        $dolar = $euros * 1.0563;
                        return $dolar; // aquí devuelve el resultado en dólares
                    }

                    $libras = $euros * 0.8678;
                    return $libras; // aquí devuelve el resultado en libras

                }


            $moneda    = rand(0, 1);
            $cantidad  = rand(1, 100);
            $resultado = conversordemonedas($cantidad, $moneda);
            if ($moneda == 0) {
                print "El resultado de convertir $cantidad euros a dolares es: $resultado USD<br/><br/>";
            } else {
                print "El resultado de convertir $cantidad euros a libras es: $resultado £<br/><br/>";
            } //Símbolo de la libra esterlina: Alt + 0163

            $moneda    = mt_rand(0, 1);       //Generador de números pseudo-aleatorios más eficiente, pero no seguro para encriptación
            $cantidad  = rand(1, 100);
            $resultado = conversordemonedas($cantidad, $moneda);
            if ($moneda == 0) {
                print "El resultado de convertir $cantidad euros a dolares es: $resultado USD<br/><br/>";
            } else {
                print "El resultado de convertir $cantidad euros a libras es: $resultado £<br/><br/>";
            }

            print mt_srand(time());      //Se puede tomar la hora del ordenador como semilla para el generador mt_rand
            $moneda    = mt_rand(0, 1);
            $cantidad  = rand(1, 100);
            $resultado = conversordemonedas($cantidad, $moneda);
            if ($moneda == 0) {
                print "El resultado de convertir $cantidad euros a dolares es: $resultado USD<br/><br/>";
            } else {
                print "El resultado de convertir $cantidad euros a libras es: $resultado £<br/><br/>";
            }

            $moneda = random_int(0, 1);    //Criptográficamente más seguro. También se puede usar random_bytes(),
            //openssl_random_pseudo_bytes() o uniqid(), este último basado en la hora actual en microsegundos
            //Los dos primeros generan números binarios y el tercero números hexadecimales. Se puede pasar de
            //binario a hexadecimal con el comando bin2hex() o a decimal con el comando bindec()
            $cantidad  = rand(1, 100);
            $resultado = conversordemonedas($cantidad, $moneda);
            if ($moneda == 0) {
                print "El resultado de convertir $cantidad euros a dolares es: $resultado USD<br/><br/>";
            } else {
                print "El resultado de convertir $cantidad euros a libras es: $resultado £<br/><br/>";
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
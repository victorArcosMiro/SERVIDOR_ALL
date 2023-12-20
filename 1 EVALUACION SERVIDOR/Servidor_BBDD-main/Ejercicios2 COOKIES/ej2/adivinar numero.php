<?php
// Inicia la sesión para acceder a las cookies
session_start();
?>
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
        <h1>JUEGO DE ADIVINAR NÚMERO</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <?php
            $num = rand(1, 10);
            $_SESSION['numero'] = $num;

            $cont = 0;
            $_SESSION['cont'] = $cont;

            if(isset($_POST['reset'])){
                session_destroy();
                header("Location: adivinar_numero.php");
                exit();
            }
            if(isset($_POST['probar'])){
                $prueba = $_POST['numero'];
                if($num == $prueba){
                    print("Fantaastico!! Adivinaste el número");

                }else{
                    $_SESSION['cont']++;
                    if($prueba > $num){
                        print ("El numero es menor que "  . $prueba . ".");
                        print ("Lleva usted " .  $_SESSION['cont'] . " intentos");
                }
            }
            }else{
                ?>
                <form action="adivinar numero.php" method="post">
                <label for="numero">Número: </label>
                <input type="text" name="numero"><br>
                <input type="submit" name="probar" value="Probar">
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
<?php
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
        <h1>EXAMEN 1ª EVALUACIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <h1 style="color: red;">EJERCICIO 2</h1>
            <?php
            if(isset($_POST['cerrar_sesion'])) {
                unset($_SESSION['aciertos']);
                unset($_SESSION['errores']);

            }
             if(!isset($_SESSION['aciertos']) || !isset($_SESSION['errores'] )){
                $_SESSION['aciertos']=0;
                $_SESSION['errores']=0;
             }else{
    $comunidades = ["Andalucía", "Aragón", "Principado de Asturias",
        "Islas Baleares", "Canarias", "Cantabria", "Castilla y León",
        "Castilla La Mancha", "Cataluña", "Comunidad Valenciana",
        "Extremadura", "Galicia", "Comunidad de Madrid", "Región de
            Murcia", "Comunidad Foral de Navarra", "País Vasco", "La Rioja",
        "Ceuta", "Melilla"];
    $capitales = ["Sevilla", "Zaragoza", "Oviedo", "Palma de
            Mallorca", "Santa Cruz de Tenerife y Las Palmas de Gran Canaria",
        "Santander", "Valladolid", "Toledo", "Barcelona", "Valencia",
        "Mérida", "Santiago de Compostela", "Madrid", "Murcia", "Pamplona",
        "Vitoria-Gasteiz", "Logroño", "Ceuta", "Melilla"];

    function generarArrayAsociativo($comunidades, $capitales)
    {
        $comunidadesYcapitales = [];

        foreach($comunidades as $comunidad) {
            foreach($capitales as $capital) {
                $comunidadesYcapitales[$comunidad] = $capital;
            }
        }
        return $comunidadesYcapitales;
    }
    $arrayAsociativo = generarArrayAsociativo($comunidades, $capitales);
    if(isset($_POST['comprobar'])) {
        $comunidad = $_POST['comunidades'];
        $capital   = $_POST['capitales'];

        if(array_search($comunidad, $comunidades) == array_search($capital, $capitales)) {
            print "<h2>Resultado de la consulta: Acierto</h2>";
            print $capital . " SI es la capital de " . $comunidad;
            $_SESSION['aciertos']++;
        } else {
            print "<h2>Resultado de la consulta: Error</h2>";
            print $capital . " NO es la capital de " . $comunidad;
            $_SESSION['errores']++;

        }
        print "<br>Llevas " . $_SESSION['aciertos'] . " aciertos y " . $_SESSION['errores'] . " fallos.";
        echo "<form action='ej1.php' method='post'>
        <a href='eh1.php'><button type='submit' name='cerrar_sesion'>Volver a empezar</button></a>
    </form>";
    }

    ?>
             <h1>Autonomias y Capitales</h1>
             <p>Esta aplicación es un juego sobre conocimientos de geografia política de España</p>
             <h2>Enlaza la ciudad con la región a la que pertenece</h2>
             <form action="ej1.php" method="post">
                <!---->
                <label for="comunidades">Elige la comunidad</label>
                <select name="comunidades">
                    <?php
           for($i = 0; $i < count($comunidades); $i++) {
               print '<option value="' . $comunidades[$i] . '">' . $comunidades[$i] . '</option>';
           }
    ?>
                </select>
                <br><br>
                <!---->
                <label for="capitales">Elige la comunidad</label>
                <select name="capitales">
                    <?php
    for($i = 0; $i < count($comunidades); $i++) {
        print '<option value="' . $capitales[$i] . '">' . $capitales[$i] . '</option>';
    }
    ?>
                </select>
                <input type="submit" name="comprobar" value="Comprobar">
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
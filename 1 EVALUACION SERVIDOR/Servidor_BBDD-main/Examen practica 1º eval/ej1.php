<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <?php
  function letraNIF($numero){
    $letrasDni = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    $posicion = $numero%23;
    return $letrasDni[$posicion];
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
        <h2>EJERCICIO 1</h2>
        <br>
        <div class="ejercicio">
            <?php
            if(isset($_GET['enviar'])){
                $numero=$_GET['ndni'];
                $letra = $_GET['ldni'];

                $letraComprobada = letraNIF($numero);
                if($letraComprobada == strtoupper($letra)){
                    print("El NIF " . $numero . $letra . " es correcto");
                }else{
                    print("El NIF " . $numero . $letra . " es incorrecto");
                }
                ?>
                <br><a href="ej1.php">Volver al formulario</a>
                <?php
            }else{
               ?>
               <form action="ej1.php" method="get">
                <label for="ndni">Introduzca el número de DNI: </label>
                <input type="number" name="ndni" pattern="" required><br><br>
                <label for="ldni">Introduzca la letra del NIF correspondiente: </label>
                <input type="text" name="ldni" maxlength="1" required><br><br>
                <input type="submit" name="enviar" value="Enviar">
                <input type="reset" value="Borrar">
               </form>
               <?php
            }
            ?>
        </div>
      </div>
    </main>
    <aside></aside>
  </section>
  <footer></footer>
</body>
</html>
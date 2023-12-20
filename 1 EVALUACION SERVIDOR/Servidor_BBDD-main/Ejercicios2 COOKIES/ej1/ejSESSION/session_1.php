<?php
// Inicia la sesión para acceder a las cookies
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style.css">

</head>
<body>
    <header>
        <h1>USO DE VARIABLES DE SESIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <h3>Inicio de sesión</h3>
            <?php
            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $color = $_POST['color'];
               $_SESSION['nombre'] = $nombre;
               $_SESSION['color'] = $color;
                header("Location: session_2.php");
                exit();
            }else{
                ?>
                <form action="session_1.php" method="post">
                <label for="nombre">Escribe tu nombre: </label>
                <input type="text" name="nombre"><br>
                <label for="color">Elige un color</label>
                <select name="color" id="color">
                    <option value="red">Rojo</option>
                    <option value="blue">Azul</option>
                    <option value="yellow">Amarillo</option>
                </select>
                <input type="submit" name="enviar" value="Enviar">
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
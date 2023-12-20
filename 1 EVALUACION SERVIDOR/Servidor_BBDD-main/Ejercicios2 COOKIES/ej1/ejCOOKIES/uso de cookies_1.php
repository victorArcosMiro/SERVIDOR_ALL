<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style.css">

</head>
<body>
    <header>
        <h1>USO DE COOKIES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h3>Inicio de sesión</h3>
            <?php
            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $color = $_POST['color'];
                setcookie('nombre', $nombre,time() + 3600, "/", "");
                setcookie('color', $color, time() + 3600, "/", "");
                header("Location: uso de cookies_2.php");
                exit();
            }else{
                ?>
                <form action="uso de cookies_1.php" method="post">
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
</body>
</html>
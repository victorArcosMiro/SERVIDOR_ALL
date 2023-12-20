
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style.css">
    <?php
            $nombre = $_COOKIE['nombre'];
            $color = $_COOKIE['color'];
            ?>
</head>
<body>
    <header>
        <h1>USO DE COOKIES</h1>
    </header>
    <section>
        <nav></nav>
        <main  style="background-color: <?php echo $color; ?>;">
            <h3>Interfaz de usuario personalizada</h3>
            <p>Bienvenido, <?php echo $nombre; ?>.</p>
            <p>Pincha en este <a href="uso de cookies_3.php">enlace</a> para comprovar que el cliente envia correctamente las cookies al servidor.</p>
        </main>
        <aside></aside>
    </section>
</body>
</html>
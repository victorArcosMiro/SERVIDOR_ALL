
<?php
// mantenemos sesion iniciada
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style.css">
    <?php
        $nombre = $_SESSION['nombre'];
        $color = $_SESSION['color'];
    ?>
</head>
<body>
    <header>
        <h1>USO DE VARIABLES DE SESIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main  style="background-color: <?php echo $color; ?>;">
            <h3>Interfaz de usuario personalizada</h3>
            <p>Bienvenido, <?php echo $nombre; ?>.</p>
            <p>Pincha en este <a href="session_3.php">enlace</a> para comprobar que el cliente envia correctamente las cookies al servidor.</p>
        </main>
        <aside></aside>
    </section>
</body>
</html>
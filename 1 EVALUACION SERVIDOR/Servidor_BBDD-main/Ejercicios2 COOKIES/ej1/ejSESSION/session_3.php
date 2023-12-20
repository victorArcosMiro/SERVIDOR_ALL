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
            <h3>Variables de sesion recibidas</h3>
            <p>Usuario identificado: <?php echo $nombre; ?>.</p>
            <a href="session_1.php">Volver al formulario</a>
        </main>
        <aside></aside>
    </section>
</body>
</html>
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicio</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header><h1>REPASO 1 EVALUACION</h1></header>

    <section>
        <nav></nav>
        <main>
            <?php
             if (isset($_SESSION["usuario"])){
                if (!isset($_GET["cerrarSesion"])) {
                    print '<div id="boton">
                   <p>Nombre: '. $_SESSION["usuario"] . '</p>
                   <form action="inicio.php" method="get">
                     <input type="submit" name="cerrarSesion" value="Cerrar sesion">
                   </form>
                   </div>';
                }else {
                   session_destroy();
                   header("Location: ../../portada.php");
                   exit();
                }
            ?>
            <a href="../../portada.php">Inicio - Portada</a>
           <div id="botones">
            <a href="añadirLocalidades.php"> <input type="button" value="Añadir localidad"></a>
            <a href="provinciasDeComunidad.php"> <input type="button" value="Provincias de Comunidades"></a>
            <a href="borrarLocalidad.php"> <input type="button" value="Borrar localidad"></a>
           </div>

           <p>Tabla ordenador por orden alfabetico</p>
           <div id="botones">
            <a href="localidadOrdenada.php"> <input type="button" value="Ver lista de localidades ordenada alfabeticamente"></a>
           </div>

           <?php
        } else {
        echo '<p>Esta seccion tiene el acceso restringido a usuarios registrados en la base de datos, por favor <a href="login.php">identifiquese</a> o <a href="register.php">regístrese</a></p>';
        }
        ?>
        </main>
        <aside></aside>
    </section>

    <footer></footer>
</body>
</html>
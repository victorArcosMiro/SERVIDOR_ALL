<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
class Menu
{
    public $dia;
    public $fecha;
    public $primerosPlatos = [];
    public $segundosPlatos = [];
    public $postres        = [];

    // Constructor
    public function __construct($dia = "", $fecha = "")
    {
        $this->dia   = $dia;
        $this->fecha = $fecha;
    }

    // GETTERS
    public function getDia(): string
    {
        return $this->dia;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function getPrimerosPlatos(): array
    {
        return $this->primerosPlatos;
    }

    public function getSegundosPlatos(): array
    {
        return $this->segundosPlatos;
    }

    public function getPostres(): array
    {
        return $this->postres;
    }

    // SETTERS
    public function setDia(string $dia): void
    {
        $this->dia = $dia;
    }

    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }
    public function setPrimerosPlatos(array $primerosPlatos): void
    {
        $this->primerosPlatos = $primerosPlatos;
    }
    public function setSegundosPlatos(array $segundosPlatos): void
    {
        $this->segundosPlatos = $segundosPlatos;
    }
    public function setPostres(array $postres): void
    {
        $this->postres = $postres;
    }

    // Función para mostrar todos los datos de la clase
    public function mostrarPrimerosPlatos(): void
    {
        if (!empty($this->primerosPlatos)) {
            foreach ($this->primerosPlatos as $plato) {

                print $plato . "<br>";
            }
        }
    }
    public function mostrarSegundosPlatos(): void
    {
        if (!empty($this->segundosPlatos)) {
            foreach ($this->segundosPlatos as $plato) {

                print $plato . "<br>";
            }
        }
    }
    public function mostrarPostres(): void
    {
        if (!empty($this->postres)) {
            foreach ($this->postres as $plato) {

                print $plato . "<br>";
            }
        }
    }
}
?>
<header>
    <h1>RESTAURANTE</h1>
</header>
<section>
    <nav></nav>
    <main>
        <?php

if ($_REQUEST) {
    if(isset($_REQUEST["crear"])) {
        $dia   = $_GET['dia'];
        $fecha = $_GET['fecha'];

        $menu = new Menu();
        $menu->setDia($dia);
        $menu->setFecha($fecha);
        $menu_serializado = serialize($menu);
        //Se guarda la cadena de texto (objeto) en una variable de session
        $_SESSION['menu'] = $menu_serializado;
    }

    if(isset($_SESSION['menu'])) {

        // Deserializa la cadena para obtener el objeto original
        $menu = unserialize($_SESSION['menu']);

        if (isset($_GET['agregarPrimerPlato'])) {
            //Recupero el nuevo plato introducido por formulario
            $nuevoPrimerPlato = $_GET['pPlato'];
            if(strlen($nuevoPrimerPlato) > 0) {
                //Obtengo los platos que ya se han guardado en el array
                $primerosPlatosActuales = $menu->getPrimerosPlatos();
                //Añado el nuevo plato
                $primerosPlatosActuales[] = $nuevoPrimerPlato;
                //Actualizo los PrimerosPlatos en el Objeto
                $menu->setPrimerosPlatos($primerosPlatosActuales);
            }
        } elseif (isset($_GET['agregarSegundoPlato'])) {
            $nuevoSegundoPlato = $_GET['sPlato'];
            if(strlen($nuevoSegundoPlato) > 0) {
                $segundosPlatosActuales   = $menu->getSegundosPlatos();
                $segundosPlatosActuales[] = $nuevoSegundoPlato;
                $menu->setSegundosPlatos($segundosPlatosActuales);
            }
        } elseif (isset($_GET['agregarPostre'])) {
            $nuevoPostre = $_GET['tPlato'];
            if(strlen($nuevoPostre) > 0) {
                $PostresActuales   = $menu->getPostres();
                $PostresActuales[] = $nuevoPostre;
                $menu->setPostres($PostresActuales);
            }
        }

        if(isset($_GET['maquetar'])) {
            ?>
<div class='menu'>
    <img class="top" src="adorno.jpg" alt="adorno">
            <?php
            print"<h1>Menú del día</h1>";
            print $menu->getDia() . ", " . $menu->getFecha();

            print "<h3>Primeros platos</h3>";
            $menu->mostrarPrimerosPlatos();

            print "<br><h3>Segundos platos</h3>";
            $menu->mostrarSegundosPlatos();

            print "<br><h3>Postres</h3>";
            $menu->mostrarPostres();
            ?>
                <img class="bottom" src="adorno.jpg" alt="adorno">

</div>
            <?php
        } else {
            $menu_serializado = serialize($menu);
            //Se guarda la cadena de texto (objeto) en una variable de session
            $_SESSION['menu'] = $menu_serializado;
            ?>
            <div class="content">
            <?php
            print "<h1>Menú del " . $menu->getDia() . ", " . $menu->getFecha() . "</h1>";
            ?>
        <form action="ej2.php" method="get">
            <label for="pPlato"><strong>Primeros platos:</strong></label><br>
            <?php
                $menu->mostrarPrimerosPlatos();
            ?>
            <input type="text" name="pPlato">
            <input type="submit" name="agregarPrimerPlato" value="Añadir">
<br><br>


            <label for="sPlato"><strong>Segundos platos:</strong></label><br>
            <?php
                 $menu->mostrarSegundosPlatos();
            ?>
            <input type="text" name="sPlato">
            <input type="submit" name="agregarSegundoPlato" value="Añadir">
<br><br>


            <label for="tPlato"><strong>Postres:</strong></label><br>
            <?php
                 $menu->mostrarPostres();
            ?>
            <input type="text" name="tPlato">
            <input type="submit" name="agregarPostre" value="Añadir">
<br><br>
            <input type="submit" name="maquetar" value="Confeccionar carta">
        </form>
        </div>


        <?php
        }
    }
} else {
    ?>
        <div class="content">
    <form action="ej2.php" method="get">
        <label for="dia">Dia de la semana: </label>
        <input type="text" name="dia">
        <br>
        <label for="fecha">Fecha: </label>
        <input type="text" name="fecha">
        <br>
        <input type="submit" value="Diseñar menú" name="crear">
    </form>
</div>
    <?php
}

?>
    </main>
    <aside></aside>
</section>
<footer></footer>
</body>
</html>

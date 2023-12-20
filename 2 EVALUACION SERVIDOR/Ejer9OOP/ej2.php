<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
class Menu
{
    public $dia;
    public $fecha;
    public $primerosPlatos = [];
    public $segundosPlatos = [];
    public $postres = [];

    // Constructor
    public function __construct($dia = "", $fecha = "")
    {
        $this->dia = $dia;
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

    // Función para mostrar todos los datos de la clase
    public function mostrarDatos(): void
    {
        echo "Día: " . $this->dia . "<br>";
        echo "Fecha: " . $this->fecha . "<br>";

        echo "Primeros Platos: " . implode(", ", $this->primerosPlatos) . "<br>";
        echo "Segundos Platos: " . implode(", ", $this->segundosPlatos) . "<br>";
        echo "Postres: " . implode(", ", $this->postres) . "<br>";
    }
}

// Ejemplo de uso
$menu = new Menu("Lunes", "2023-01-01");
$menu->primerosPlatos[] = "Ensalada";
$menu->segundosPlatos[] = "Pollo a la parrilla";
$menu->postres[] = "Tarta de manzana";

// Mostrar todos los datos
$menu->mostrarDatos();

?>
</body>
</html>
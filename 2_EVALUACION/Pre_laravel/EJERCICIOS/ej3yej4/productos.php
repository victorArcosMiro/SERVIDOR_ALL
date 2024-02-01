<?php
include_once "db.php";
include_once "model.php";
class Productos extends Model
{
    public function __construct(){
        parent::__construct("productos");
    }
    public static function getProductosPorGama()
    {
        $opcionSeleccionada = $_GET['opciones'];

        $db = new Db();  // Creamos un objeto para usar nuestra capa de abstracción

        $db ->createConnection('localhost', 'jardinero', 'jardinero', 'jardineria');

        $productosGama= $db->dataQuery("SELECT CodigoProducto, Nombre, CantidadEnStock FROM productos WHERE gama = \"$opcionSeleccionada\"");

        $db->closeConnection();

        return $productosGama;
    }
}

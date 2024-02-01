<?php

// Controlador. Debería tener un método por cada posible valor de la variable "action".
include_once "view.php";
include_once "productos.php";
include_once "gamas.php";

class ProductosController
{
    public function showProductosGama()
    {
        $productos = new Productos();
        $data['productos'] = $productos->getProductosPorGama();
        View::show("showProductosGama", $data);
    }
}
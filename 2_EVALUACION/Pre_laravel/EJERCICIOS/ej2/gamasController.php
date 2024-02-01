<?php

// Controlador. Debería tener un método por cada posible valor de la variable "action".
include_once "view.php";
include_once "productos.php";
include_once "gamas.php";

class GamasController
{
    public function showAll()
    {
        $gamas = new Gamas();
        $data['gamas'] = $gamas->getAll();
        View::show('showAllGamas', $data);
    }
}
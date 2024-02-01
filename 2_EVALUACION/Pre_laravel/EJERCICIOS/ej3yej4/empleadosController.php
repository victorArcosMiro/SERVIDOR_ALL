<?php

// Controlador. Debería tener un método por cada posible valor de la variable "action".
include_once "view.php";
include_once "empleados.php";

class EmpleadosController
{
    public function showAll()
    {
        $empleados = new Empleados();
        $data['empleados'] = $empleados->getAll();
        View::show('showEmpleados', $data);
    }
}
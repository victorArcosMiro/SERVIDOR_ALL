<?php
include_once "db.php";
include_once "model.php";
include_once "empleadosController.php";

class Empleados extends Model
{
    public function __construct()
    {
        parent::__construct("empleados");
      }

}
?>

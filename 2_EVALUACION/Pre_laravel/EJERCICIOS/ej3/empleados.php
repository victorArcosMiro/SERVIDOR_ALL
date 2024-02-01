<?php
include_once "db.php";
include_once "model.php";
class Empleados extends Model
{
    public function __construct()
    {
        parent::__construct("empleados");
      }

}
?>

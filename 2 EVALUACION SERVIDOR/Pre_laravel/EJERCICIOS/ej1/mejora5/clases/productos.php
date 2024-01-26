<?php
include("model.php");
class Productos extends Model
{
    public function __construct()
    {
        parent::__construct("productos");
      }

    public function productosGama($gama){
        $list = $this->db->dataQuery("SELECT CodigoProducto, Nombre, CantidadEnStock FROM productos WHERE gama = '$gama'");
        return $list;
    }
}
?>

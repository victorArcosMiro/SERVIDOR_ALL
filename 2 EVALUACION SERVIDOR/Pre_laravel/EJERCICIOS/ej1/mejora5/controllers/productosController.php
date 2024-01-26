<?php
// Controlador. Debería tener un método por cada posible valor de la variable "action".
include ("../view.php");
include ("../clases/productos.php");

class ProductosController {

   public function showAll()
   {
      $gama = $_GET['opciones'];
      $productos = new Productos();
      $data['productos'] = $productos->productosGama($gama);
      View::show("showProductosGama", $data);
   }

   // Añadir a partir de aquí un método por cada posible valor de la variable "action"

}
?>
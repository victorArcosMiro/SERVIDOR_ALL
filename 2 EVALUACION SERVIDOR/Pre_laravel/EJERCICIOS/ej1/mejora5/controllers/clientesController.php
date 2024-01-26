<?php
// Controlador. Debería tener un método por cada posible valor de la variable "action".
include ("../view.php");
include ("../clases/clientes.php");

class ClientesController {

   public function showAll()
   {
      $clientes = new Clientes();
      $data['clientes'] = $clientes->getAll();
      View::show("showAllClientes", $data);
   }

   // Añadir a partir de aquí un método por cada posible valor de la variable "action"

}
?>
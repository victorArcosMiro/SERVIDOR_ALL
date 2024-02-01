<?php
include_once("model.php");
include_once "clientesController.php";
class Clientes extends Model
{
    public function __construct()
    {
        parent::__construct("clientes");
      }
    public function insertarCliente($nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito)
    {
      $maxCodeQuery = "SELECT MAX(CodigoCliente) FROM Clientes";
      $maxCodeRow = $this->db->dataQuery($maxCodeQuery);
      $maxCodeClient = $maxCodeRow[0][0];
      $maxCodeClient++;

      $insert = $this->db->dataManipulation("INSERT INTO Clientes VALUES ($maxCodeClient, '$nombreCliente', '$nombreContacto', '$apellidoContacto', '$telefono', '$fax', '$lineaDireccion1', '$lineaDireccion2', '$ciudad', '$region', '$pais', '$codigoPostal', $codigoEmpleado, $limiteCredito)");

      return $insert;
    }

}
?>

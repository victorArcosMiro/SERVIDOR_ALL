<?php
include_once 'model.php';
include_once "clientesController.php";
include_once "db.php";

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
    public function updateCliente($id, $nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito)
    {
      $sqlUpdate = "UPDATE Clientes
      SET
        NombreCliente = '$nombreCliente',
        NombreContacto = '$nombreContacto',
        ApellidoContacto = '$apellidoContacto',
        Telefono = '$telefono',
        Fax = '$fax',
        LineaDireccion1 = '$lineaDireccion1',
        LineaDireccion2 = '$lineaDireccion2',
        Ciudad = '$ciudad',
        Region = '$region',
        Pais = '$pais',
        CodigoPostal = '$codigoPostal',
        LimiteCredito = '$limiteCredito',
        CodigoEmpleadoRepVentas = '$codigoEmpleado'
      WHERE CodigoCliente = '$id'";
      $insert = $this->db->dataManipulation($sqlUpdate);

      return $insert;
    }
}
?>

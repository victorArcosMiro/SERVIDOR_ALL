<?php

include_once "view.php";
include_once "clientes.php";

class ClientesController
{
    public function insertar($nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito)
    {
        $clientes = new Clientes();
        $data['clientes'] = $clientes->insertarCliente($nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito);

        View::Show('showClientes', $data);

    }
}

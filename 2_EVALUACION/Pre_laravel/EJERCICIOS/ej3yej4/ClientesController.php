<?php

include_once "view.php";
include_once "clientes.php";
include_once "empleados.php";

class ClientesController
{
    public function insertar($nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito)
    {
        $clientes         = new Clientes();
        $data['clientes'] = $clientes->insertarCliente($nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito);

        View::Show('showClientes', $data);

    }
    public function showAll()
    {
        $clientes         = new Clientes();
        $data['clientes'] = $clientes->getAll();
        View::show('showAllClientes', $data);
    }

    public function modificarCliente()
    {
        $clientes         = new Clientes();
        $data['clientes'] = $clientes->getCodigoCliente($_REQUEST['telefono']);
        //Obtengo datos del cliente por id.

        $empleados         = new Empleados(); //Obtengo lista de empleados para mostrarlos en en select del form.
        $data['empleados'] = $empleados->getAll();

        View::show('showClienteFormModif', $data);

    }

    public function update($id, $nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito)
    {

        $clientes         = new Clientes();
        $data['clientes'] = $clientes->updateCliente($id, $nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito);

        View::Show('showClientes', $data);
    }
}

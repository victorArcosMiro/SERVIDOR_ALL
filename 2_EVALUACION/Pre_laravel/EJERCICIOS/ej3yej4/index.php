<?php

include_once 'EmpleadosController.php';
include_once 'ClientesController.php';


if (!isset($_REQUEST['action'])) {
    $action = "showAll";
} else {
    $action = $_REQUEST['action'];
}

if (!isset($_REQUEST['controller'])) {
    $controllerClassName = "ClientesController";
} else {
    $controllerClassName = $_REQUEST['controller'];
}

$controller = new $controllerClassName();

if(!isset($_REQUEST['telefono'])) {
    $controller->{$action}();
} else {
    $controller->{$action}($_REQUEST['telefono']);
}

if(!isset($_REQUEST['Modificar'])) {
    $controller->{$action}();
} else {
    $id= $_GET['CodigoCliente'];
    $nombreCliente = $_GET['nombreCliente'];
    $nombreContacto = $_GET['nombreContacto'];
    $apellidoContacto = $_GET['apellidoContacto'];
    $telefono = $_GET['telefono'];
    $fax = $_GET['fax'];
    $lineaDireccion1 = $_GET['lineaDireccion1'];
    $lineaDireccion2 = $_GET['lineaDireccion2'];
    $ciudad = $_GET['ciudad'];
    $region = $_GET['region'];
    $pais = $_GET['pais'];
    $codigoPostal = $_GET['codigoPostal'];
    $codigoEmpleado = $_GET['codigoEmpleadoRepVentas'];
    $limiteCredito = $_GET['limiteCredito'];

    $controller->{$action}($id,$nombreCliente, $nombreContacto, $apellidoContacto, $telefono, $fax, $lineaDireccion1, $lineaDireccion2, $ciudad, $region, $pais, $codigoPostal, $codigoEmpleado, $limiteCredito);
}

?>
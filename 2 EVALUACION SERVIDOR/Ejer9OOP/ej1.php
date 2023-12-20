<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class Persona
    {
        public $nombre;
        public $apellido;

        public function __construct($nombre, $apellido)
        {
            $this->nombre   = $nombre;
            $this->apellido = $apellido;
        }
        //GETTERS
        public function getNombre()
        {
            return $this->nombre;
        }
        public function getApellido()
        {
            return $this->apellido;
        }
        //SETTERS
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }
        //TO_STRING
        public function __toString()
        {
            return "Nombre: " . $this->nombre . " ,Apellido: " . $this->apellido . " - ";
        }
        public function getDatosPersona()
        {
            return "<strong>Nombre:</strong> " . $this->nombre . " - <strong>Apellido:</strong> " . $this->apellido . " - ";
        }
    }
//------------------------//
class Empleado extends Persona
{
    public $puesto;
    public $sueldo;
    public function __construct($nombre, $apellido, $puesto, $sueldo)
    {
        parent::__construct($nombre, $apellido);
        $this->puesto = $puesto;
        $this->sueldo = $sueldo;
    }
    //GETTERS
    public function getPuesto()
    {
        return $this->puesto;
    }
    public function getSueldo()
    {
        if($this->sueldo < 2000) {
            return "No debe pagar";
        }
        return "Si debe pagar impuestos";

    }
    //SETTERS
    public function setPuesto()
    {
        return $this->puesto;
    }
    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }
    public function getDatosEmpleado(){
        return "Puesto: " . $this->puesto . " , Sueldo: " . $this->sueldo . ".";
    }
    public function getDatosPersona_Empleado(){
        $datosPersona = parent::getDatosPersona();
        $datosEmpleado = $datosPersona . "<strong>Puesto:</strong> " . $this->puesto . " - <strong>Sueldo:</strong> ";
        if($this->sueldo < 2000) {
            $datosEmpleado = $datosEmpleado . "No debe pagar";
        }
        $datosEmpleado = $datosEmpleado . "Si debe pagar impuestos";
        return $datosEmpleado;
    }
}

$objEmpleado = new Empleado("Victor", "Arcos", "CEO", 10000000);

echo "Datos de Empleado -> " .$objEmpleado->getDatosPersona_Empleado()."<br>";

    ?>
</body>
</html>
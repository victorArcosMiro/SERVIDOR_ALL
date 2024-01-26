<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
class Racional
{
    public $numerador;
    public $denominador;

    public function __construct($n1 = 1, $n2 = 1)
    {
        if(is_numeric($n1) && is_numeric($n2)) { //En caso de que se pase como argumento dos INTEGERS
            $this->numerador   = $n1;
            $this->denominador = $n2;
        } elseif(is_string($n1) && strpos($n1, "/") !== false) {
            //En caso de que se pase una variable de tipo Strind (5/3*4), aunque sean dos numeros y una operación sera solo una valor el que se pase como parametro.
            [$num, $den] = explode('/', $n1);
            //Creamos dos variables con "list($num, $den)" donde luego vamos a guardar los valores que saquemos de separar $n1 con "explode('/', $n1)"
            $this->numerador   = intval($num);
            $this->denominador = intval($den);
        }
        // Simplificar el racional

    }
    public function getNumerador()
    {
        return $this->numerador;
    }

    public function getDenominador()
    {
        return $this->denominador;
    }

    public function setNumerador($numerador): void
    {
        $this->numerador = $numerador;
    }

    public function setDenominador($denominador): void
    {
        $this->denominador = $denominador;
    }
    public function __toString()
    {
        $numerador   = $this->numerador;
        $denominador = $this->denominador;
        return $numerador . "/" . $denominador;
    }
    public function simplificar()
    {
        $gcd                     = $this->calcularMCD($this                    ->numerador, $this                    ->denominador);
        $numeradorSimplificado   = $this->numerador   / $gcd;
        $denominadorSimplificado = $this->denominador / $gcd;

        // Devolver un nuevo objeto inicializado
        $objResulatdo = new Racional($numeradorSimplificado, $denominadorSimplificado);

        return $objResulatdo;
    }

    public function sumar($obj2)
    {
        $a = $this->numerador;
        $b = $this->denominador;

        $c = $obj2->getNumerador();
        $d = $obj2->getDenominador();

        if ($b == $d) {
            // Mismo denominador
            $e            = $a + $c;
            $objResultado = new Racional($e, $b);
            return $objResultado;
        }

        $e = $a * $d + $b * $c;
        $f = $b * $d;

        $objResultado = new Racional($e, $f);
        return $objResultado;
    }
    public function restar($obj2)
    {
        $a = $this->getNumerador();
        $b = $this->getDenominador();

        $c = $obj2->getNumerador();
        $d = $obj2->getDenominador();
        if ($b == $d) {//Mismo denominador
            $e            = $a - $c;
            $objResultado = new Racional($e, $b);
            return $objResultado;
        }

        $e            = $a * $d            - $b            * $c;
        $f            = $b * $d;
        $objResultado = new Racional($e, $f);
        return $objResultado;
    }
    public function multiplicar($obj2)
    {
        $a = $this->getNumerador();
        $b = $this->getDenominador();

        $c = $obj2->getNumerador();
        $d = $obj2->getDenominador();

        $e            = $a * $c;
        $f            = $b * $d;
        $objResultado = new Racional($e, $f);
        return $objResultado;

    }
    public function division($obj2)
    {
        $a = $this->getNumerador();
        $b = $this->getDenominador();

        $c = $obj2->getNumerador();
        $d = $obj2->getDenominador();

        $e            = $a * $d;
        $f            = $b * $c;
        $objResultado = new Racional($e, $f);
        return $objResultado;
    }
    // Método privado para calcular el máximo común divisor (MCD)
    public function calcularMCD($a, $b)
    {
        while ($b != 0) {
            $temp = $b;
            $b    = $a % $b;
            $a    = $temp;
        }
        return $a;
    }

}

    function separarNumeros($n)
    {

        if(strpos($n, "+") !== false) {
            $_SESSION['operador'] = "+";
            $arrayNumero          = explode("+", $n);
        } elseif(strpos($n, "-") !== false) {
            $_SESSION['operador'] = "-";
            $arrayNumero          = explode("-", $n);
        } elseif(strpos($n, "*") !== false) {
            $_SESSION['operador'] = "*";
            $arrayNumero          = explode("*", $n);
        } elseif(strpos($n, ":") !== false) {
            $_SESSION['operador'] = ":";
            $arrayNumero          = explode(":", $n);
        }
        $numero1 = $arrayNumero[0];
        $numero2 = $arrayNumero[1];

        if (is_string($numero1) && strpos($numero1, "/") !== false) {
            $operador1 = explode('/', $numero1);
            $obj1      = new Racional();

            $numerador   = intval($operador1[0]);
            $denominador = intval($operador1[1]);

            $obj1->setNumerador($numerador);
            $obj1->setDenominador($denominador);

            $_SESSION['numero1'] = serialize($obj1);
        } else {
            $obj1                = new Racional($numero1);
            $_SESSION['numero1'] = serialize($obj1);
        }
        if (is_string($numero2) && strpos($numero2, "/") !== false) {
            $operador2 = explode('/', $numero2);
            $obj2      = new Racional();

            $numerador2   = intval($operador2[0]);
            $denominador2 = intval($operador2[1]);

            $obj2->setNumerador($numerador2);
            $obj2->setDenominador($denominador2);

            $_SESSION['numero2'] = serialize($obj2);
        } else {
            $obj2                = new Racional($numero2);
            $_SESSION['numero2'] = serialize($obj2);
        }
    }


    ?>
    <header>
        <h1>CALCULADORA RACIONAL</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <?php

    ?>
        <div class="main_3">
            <?php
            include "include/reglas_calculadora.php";
    ?>
            <div class="content_2">
            <div class="operacion"><br><br>
                    <form action="ej3.php" method="get">
                        <fieldset>
                        <legend><strong>Establece la operación</strong></legend>
                        <label style="margin-top: 10px;">Operación:</label>
                        <input name='operacion' type='text' pattern="^\d+(\/\d+)?\s*[+\-\*\/:]\s*\d+(\/\d+)?$" required>
                        <input type="submit" name="calcular" value="Calcular">
                        </fieldset>
                    </form>
                </div>
                <div class="resultado">
                    <form>
                        <fieldset>
                        <legend><strong>Resultado</strong></legend>
                        <?php
                        if (isset($_GET['calcular'])) {
                            $operacion = $_GET['operacion'];
                            separarNumeros($operacion);
                            ?>
                            <table class="tablaRacionales">
                                <tr>
                                    <th>Concepto</th>
                                    <th>Valores</th>
                                </tr>
                            <?php
                            if (isset($_SESSION['numero1'])) {
                                $obj1 = unserialize($_SESSION['numero1']);
                                ?>
                                <tr>
                                    <td>Operando 1</td>
                                    <td> <?php print $obj1->__toString(); ?> </td>
                                </tr>
                                <?php
                            }
                            if (isset($_SESSION['numero2'])) {
                                $obj2 = unserialize($_SESSION['numero2']);
                                ?>
                                <tr>
                                    <td>Operando 2</td>
                                    <td> <?php print $obj2->__toString(); ?> </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td>Operación</td>
                                <td> <?php print $_SESSION['operador']; ?> </td>
                            </tr>
                            <tr>
                                <td>Resultado</td>
                                <td> <?php switch ($_SESSION['operador']) {
                                    case "+":
                                        $objResultado = $obj1->sumar($obj2);
                                        break;
                                    case "-":
                                        $objResultado = $obj1->restar($obj2);
                                        $objResultado->__toString();
                                        break;
                                    case "*":
                                        $objResultado = $obj1->multiplicar($obj2);
                                        $objResultado->__toString();
                                        break;
                                    case ":":
                                        $objResultado = $obj1->division($obj2);
                                        $objResultado->__toString();
                                        break;
                                }
                            print $objResultado;
                            ?> </td>
                            </tr>
                            <tr>
                                <td>Resultado Simplificado</td>
                                <td> <?php print $objResultado->simplificar(); ?> </td>
                            </tr>
                            </table>

                            <?php
                        }
    ?>
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>
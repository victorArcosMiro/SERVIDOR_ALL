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
    session_start();

    class Racional
    {
        public $numerador;
        public $denominador;

        public function __construct($n1 = 1, $n2 = 1)
        {
            if (is_numeric($n1) && is_numeric($n2)) {
                $this->numerador   = $n1;
                $this->denominador = $n2;
            } elseif (is_string($n1) && strpos($n1, "/") !== false) {
                [$num, $den] = explode('/', $n1);
                $this->numerador   = intval($num);
                $this->denominador = intval($den);
            }
            $this->simplificar();
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

        private function simplificar()
        {
            $gcd = $this->calcularMCD($this->numerador, $this->denominador);
            $this->numerador   /= $gcd;
            $this->denominador /= $gcd;
        }

        private function calcularMCD($a, $b)
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
        if (strpos($n, "+") !== false) {
            $arrayNumero = explode("+", $n);
        } elseif (strpos($n, "-") !== false) {
            $arrayNumero = explode("-", $n);
        } elseif (strpos($n, "*") !== false) {
            $arrayNumero = explode("*", $n);
        } elseif (strpos($n, ":") !== false) {
            $arrayNumero = explode(":", $n);
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
            $obj1 = new Racional($numero1);
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
            $obj2 = new Racional($numero2);
            $_SESSION['numero2'] = serialize($obj2);
        }
    }

    function simplificarRacional($numerador, $denominador)
    {
        $mcd = function ($a, $b) use (&$mcd) {
            return ($b === 0) ? $a : $mcd($b, $a % $b);
        };

        $gcd = $mcd($numerador, $denominador);

        $numeradorSimplificado   = $numerador / $gcd;
        $denominadorSimplificado = $denominador / $gcd;

        return [$numeradorSimplificado, $denominadorSimplificado];
    }

    function suma($obj1, $obj2)
    {
        $a = $obj1->getNumerador();
        $b = $obj1->getDenominador();

        $c = $obj2->getNumerador();
        $d = $obj2->getDenominador();

        if ($b == $d) {
            $e = $a + $c;
            $objResultado = new Racional($e, $b);
            return $objResultado;
        } else {
            $comunDenominador = $obj1->calcularMCD($b, $d);

            $a = $a * $d;
            $c = $c * $b;

            $numerador = $a + $c;
            $arrayNumeroRacionalSimplificado = simplificarRacional($numerador, $comunDenominador);
            $objResultado = new Racional($arrayNumeroRacionalSimplificado[0], $arrayNumeroRacionalSimplificado[1]);
            return $objResultado;
        }
    }

    ?>

    <header>
        <h1>CALCULADORA RACIONAL</h1>
    </header>
    <section>
        <nav></nav>
        <main>
        <div class="main_3">
            <?php
                include "include/reglas_calculadora.php";
    ?>
            <div class="content_2">
            <div class="operacion"><br><br>
                    <form action="ej3.php" method="get">
                        <fieldset>
                        <legend>Establece la operación:</legend>
                        <label>Operación:</label>
                        <input name='operacion' type='text'>
                        <input type="submit" name="calcular" value="calcular">
                        </fieldset>
                    </form>
                </div>
                <div class="resultado">
                    <form>
                        <fieldset>
                        <legend>Resultado</legend>
                        <?php
                        if (isset($_GET['calcular'])) {
                            $operacion = $_GET['operacion'];
                            separarNumeros($operacion);

                            if (isset($_SESSION['numero1'])) {
                                $obj1 = unserialize($_SESSION['numero1']);
                                print "Impresión del primer número<br>";
                                print $obj1->getNumerador() . "/" . $obj1->getDenominador() ."<br>";
                            }
                            if (isset($_SESSION['numero2'])) {
                                $obj2 = unserialize($_SESSION['numero2']);
                                print "Impresión del segundo número<br>";
                                print $obj2->getNumerador() . "/" . $obj2->getDenominador();
                            }
                            print "<br>Resultado:";
                            $objResultado = suma($obj1,$obj2);
                            print $objResultado->getNumerador() . "/" . $objResultado->getDenominador();

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

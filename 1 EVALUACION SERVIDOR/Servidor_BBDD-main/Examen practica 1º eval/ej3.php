<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <?php
  function letraNIF($numero){
    $letrasDni = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    $posicion = $numero%23;
    return $letrasDni[$posicion];
  }
  ?>
  <style>
    tr:hover{
      background-color: aqua;
    }
  </style>
</head>
<body>
  <header>
    <h1>REPASO 1ª EVALUACIÓN</h1>
  </header>
  <section>
    <nav></nav>
    <main>
        <div class="enlace">
            <a href="index.html">Inicio</a>
        </div>
      <div class="main">
        <h2>EJERCICIO 3</h2>
        <br>
        <div class="ejercicio">
            <?php
            $connection = mysqli_connect("localhost", "jardinero", "jardinero", "jardineria")or die("Fallo de conexión con la base de datos.");

            $sqlProveedores = "SELECT DISTINCT Proveedor FROM productos;";
            $resultProveedor = mysqli_query($connection, $sqlProveedores);
                if(isset($_GET['enviar'])) {
                  $proveedorSeleccionado = $_GET['proveedor'];

                  $sqlProductosProveedor = "SELECT CodigoProducto, Gama, Nombre, Dimensiones, CantidadEnStock, PrecioProveedor FROM productos WHERE Proveedor='$proveedorSeleccionado' ORDER BY CodigoProducto";

                  $resultProductosProveedor = mysqli_query($connection, $sqlProductosProveedor) or die("Fallo en la cosnulta de productos de proveedor");

                  $precioTotal = 0;
                  $nProductos = 0;
                  $stock = 0;
                  $rowProductosProveedor = mysqli_num_rows($resultProductosProveedor);
                  if($rowProductosProveedor > 0){
                    print ("<table class='tabla_proveedores'>");
                    print ("<tr>");
                        print ("<th>Codigo de Producto</th>");
                        print ("<th>Gama</th>");
                        print ("<th>Nombre</th>");
                        print ("<th>Dimensiones</th>");
                        print ("<th>Cantidad en Stock</th>");
                        print ("<th>Precio proveedor</th>");
                    print ("</tr>");
                for($i=0; $i<$rowProductosProveedor; $i++){
                    //Introduccion de consulta en ARRAY
                    $datosProductosProveedor = mysqli_fetch_array($resultProductosProveedor);
                    print ("<tr>");
                        print ("<td>" . $datosProductosProveedor['CodigoProducto'] . "</td> ");
                        print ("<td>" . $datosProductosProveedor['Gama'] . "</td> ");
                        print ("<td>" . $datosProductosProveedor['Nombre'] . "</td> ");
                        print ("<td>" . $datosProductosProveedor['Dimensiones'] . "</td> ");
                        print ("<td>" . $datosProductosProveedor['CantidadEnStock'] . "</td> ");
                        print ("<td>" . $datosProductosProveedor['PrecioProveedor'] . "</td> ");
                        $precioTotal += $datosProductosProveedor['PrecioProveedor'];
                        $nProductos++;
                        $stock += $datosProductosProveedor['CantidadEnStock'];
                    print ("</tr>");
                }
                    print("<tr>");
                      print("<td colspan='5'>Total productos diferentes</td><td colspan='1'>" . $nProductos . "</td>");
                    print ("</tr>");

                    print("<tr>");
                      print("<td colspan='5'>Precio medio por producto </td><td colspan='1'>" . ($precioTotal / $nProductos) . "</td>");
                    print ("</tr>");

                    print("<tr>");
                      print("<td colspan='5'>Total cantidad productos en stock</td><td colspan='1'>" . $stock . "</td>");
                    print ("</tr>");

                print ("</table>");
            }else{
                print ("No hay datos disponibles.");
            }
            mysqli_close($connection);//Cierre de conexion
                  }

                ?>
                <h3>Consulta de producto por proveedor</h3>
                <div class="formulario">
                  <form action="ej3.php" method="get">
                  <label for="proveedor">Introduzca proveedor: </label>
                  <select name="proveedor" id="proveedor" required>
                    <?php
                      if($resultProveedor){
                        while($rowProveedor = mysqli_fetch_array($resultProveedor)){
                          print('<option value"' . $rowProveedor["Proveedor"] . '">' . $rowProveedor["Proveedor"] . '</option>');
                        }
                      }else{
                        echo '<option value="">No hay proveedores disponibles.</option>';
                      }
                    ?>
                  </select>
                  <input type="submit" name="enviar" value="Enviar">
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
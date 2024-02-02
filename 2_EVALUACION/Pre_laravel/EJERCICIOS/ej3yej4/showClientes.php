
     <?php
     $clientes = $data['clientes'];
     if($clientes > 0) {
         print "Insercción exitosa.";
     } else {
         print "Error en la insercción.";
     }
     print "<br>";
     $datos = $data['datos'];
     print "Datos del cliente modificado:<br>";

     // Imprimir datos en una tabla
     print '<table border="1">';
     foreach ($data['datos'] as $clave => $valor) {
         print '<tr>';
         print '<td>' . ucfirst(str_replace('_', ' ', $clave)) . '</td>';
         print '<td>' . $valor . '</td>';
         print '</tr>';
     }
     print '</table>';

     ?>
     <br>
     <a href="./index.php">Modificar otro cliente</a>
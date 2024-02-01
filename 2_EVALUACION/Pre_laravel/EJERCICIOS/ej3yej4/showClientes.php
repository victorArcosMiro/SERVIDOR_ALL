<!--
<h1>Listado de Clientes</h1>
<table>
    <tr>
        <th>Codigo de Cliente</th>
        <th>Nombre del Cliente</th>
        <th>Nombre de Contacto</th>
        <th>Telefono</th>
    </tr>
-->
     <?php
     $clientes = $data['clientes'];
     if($clientes>0){
        print "Insercción exitosa.";
     }else{
        print "Error en la insercción.";
     }
  /*
     foreach($clientes as $cliente) {
        print "<tr>";
            print "<td>" . $cliente[0] . "</td> ";
            print "<td>" . $cliente[1] . "</td> ";
            print "<td>" . $cliente[2] . "</td> ";
            print "<td>" . $cliente[4] . "</td> ";
        print "</tr>";
     }
     */
     ?>
</table>
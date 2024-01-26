<h1>Listado de Productos de Gama -> </h1>
<table>
    <tr>
        <th>Codigo de Producto</th>
        <th>Nombre</th>
        <th>Castidad en stock</th>
    </tr>
     <?php
     $productos = $data['productos'];
     foreach($productos as $producto) {
        print "<tr>";
            print "<td>" . $producto[0] . "</td> ";
            print "<td>" . $producto[1] . "</td> ";
            print "<td>" . $producto[2] . "</td> ";
        print "</tr>";
     }
     ?>
</table>
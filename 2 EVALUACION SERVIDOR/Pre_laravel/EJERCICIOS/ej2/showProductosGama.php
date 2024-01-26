<table border='1'>
    <tr>
        <th>Codigo de Producto</th>
        <th>Nombre</th>
        <th>Cantidad en stock</th>
    </tr>
    <?php
    $productosGama = $data['productos'];
        foreach($productosGama as $productoGama){
            print "<tr>";
                print "<td>" . $productoGama[0] . "</td> ";
                print "<td>" . $productoGama[1] . "</td> ";
                print "<td>" . $productoGama[2] . "</td> ";
            print "</tr>";
        }
    ?>
</table>
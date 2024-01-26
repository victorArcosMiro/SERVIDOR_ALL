<h1>Listado de Articulos</h1>
<table>
    <tr> <th>Fecha</th> <th>Titulo</th> </tr>
<?php
    foreach($articles as $article) {
        print "<tr>
        <td>" . $article['fecha'] . "</td>
        <td>" . $article['titulo'] . "</td>
    </tr>";
    }
?>
</table>
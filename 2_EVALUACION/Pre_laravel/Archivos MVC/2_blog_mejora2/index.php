<?php
    include('articles.php');       // En este archivo estará el modelo
    $articles = Article::getAll();  // Este método del modelo nos devuelve la lista de artículos
    include('showAllArticles.php');   // En este archivo estará la vista
?>
<?php
  // Este es el controlador.

include('gamas.php');
include('productos.php');

$gamas = Gamas::getAll();

include("showAllGamas.php");

$productosGama = Productos::getProductosPorGama();

include("showProductosGama.php");



?>
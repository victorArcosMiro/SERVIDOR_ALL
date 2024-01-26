<?php

class View
{
   public static function show($viewName, $data=null) {
      include("./includes/header.php");
      include("$viewName.php");
      include("./includes/footer.php");
   }

}

?>
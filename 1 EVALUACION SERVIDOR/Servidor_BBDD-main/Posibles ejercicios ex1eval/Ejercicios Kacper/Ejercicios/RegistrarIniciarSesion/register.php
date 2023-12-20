<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de informacion sobre localidades</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header><h1>INFORMACION SOBRE LOCALIDADES</h1></header>

    <section>
        <nav></nav>
        <main>

<?php
 $conexion = mysqli_connect("localhost","kacper","kacper","geografia",3307);
 if($conexion){
     //acciones sobre la BD bdprueba
     echo "Conexión correcta "."<br>";}
  else{
       echo "Error: conexión no realizada, respuesta del servidor: ".
       mysqli_error($conexion)."Nº de error: ".mysqli_errno($conexion);
   }

/* ---------------------------------------------------------------------------*/
if ($_REQUEST){
  $psw1 = $_GET["psw"];
  $psw2 = $_GET["psw2"];
  if($psw1 == $psw2){

  $nombre = $_GET["usr"];
  $instruccion = "SELECT nombre from usuarios WHERE nombre ='$nombre'" ;
  $resulconsulta = mysqli_query ($conexion,$instruccion)
      or die ("Fallo en la consulta");

   // Mostrar resultados de la consulta
   $nfilas = mysqli_num_rows ($resulconsulta);
   if ($nfilas == 0){
     $contraseniaEncriptada = password_hash("$psw1", PASSWORD_DEFAULT);
     $anadir = "INSERT INTO usuarios (nombre, clave) VALUES ('$nombre', '$contraseniaEncriptada')";
     $resulconsulta = mysqli_query ($conexion,$instruccion)
      or die ("Fallo en la consulta");

      if ($insertar = mysqli_query ($conexion,$anadir)){
        echo "<p>Usuario $nombre insertado con éxito. Ahora puedes <a href='login.php'>identificarte</a> para visualizar los ejercicios de esta sección</p>";
      } else {
        echo "Fallo al añadir el usuario"."<br>";
      };
   } else{
     echo "<p>El usuario $nombre ya está registrado en la base de datos. Puedes identificarte <a href='login.php'>aquí</a></p>";
   }

  }else{
     echo '<p>Los campos para la contraseña no coinciden. Vuelve a introducir los datos en el <a href="register.php">formulario</a> de registro</p>';
  }
} else {
?>

<a href="index.php">Inicio - Ejercicios de bases de datos</a>
<div id="login">
<h2>FORMULARIO DE REGISTRO EN LA BASE DE DATOS</h2>
<form action="register.php" class="formRegistro" method="get">
  <label for="usuario">Usuario:</label>
  <input type="text" name="usr" id=""><br>
  <label for="contraseña">Contraseña:</label>
  <input type="password" name="psw" id=""><br>
  <label for="contraseña2">Vuelve a introducir la contraseña:</label>
  <input type="password" name="psw2" id=""><br>
  <input type="submit" value="Registrar">
</form>
</div>
<?php
}
?>
</main>
        <aside></aside>
    </section>

    <footer></footer>
</body>
</html>
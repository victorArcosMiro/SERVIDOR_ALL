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
  $nombre = $_GET["usr"];
  $pontraseña = $_GET["psw"];

  $instruccion = "SELECT nombre from usuarios WHERE nombre ='$nombre'" ;
  $resulconsulta = mysqli_query ($conexion,$instruccion)
      or die ("Fallo en la consulta");

   // Mostrar resultados de la consulta
   $nfilas = mysqli_num_rows ($resulconsulta);
   if ($nfilas == 0){
     echo "<p>Usuario no registrado en la base de datos. Regístrese <a href='register.php'>aqui</a>.</p>";
   } else{
     $contraseña = $_GET["psw"];
     $sql="SELECT clave FROM usuarios where nombre='$nombre'";
     $clave = mysqli_query ($conexion,$sql)
        or die ("Fallo en la consulta");

     $result = mysqli_fetch_assoc($clave);

    if (password_verify( $contraseña,$result["clave"])){
     echo "<p>Bienvenido/a $nombre. Ahora puedes navegar por los distintos ejercicios de la seccion</p>";
     $_SESSION["usuario"] = $nombre;
     print ("<a href='inicio.php'> <input type='button' value='Ejercicios'></a>");
    } else {
     echo"<p>Contraseña incorrecta. Vuelve a <a href='login.php'>introducir</a> los datos </p>";
    }
   }
} else {
?>
<a href="../../portada.php">Inicio - Portada</a>
<div id="login">
<h2>LOGIN PARA USUARIOS REGISTRADOS</h2>
<form action="login.php" class="formLogin">
  <label for="usuario">Usuario:</label>
  <input type="text" name="usr" id=""><br>
  <label for="contraseña">Contraseña:</label>
  <input type="password" name="psw" id=""><br>
  <input type="submit" value="Conectar">
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
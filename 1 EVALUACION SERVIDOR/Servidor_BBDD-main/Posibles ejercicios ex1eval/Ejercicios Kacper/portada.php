<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>REPASO 1 EVALUACION</h1></header>

    <section>
        <nav></nav>
        <main>
            <h2>ACCESO A EJERCICIOS</h2>
            <p class="seccion">Ejercicios sin inicio de sesión</p>
            <p>Mostras informacion en tabla de todas las secciones de la base de datos</p>
           <div id="botones">
            <a href="Ejercicios/Informacion tablas/tablaComunidades.php"> <input type="button" value="Tabla comunidades"></a>
            <a href="ejercicios/Informacion tablas/tablaLocalidades.php"> <input type="button" value="Tabla localidades"></a>
            <a href="ejercicios/Informacion tablas/tablaProvincias.php"> <input type="button" value="Tabla provincias"></a>
           </div>
            <p>Ejercicio sobre tablas (count, sum)</p>
           <div id="botones">
            <a href="Ejercicios/EjerciciosSobreTablas/poblacionTotalPorProvincia.php"> <input type="button" value="Cantidad de poblacion por provincias"></a>
            <a href="Ejercicios/EjerciciosSobreTablas/infoLocalidadesProvinciaComunidades.php"> <input type="button" value="Informacion sobre localidades + provincia + CCAA"></a>
            <a href="Ejercicios/EjerciciosSobreTablas/infoPorLocalidad.php"> <input type="button" value="Info localidad por nombre"></a>
           </div>

           <p class="seccion">Ejercicios con inicio de sesión</p>
            <p>Mostras informacion en tabla de todas las secciones de la base de datos</p>
           <div id="botones">
            <a href="Ejercicios/RegistrarIniciarSesion/login.php"> <input type="button" value="Iniciar sesion"></a>
           </div>

           <p>Ejercicio sobre arrays</p>
           <div id="botones">
            <a href="ejercicioArrayPares.php"> <input type="button" value="Numeros pares"></a>
            <a href="ejercicioDNI.php"> <input type="button" value="Ejercicio DNI"></a>
            <a href="ejercicioVentasProducto.php"> <input type="button" value="Venta productos"></a>
           </div>
        </main>
        <aside></aside>
    </section>

    <footer></footer>
</body>
</html>
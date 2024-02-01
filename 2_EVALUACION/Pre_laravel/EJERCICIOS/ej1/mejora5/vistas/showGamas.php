<form action="../productosController.php" method="get">
    <label for="gama">Elige una de las gamas de productos disponibles</label>
    <select id="opciones" name="opciones">
        <?php
        $gamas = $data['gamas'];
        foreach($gamas as $gama){
            print '<option value=' . $gama.'>'. $gama .'</option>';
        }
        ?>
        </select>
        <input type="submit" value="Comprobar">
    </form>
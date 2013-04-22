<div class="tabbable">
    <ul class="nav nav-tabs">
        <?php
        include_once 'capaControladores/jugadores.php';
        $categorias = Jugadores::getCategorias();
        $contador = 0;
        foreach ($categorias as $categoria) {
            if ($contador == 0) {
                echo '<li class="active"><a href="#categoria' . $categoria['categoria'] . '" data-toggle="tab">Categor&iacute;a ' . $categoria['categoria'] . '</a></li>';
            } else {
                echo '<li><a href="#categoria' . $categoria['categoria'] . '" data-toggle="tab">Categor&iacute;a ' . $categoria['categoria'] . '</a></li>';
            }
            $contador++;
        }
        ?>
    </ul>

    <div class="tab-content">
        <?php
        $contador2 = 0;
        foreach ($categorias as $categoria) {
            if ($contador2 == 0) {
                echo '<div id="categoria' . $categoria['categoria'] . '" class="tab-pane active">';
            } else {
                echo '<div id="categoria' . $categoria['categoria'] . '" class="tab-pane">';
            }
            $letra = $categoria['categoria'];
            $ranking = Jugadores::getRankingPorCategoria($letra);
            echo '<table class="table table-condensed">
                <tr class="">
                <th><center>Posici&oacute;n</center></th>
                <th><center>Foto</center></th>
                <th><center>Nombre Jugador</center></th>
                <th><center>Victorias</center></th>
                <th><center>Cambios</center></th>
                </tr>';
            foreach($ranking as $player){
                echo '<tr>';
                echo '<td><center>'.$player['ranking'].'</center></td>';
                echo '<td><center><img class="img img-rounded" src="'.$player['foto'].'" height ="100" width="100"></center></td>';
                echo '<td><center>'.$player['nombre'].' '.$player['apellido'].'</center></td>';
                echo '<td><center>0</center></td>';
                echo '<td><center>--</center></td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
            $contador2++;
        }
        ?>
        
    </div><!-- /.tab-content -->
</div><!-- /.tabbable -->
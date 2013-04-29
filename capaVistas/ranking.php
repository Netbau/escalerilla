<div class="tabbable">
    <ul class="nav nav-tabs">
        <?php
        include_once (dirname(__FILE__) . '/../capaControladores/jugadores.php');
        $categorias = Jugadores::getCategorias();
        $contador = 0;
        foreach ($categorias as $categoria) {
            if ($contador == 0) {
                echo '<li class="active"><a href="#categoria' . $categoria['categoria'] . '" data-toggle="tab">Categoría ' . $categoria['categoria'] . '</a></li>';
            } else {
                echo '<li><a href="#categoria' . $categoria['categoria'] . '" data-toggle="tab">Categoría ' . $categoria['categoria'] . '</a></li>';
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
            echo '
            <table class="table table-condensed table-striped">
                <thead>
                    <tr class="">
                    <th><center>Posición</center></th>
                    <th><center>Foto</center></th>
                    <th><center>Nombre Jugador</center></th>
                    <th><center>Victórias</center></th>
                    <th><center>Cambios</center></th>
                    </tr>
                </thead>
                <tbody>';
            foreach($ranking as $player){
                echo '<tr>';
                echo '<td data-title="Ranking"><center>'.$player['ranking'].'</center></td>';
                echo '<td><center><img class="img img-rounded" src="'.$player['foto'].'" height ="100" width="100"></center></td>';
                echo '<td data-title="Nombre"><center>'.$player['nombre'].' '.$player['apellido'].'</center></td>';
                echo '<td data-title="Victórias"><center>0</center></td>';
                echo '<td data-title="Cambios"><center>--</center></td>';
                echo '</tr>';
            }
            echo '
                </tbody>
                </table>';
            echo '</div>';
            $contador2++;
        }
        ?>

    </div><!-- /.tab-content -->
</div><!-- /.tabbable -->
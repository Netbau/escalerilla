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
            <center><input type="text" name="filtrar" placeholder="Filtrar" onKeyUp="this.value = this.value.toUpperCase();"></center>
            <table class="table table-condensed table-striped tabled-bordered">
                <thead>
                    <tr class="">
                    <th width="10%"><center>Posición</center></th>
                    <th width="20%"><center>Foto</center></th>
                    <th width="50%">Nombre Jugador</th>
                    <th width="10%"><center>Victorias</center></th>
                    <th width="10%">Cambios</th>
                    </tr>
                </thead>
                <tbody class="ranking">';
            foreach ($ranking as $player) {
                $victorias = Jugadores::getVictorias($player['idJugadores']);
                echo '<tr>';
                echo '<td data-title="Ranking"><center>' . $player['ranking'] . '</center></td>';
                echo '<td><center><img class="img img-rounded" src="' . $player['foto'] . '" height ="100" width="100"></center></td>';
                echo '<td data-title="Nombre">' . $player['nombre'] . ' ' . $player['apellido'] . '</td>';
                echo '<td data-title="Victorias"><center>'.$victorias[0]['victorias'].'</center></td>';
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



<script>
    $('input[name="filtrar"]').keyup(function() {
        var filtroDiag = $(this).val().toUpperCase();
        if (filtroDiag == '') {
            $('.ranking').children('tr').children('td').each(function(index, domEle) {
                $(domEle).show();
            });
        }
        else {
            $('.ranking').children('tr').each(function(index, domEle) {
                if ($(domEle).children('td').text().indexOf(filtroDiag) !== -1) {
                    $(domEle).show();
                }
                else {
                    $(domEle).hide();
                }
            });
        }
    });
</script>
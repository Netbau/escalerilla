<center><h3>Próximos Desafíos</h3></center>
<div class="row-fluid">
    <?php
    include_once(dirname(__FILE__) . '/../capaControladores/encuentro.php');
    include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
    $ultimosEncuentros = Encuentro::getPróximosEncuentros($limite = 6);


    if (count($ultimosEncuentros) != 0) {
        $contador = 0;
        foreach ($ultimosEncuentros as $encuentro) {
            if ($contador % 2 == 0) {
                echo "<div class='row-fluid'>";
            }
            $jugador1 = Jugadores::getUsuarioPorJugador($encuentro['idJugadores']);
            $jugador2 = Jugadores::getUsuarioPorJugador($encuentro['idJugadores1']);

            $fecha = explode(' ', $encuentro['fecha']);
            echo '<div class="span6 well well-small"><!--1er Encuentro-->
                <div class="span4"><center>' . $jugador1[0]['nombre'] . ' ' . $jugador1[0]['apellido'] . '<br><img class="img-rounded" src="' . $jugador1[0]['foto'] . '"></center></div>'
            . '<div class="span4"><center>' . 'vs.<br>A contar del:' . '<br>' . $fecha[0] . '</center></div>'
            . '<div class="span4"><center>' . $jugador2[0]['nombre'] . ' ' . $jugador2[0]['apellido'] . '<br><img class="img-rounded" src="' . $jugador2[0]['foto'] . '"></center></div>'
            . '</div>';

            if ($contador % 2 !== 0) {
                echo '</div>';
            } elseif ($contador % 2 == 0 && ($contador+1) == count($ultimosEncuentros)) {
                echo '</div>';
            }
            $contador++;
        }//foreach
    } else {
        echo '<div class="alert alert-warning"><strong>No hay encuentros próximos.</strong></div>';
    }
    ?>
</div>
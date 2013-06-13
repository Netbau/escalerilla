<center><h3>Próximos Desafíos</h3></center>
<div id="myCarousel" class="carousel slide span12" data-interval="1500"  style="height: 100%;">
    <!-- Carousel items -->
    <center>
        <div class="carousel-inner">
            <?php
            include_once(dirname(__FILE__) . '/../capaControladores/encuentro.php');
            include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
            $ultimosEncuentros = Encuentro::getPróximosEncuentros($limite = 3);


            if (count($ultimosEncuentros) != 0) {
                foreach ($ultimosEncuentros as $encuentro) {

                    $jugador1 = Jugadores::getUsuarioPorJugador($encuentro['idJugadores']);
                    $jugador2 = Jugadores::getUsuarioPorJugador($encuentro['idJugadores1']);

                    $fecha = explode(' ', $encuentro['fecha']);
                    echo '<div class="span6 offset3 item well well-small">
                       <div class="span4"><center>' . $jugador1[0]['nombre'] . ' ' . $jugador1[0]['apellido'] . '<br><img class="img-rounded" src="' . $jugador1[0]['foto'] . '"></center></div>'
                    . '<div class="span4"><center>' . 'vs.<br>A contar del:' . '<br>' . $fecha[0] . '</center></div>'
                    . '<div class="span4"><center>' . $jugador2[0]['nombre'] . ' ' . $jugador2[0]['apellido'] . '<br><img class="img-rounded" src="' . $jugador2[0]['foto'] . '"></center></div>'
                    . '</div>';
                }
            } else {
                echo '<div class="alert alert-warning"><strong>No hay encuentros próximos.</strong></div>';
            }
            ?>
        </div>
    </center>
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>

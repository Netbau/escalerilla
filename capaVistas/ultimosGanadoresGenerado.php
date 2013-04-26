<center>
    <?php
    include_once('capaControladores/encuentro.php');
    $ultimosGanadores = Encuentro::ultimosGanadores();
    if (count($ultimosGanadores) != 0) {
        foreach ($ultimosGanadores as $ganadores) {
            echo '
        <div class="span3 well well-small"><!--1ra persona-->
        <center><img class="img img-rounded" src="' . $ganadores['foto'] . '" height="150" width="100"></center>
        <center><strong>' . $ganadores['nombre'] . ' ' . $ganadores['apellido'] . '</strong></center>
        <center>Ranking #' . $ganadores['ranking'] . '</center>
        </div>';
        }
    } else {
        echo '<div class="alert alert-warning"><strong>No hay ganadores.</strong></div>';
    }
    ?>
</center>
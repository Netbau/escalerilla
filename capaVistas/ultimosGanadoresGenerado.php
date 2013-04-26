<center>
    <?php
    include_once('capaControladores/jugadores.php');
    $ultimosGanadores = Encuentro::ultimosGanadores();
    if (count($ultimosGanadores) != 0) {
        foreach ($ultimosGanadores as $Ganadores) {
            echo '<div class="span3 well well-small"><!--1ra persona-->
        <center><img class="img img-rounded" src="' . $Ganadores['foto'] . '" height="150" width="100"></center>
        <center><strong>' . $Ganadores['nombre'] . ' ' . $Ganadores['apellido'] . '</strong></center>
        <center>Ranking #' . $Ganadores['ranking'] . '</center>
    </div>';
        }
    } else {
        echo '<div class="alert alert-warning"><strong>No hay ganadores.</strong>,
		eres n&uacute;mero uno en tu categor&iacute;a. Sigue atento a los desaf&iacute;os
		que te har&aacute;n.</div>';
    }
    ?>    
</center>
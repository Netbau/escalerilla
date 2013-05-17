<?php

include_once('capaControladores/encuentro.php');
$ultimosGanadores = Encuentro::ultimosGanadores();
if (count($ultimosGanadores) != 0) {
    $contador = 0;
    foreach ($ultimosGanadores as $ganadores) {
        echo '
                    <div class="well well-small span3">
                    <center><a href="' . $ganadores['foto'] . '" class="preview"><img class="img img-rounded" src="' . $ganadores['foto'] . '" height="150" width="100"></a></center>
                    <center><strong>' . $ganadores['nombre'] . ' ' . $ganadores['apellido'] . '</strong></center>
                    <center>Ranking #' . $ganadores['ranking'] . '<br> Categoría' . ' : ' . $ganadores['categoria'] . '</center>
                    </div>';

        $contador++;
    }
} else {
    echo '<div class="alert alert-warning"><strong>No hay ganadores.</strong></div>';
}
?>

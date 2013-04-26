<center>

    <?php
    include_once(dirname(__FILE__) . '/../capaControladores/encuentro.php');
    $ultimosEncuentros = Encuentro::getUltimosEncuentros($limite = 1);
    if (count($ultimosEncuentros) != 0) {
        foreach ($ultimosEncuentros as $encuentros) {
            echo '
                <div class="span6 well well-small"><!--1er Encuentro-->
                    <center>' . $encuentros['fecha'] . ' ' . $encuentros['idJugadores'] . ' ' . $encuentros['idJugadores1'] . '</center>
                </div>';
        }
    } else {
        echo '<div class="alert alert-warning"><strong>No hay encuentros pasados.</strong></div>';
    }
    ?>
</center>
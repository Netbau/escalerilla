<h3><center>Próximos Desafíos</center></h3>


<center>

    <?php
    include_once(dirname(__FILE__) . '/../capaControladores/encuentro.php');
	include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
    $ultimosEncuentros = Encuentro::getPróximosEncuentros($limite = 3);
	
	
    if (count($ultimosEncuentros) != 0) {
        foreach ($ultimosEncuentros as $encuentro) {
			
			$jugador1 = Jugadores::getUsuarioPorJugador($encuentro['idJugadores']);
			$jugador2 = Jugadores::getUsuarioPorJugador($encuentro['idJugadores1']);
			
			$fecha = explode(' ',$encuentro['fecha']);
            echo '<div class="span6 well well-small"><!--1er Encuentro-->
        <div class="span5">' . $jugador1[0]['nombre'] . ' ' .$jugador1[0]['apellido'] .'<br><img class="img" src="'.$jugador1[0]['foto'].'" heigth="60px" width="60px"></div>'
		.'<div class="span2">' .'A contar del:'.'<br>'. $fecha[0] .'</div>'
		.'<div class="span5">' . $jugador2[0]['nombre'] . ' ' .$jugador2[0]['apellido'] .'<br><img clas="img" src="'.$jugador2[0]['foto'].'" heigth="60px" width="60px"></div>'
 
    .'</div>';
        }
    } else {
        echo '<div class="alert alert-warning"><strong>No hay encuentros próximos.</strong></div>';
    }
    ?>
</center>
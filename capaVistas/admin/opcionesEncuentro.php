<br><br>
<div class="row-fluid">
    <table class="table table-condensed table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Jugador</th>
                <th>Jugador</th>
                <th>Fecha</th>
                <th>Cancha</th>
				<th>Ganador</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once(dirname(__FILE__) . '/../../capaControladores/encuentro.php');
			require_once(dirname(__FILE__) . '/../../utilidades/transformarDesafios.php');
            $encuentros = Enceuntro::Crud();
			$encuentros = transformaDesafios($encuentros);
			
            foreach ($encuentros as $encuentro) {
				
				$fecha = explode(' ', $encuentro['fecha']);
                echo '<tr><td>' . $encuentro['idJugadores'] . '</td><td>' . $encuentro['idJugadores1'] . '</td><td>' .$fecha[0]. '</td><td>' .$encuentro['idCancha'].'</td><td></td></tr>';


            }
            ?>
			</tbody>
        </table>
    </center>
</div>
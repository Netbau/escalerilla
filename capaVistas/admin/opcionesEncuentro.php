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
            require_once(dirname(__FILE__) . '/../../capaControladores/desafios.php');
			require_once(dirname(__FILE__) . '/../../utilidades/transformarDesafios.php');
            $desafios = Desafios::Crud();
			$desafios = transformaDesafios($desafios);
			
            foreach ($desafios as $desafio) {
				
				$fecha = explode(' ', $desafio['fecha']);
                echo '<tr><td>' . $desafio['idJugadores'] . '</td><td>' . $desafio['idJugadores1'] . '</td><td>' .$fecha[0]. '</td><td>' .$desafio['estado'].'</td><td></td></tr>';


            }
            ?>
			</tbody>
        </table>
    </center>
</div>
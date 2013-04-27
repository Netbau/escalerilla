<a href="#modalDesafios" role="button" class="btn btn-small btn-info" data-toggle="modal"></a>
<br><br>
<div class="row-fluid">
    <table class="table table-condensed table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Jugador</th>
                <th>Jugador</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once(dirname(__FILE__) . '/../../capaControladores/desafios.php');
            $desafios = Desafios::Crud();
            foreach ($desafios as $desafio) {
				
				$fecha = explode(' ', $desafios['fecha']);
                echo '<td>' . $desafio['estado'] . '</td><td>' . $fecha[0] . '</td>';


            }
            ?>
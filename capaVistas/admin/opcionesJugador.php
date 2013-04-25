<a class="btn btn-small btn-info newPlayer"><strong>Nuevo Jugador</strong></a><br><br>
<div class="row-fluid"><center>
    <table class="table-condensed table-striped table-hover table-bordered" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Ranking</th>
                <th>Categoria</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once(dirname(__FILE__) . '/../../capaAjax/getJugadores.php');
            foreach ($jugadores as $jugador) {
                if ($jugador['ranking'] == 1) {
                    echo "<tr><td colspan='8'><center><strong>Categoria " . $jugador['categoria'] . "</strong></center></td></tr>";
                }

                echo '<tr>
                ';

                echo "<td>" . $jugador['nombre'] . "</td>
                  <td>" . $jugador['apellido'] . "</td>
                  <td>" . $jugador['ranking'] . "</td>
                  <td>" . $jugador['categoria'] . "</td>
                  <td>
                  ";
                if ($jugador['ranking'] > 1) {
                    echo "<a class='btn btn-small btn-block'><i class='icon-circle-arrow-up'></i></a>";
                }
                echo "</td>
                <td><a class='btn btn-small btn-block'><i class='icon-remove-sign'></i></a></td>
                ";

                echo '</tr>
                ';
            }
            ?>
        </tbody>
    </table></center>
</div>
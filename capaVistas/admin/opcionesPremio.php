<a href="#modalPremios" role="button" class="btn btn-small btn-info" data-toggle="modal"><strong>Nuevo Premio</strong></a>
<br><br>
<div class="row-fluid">
    <table class="table table-condensed table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>PDF</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once(dirname(__FILE__) . '/../../capaControladores/premios.php');
            $premios = Premio::Crud();
            foreach ($premios as $premio) {
                if ($premio['estado'] == 1) {
                    echo '<tr class="success">';
                } elseif ($premio['estado'] == 0) {
                    echo '<tr class="warning">';
                }
                $pdf = explode('/', $premio['urlpdf']);
                echo '<td>' . $premio['titulo'] . '</td><td>' . $premio['descripcion'] . '</td>';
                if ($premio['estado'] == 1) {
                    echo '<td>Activo</td>';
                } elseif ($premio['estado'] == 0) {
                    echo '<td>Inactivo</td>';
                }
                echo "<td>".end($pdf)."</td><td><a class='btn editPremio' idPremio='".$premio['idPremios']."'><i class='icon-edit'></i></a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <!--<embed src="http://yoursite.com/the.pdf" width="500" height="375"><!-- premio -->






</div>

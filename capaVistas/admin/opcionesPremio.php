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
                echo "<td>" . end($pdf) . "</td><td><a class='btn editPremio' idPremio='" . $premio['idPremios'] . "'><i class='icon-edit'></i></a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <!--<embed src="http://yoursite.com/the.pdf" width="500" height="375"><!-- premio -->
</div>

<!-- Modal -->
<div id="modalPremios" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalPremiosLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Ingresar nuevo premio</h3>
    </div>
    <div class="modal-body">
        <table class='table table-condensed table-hover table-striped table-bordered'>
            <tbody>
                <tr><td>Titulo</td><td><input type='text' name='titulo' placeholder='Titulo del Premio'></td></tr>
                <tr><td>Descripcion</td><td><input type='text' name='descripcion' placeholder='Descripcion'></td></tr>
                <!--<tr><td colspan='2'><input type='file' id='upload-btn' name='pdf' placeholder='Seleccione archivo'></td></tr>-->
            </tbody>
        </table>
        <div class='alert alert-info'><strong>NOTA:</strong> El Premio estara <i>Inactivo</i> hasta que se cambie su estado en el listado.</div>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-info" id='upload-btn'><strong>Subir un Archivo</strong></button>
    </div>
</div>

<script>
    $('#upload-btn').click(function() {
        if ($('input[name="titulo"]').val() !== '') {
            var uploader = new ss.SimpleUpload({
                button: 'upload-btn',
                url: 'capaAjax/Upload.php',
                name: 'uploadfile',
                data: {
                    "titulo": $('input[name="titulo"]').val(),
                    "descripcion": $('input[name="descripcion"]').val(),
                    "tipo": "premio"
                }
            });
        }
    });
</script>
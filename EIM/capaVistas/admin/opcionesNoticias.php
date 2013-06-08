<a href="#modalNoticias" role="button" class="btn btn-small btn-primary" data-toggle="modal"><strong>Nueva Noticia</strong></a>

<br><br>
<div class="row-fluid">
    <table class="table table-condensed table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once(dirname(__FILE__) . '/../../capaControladores/noticias.php');
            $noticias = Noticia::Crude();
            foreach ($noticias as $vector) {
                //CREAMOS LOS TD CORRESPONDIENTES A CADA CAMPO SQL
                if ($vector['estado'] == 1) {
                    echo '<tr class="success">';
                } elseif ($vector['estado'] == 0) {
                    echo '<tr class="warning">';
                }
                echo '<td>' . $vector['fecha'] . '</td><td>' . $vector['titulo'] . '</td><td>' . $vector['contenido'] . '</td>';
                if ($vector['estado'] == 1) {
                    echo '<td>Activo</td>';
                } elseif ($vector['estado'] == 0) {
                    echo '<td>Inactivo</td>';
                }
                echo "<td><a class='btn editNoticia' idNoticia='" . $vector['idNoticias'] . "' href='#modalEditNoticias' data-toggle='modal'><i class='icon-edit'></i></a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="modalNoticias" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalNoticiasLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Ingresar nueva Noticia</h3>
    </div>
    <div class="modal-body">
        <div id="estadoNoticia"></div>
        <table class='table table-condensed table-hover table-striped table-bordered'>
            <tbody>
                <tr><td>Título</td><td><input type='text' name='titulo' placeholder='Título de la Noticia' id='titulo_input'></td></tr>
                <tr><td>Contenido</td><td><textarea rows="4" cols="50" placeholder='Contenido' name='contenido' id='contenido_input'></textarea></td></tr>
                <!--<tr><td colspan='2'><input type='file' id='upload-btn' name='pdf' placeholder='Seleccione archivo'></td></tr><!---->
            </tbody>
        </table>
        <div class='alert alert-info'><strong>NOTA:</strong> Puedes volver a editar estos datos mas adelante.</div>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id='noticia-upload-btn' data-loading-text="Subiendo..."><strong>Subir Noticia</strong></button>
    </div>
</div>
<!-- Modal Para editar-->
<div id="modalEditNoticias" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalEditNoticiasLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Editar Noticia Existente</h3>
    </div>
    <div class="modal-body">
        <div id="estadoNoticiaMod"></div>
        <table class='table table-condensed table-hover table-striped table-bordered'>
            <tbody>
                <tr><td>Título</td><td><input type='text' name='tituloMod' placeholder='Título de la Noticia' id='tituloMod_input'></td></tr>
                <tr><td>Contenido</td><td><textarea rows="4" cols="50" placeholder='Contenido' name='contenido' id='contenidoMod_input'></textarea></td></tr>
                <tr><td>Estado</td><td><input type="checkbox" value="1" name='estadoMod' id='estadoMod_input'/><input type="hidden" name="idNoticiaMod" id="idNoticiaMod_input"/></td></tr>
                <!--<tr><td colspan='2'><input type='file' id='upload-btn' name='pdf' placeholder='Seleccione archivo'></td></tr><!---->
            </tbody>
        </table>
        <div class='alert alert-info'><strong>NOTA:</strong> Puedes volver a editar estos datos mas adelante.</div>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id='noticia-edit-btn' data-loading-text="Editando..."><strong>Editar Noticia</strong></button>
    </div>
</div>

<script>
    $('#noticia-upload-btn').click(function() {
//        $(this).button('loading');
        if ($('#titulo_input').val() !== '' && $('#contenido_input').val() !== '') {
            $.ajax({
                url: 'capaAjax/Noticias.php',
                type: 'POST',
                data: {
                    titulo: $('#titulo_input').val(),
                    contenido: $('#contenido_input').val(),
                    tipo: 'add'
                },
                success: function(resultado){
                    var output = JSON.parse(resultado);
                    if(output.success === true){
                        $('#estadoNoticia').html('<div class="alert alert-danger">Noticia subida con exito!</div>');
                    }
                }
            });
        }
        else{
            $('#estadoNoticia').html('<div class="alert alert-danger">Debes Asignarle un Titulo y Contenido a la Noticia!</div>');
        }
    });
    //CAPTURAMOS EL HANDLER CADA VEZ QUE SE QUIERA MODIFICAR UNA NOTICIA PARA DE ESTA FORMA CAMBIAR LOS DATOS
    $('.editNoticia').click(function(){
        $("#idNoticiaMod_input").val($(this).attr('idNoticia'));
        $('#estadoNoticiaMod').html('');
        $.ajax({
            url: 'capaAjax/Noticias.php',
            type: 'POST',
            data: {
                id: $(this).attr('idNoticia'),
                tipo: 'getEdit'
            },
            success: function(resultado){
                var output = JSON.parse(resultado);
                $("#tituloMod_input").val(output.titulo);
                $("#contenidoMod_input").val(output.contenido);
                if(output.estado == 1)
                {
                    $("#estadoMod_input").removeAttr("checked");
                    $("#estadoMod_input").attr("checked","checked");
                }
                else
                {
                    $("#estadoMod_input").removeAttr("checked");
                }
            }
        })
    });
    //INIDAMOS EL EVENTO PARA CAPTURAR LOS MOD DE INFO
    $("#noticia-edit-btn").click(function(){
        if ($('#tituloMod_input').val() !== '' && $('#contenidoMod_input').val() !== '') {
            $.ajax({
                url: 'capaAjax/Noticias.php',
                type: 'POST',
                data: {
                    id: $('#idNoticiaMod_input').val(),
                    titulo: $('#tituloMod_input').val(),
                    contenido: $('#contenidoMod_input').val(),
                    status: ($("#estadoMod_input").is(":checked"))?1:0,
                    tipo: 'mod'
                },
                success: function(resultado){
                    var output = JSON.parse(resultado);
                    if(output.success === true){
                        $('#estadoNoticiaMod').html('<div class="alert alert-danger">Noticia editada con exito!</div>');
                    }
                }
            });
        }
        else{
            $('#estadoNoticiaMod').html('<div class="alert alert-danger">Debes Asignarle un Titulo y Contenido a la Noticia!</div>');
        }
    });
</script>

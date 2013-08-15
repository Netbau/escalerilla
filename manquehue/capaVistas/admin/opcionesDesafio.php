<br><br>
<div class="row-fluid">
    <table class="table table-condensed table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Jugador</th>
                <th>Jugador</th>
                <th>Fecha Inicio</th>
                <th>Fecha Maxima</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once(dirname(__FILE__) . '/../../capaControladores/desafios.php');
            require_once(dirname(__FILE__) . '/../../utilidades/transformarDesafios.php');
            $desafios = Desafios::Crud();
            $desafios = transformaDesafios($desafios);
            //print_r($desafios);
            foreach ($desafios as $desafio) {
                $fecha = explode(' ', $desafio['fecha']);
                echo '<tr id0="' . $desafio['id0'] . '" id1="' . $desafio['id1'] . '" fecha="' . $fecha[0] . '"';
                if ($desafio['estado'] == 'Pendiente') {
                    echo 'class="warning">';
                } elseif ($desafio['estado'] == 'Concretado') {
                    echo 'class="success">';
                } elseif ($desafio['estado'] == 'WO') {
                    echo 'class="danger">';
                }
                echo '<td class="jugador0">' . $desafio['idJugadores'] . '</td><td class="jugador1">' . $desafio['idJugadores1'] . '</td><td>' . $fecha[0] . '</td><td>---</td><td class="estado">' . $desafio['estado'] . '</td><td><a class="btn btn-small editDesafio" data-toggle="modal" href="#modalDesafio"><i class="icon-edit"> </i></a></td></tr>';
            }
            ?>
        </tbody>
    </table>
</center>
</div><!--listado de desafios del sistema-->

<div id="modalDesafio" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalDesafioLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modalDesafioLabel">Editar desafio</h3>
    </div>
    <div class="modal-body">

        <div id="estadoDesafio"></div>
        <div class="row-fluid">
            <div class="row-fluid">
                <div class="span6">Desafiante</div>
                <div class="span6 id0" id0=""></div>
            </div>
            <div class="row-fluid">
                <div class="span6">Desafiado</div>
                <div class="span6 id1" id1=""></div>
            </div>
            <div class="row-fluid">
                <div class="span6">Fecha Inicio desafio</div>
                <div class="span6 fecha" fecha=""></div>
            </div>
            <div class="row-fluid">
                <div class="span6">Fecha Máxima desafio</div>
                <div class="span6 fecha1" fecha=""></div>
            </div>

            <div class="span12">
                Estado del desafío
                <select name="estado">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Concretado">Concretado</option>
                    <option value="WO">WO</option>
                </select>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id="editarDesafio" data-loading-text="Guardando..."><strong>Guardar</strong></button>
    </div>
</div><!--modal para editar un desafio-->

<script>
    $('.editDesafio').click(function() {
        //se obtienen los datos de la linea seleccionada
        var id0 = $(this).parent().parent().attr('id0');
        var id1 = $(this).parent().parent().attr('id1');
        var fecha = $(this).parent().parent().attr('fecha');
        var estado = $('.estado').text();

        //se traspasan los datos respectivos al modal
        $('.id0').attr('id0', id0).text($('.jugador0').text());
        $('.id1').attr('id1', id1).text($('.jugador1').text());
        $('.fecha').attr('fecha', fecha).text(fecha);

        //se selecciona el estado respectivo
    });//click
</script><!--llenado del modal con los datos del desafio-->
<script>
    $('#modalDesafio').on('hide', function() {
        $('.refreshDesafios').click();
    });//on hide
</script><!--limpiado del modal cuando se esconde-->
<script>
    $('#editarDesafio').click(function() {
        //loading
        $(this).button('loading');

        //se rescatan las variables
        var id0 = $('.id0').attr('id0');
        var id1 = $('.id1').attr('id1');
        var fecha = $('.fecha').attr('fecha');
        var estado = $('select[name="estado"]').val();

        //se envian las variables via ajax al archivo que manejara el cambio de estado
        $.ajax({
            "url": "capaAjax/editarDesafio.php",
            "type": "post",
            "async": true,
            data: {
                "id0": id0,
                "id1": id1,
                "fecha": fecha,
                "estado": estado
            },
            success: function(output) {
                //alert(output);
                //actuar respecto al resultado
                if (output == '1') {
                    $('#estadoDesafio').html('<div class="alert alert-success"><strong>Desafío editado con éxito!</strong></div>'); //div para el resultado


                    setTimeout(function() {
                        $('#editarDesafio').button('reset');//reset del boton de guardado
                        $('#estadoDesafio').html('');
                    }, 2500);
                }
                else {
                    $('#estadoDesafio').html('<div class="alert alert-warning"><strong>Ha ocurrido un error</strong></div>'); //div para el resultado
                    $('#editarDesafio').button('reset');//reset del boton de guardado
                }
            }//success
        });//ajax



    });//click
</script><!--guardado de las modificaciones del desafio-->
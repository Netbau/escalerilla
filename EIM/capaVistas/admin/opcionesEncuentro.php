<a href="#modalEncuentro" role="button" class="btn btn-small btn-primary" data-toggle="modal"><strong>Nuevo Encuentro</strong></a>
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
            $encuentros1 = Encuentro::Crud();
            $encuentros = transformaDesafios($encuentros1);


            foreach ($encuentros as $encuentro) {

                $fecha = explode(' ', $encuentro['fecha']);
                echo '<tr><td>' . $encuentro['idJugadores'] . '</td><td>' . $encuentro['idJugadores1'] . '</td><td>' . $fecha[0] .
                '</td><td>' . $encuentro['nombre'] . '</td><td>' . $encuentro['idGanador'] . '</td>
                 <td></td>
                 </tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<div id="modalEncuentro" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalEncuentroLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modalEncuentroLabel">Ingresar nuevo encuentro</h3>
    </div>
    <div class="modal-body">
        <div class="estadoEncuentro"></div>
        <form method="post" action="" id="ingresoEncuentro">
            <table class="table-condensed table-striped table-hover table-bordered" width="100%">
                <tr>
                    <td>Desafíos</td>
                    <td colspan="2">
                        <select name="desafios" class="desafios" class="span11">
                            <option label="Seleccione el Desafío"></option>
                            <?php include(dirname(__FILE__) . '/../../capaAjax/listadoDesafios.php');
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Cancha</td>
                    <td>
                        <select>
                            <option label="Seleccione Cancha"></option>
                            <option value="2">Cancha 1</option>
                            <option value="3">Cancha 2</option>
                            <option value="4">Cancha 3</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Ganador</td>
                    <td>
                        <select class="ganadorGenerado">

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td><input type="text" name="fecha" class="datepicker"></td>
                </tr>
                <tr>
                    <td>Número de Set</td>
                    <td>
                        <select class="sets">
                            <option label="Seleccione cuantos sets"></option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
                </tr>
                <tr><td class="setsGenerado" colspan="2">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id="nuevoUsuario" data-loading-text="Cargando..." type="submit"><strong>Ingresar</strong></button>
    </div>
</div>

<script>
    $('.sets').change(function() {
        var numeroSets = $(this).val();
        var sets = "";
        for ($i = 0; $i < numeroSets; $i++) {
            sets += '<input type="text" name="set' + i + '" placeholder="Ej: 6-2">';
        }
        $('.setsGenerado').html(sets);

    });
</script>
<script>
    $('.desafios').change(function() {

        var idJugador = $('select[name="desafios"]').val().split("-");
        var nombreDelJugador = $('select[name="desafios"] option:selected').text().split("v/s");
        var jugador1 = '<option value="' + idJugador[0] + '">' + nombreDelJugador[0] + '</option>';
        var jugador2 = '<option value="' + idJugador[1] + '">' + nombreDelJugador[1] + '</option>';
        $('.ganadorGenerado').html('<option label="Seleccione al Ganador"></option>' + jugador1 + jugador2);
    });


</script>

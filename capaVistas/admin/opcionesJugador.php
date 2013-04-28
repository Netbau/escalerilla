<a href="#modalJugadores" role="button" class="btn btn-small btn-primary" data-toggle="modal"><strong>Nuevo Jugador</strong></a>
<br><br>
<div class="row-fluid">
    <center>
        <table class="table-condensed table-striped table-hover table-bordered" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Ranking</th>
                    <th>Categoría</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once(dirname(__FILE__) . '/../../capaAjax/getJugadores.php');
                foreach ($jugadores as $jugador) {
                    if ($jugador['ranking'] == 1) {
                        echo "<tr><td colspan='8'><center><strong>Categoría " . $jugador['categoria'] . "</strong></center></td></tr>";
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
                        echo "<a class='btn btn-small btn-block cambiarRanking' idJugadores='" . $jugador['idJugadores'] . "'><i class='icon-circle-arrow-up'></i></a>";
                    }
                    echo "</td>
                <td><a class='btn btn-small btn-block borrarJugador' idJugadores='" . $jugador['idJugadores'] . "'><i class='icon-remove-sign'></i></a></td>
                ";

                    echo '</tr>
                ';
                }
                ?>
            </tbody>
        </table>
    </center>
</div>
<div id="modalJugadores" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalJugadoresLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Asignar nuevo Jugador</h3>
    </div>
    <div class="modal-body">
        <div class='estadoJugadores'></div>
        <div id='datosIngreso'>
            Usuarios Disponibles para convertir en jugadores<br>
            <div class="input-append">
                <select name="noJugadores">
                    <?php
                    include_once(dirname(__FILE__) . '/../../capaAjax/usuariosNoJugadores.php');
                    ?>
                </select>
                <a class="btn btn-inverse refreshNoJugadores"><i class="icon-refresh icon-white"></i></a>
            </div>
            <table class="table" width="70%">
                <tr>
                    <td>Asignar Categoría</td>
                    <td>
                        <select name="categorias"  class="span6">
                            <?php
                            include_once(dirname(__FILE__) . '/../../capaAjax/getCategorias.php');
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        o Crear nueva categoría
                    </td>
                    <td>
                        <input type="text" name="nuevaCategoria" placeholder="Ej: D" class="span6" maxlength='1' onKeyUp="this.value = this.value.toUpperCase();">
                    </td>
                </tr>
            </table>
            <div class='alert alert-info'>
                <strong>*Nota:</strong> se asignará automaticamente el último ranking de la categoría seleccionada. Puede Cambiarlo
                posteriormente.
            </div>
            <script>
                            $('.refreshNoJugadores').click(function() {
                                $('select[name="noJugadores"]').load('capaAjax/usuariosNoJugadores.php', function() {
                                    //accion al refrescar
                                });
                            });
            </script>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary nuevoJugador"><strong>Ingresar</strong></button>
    </div>
</div>

<script>
    $('#modalJugadores').on('hide', function() {
        $('#datosIngreso').collapse('show');
        $('.estadoJugadores').html('');
        $('.nuevoJugador').show('');
        $('input[name="nuevaCategoria"]').val('');
    });
</script>

<script>
    $('.nuevoJugador').click(function() {
        $(this).button('loading');
        var idUsuarios = $('select[name="noJugadores"]').val();
        if ($('input[name="nuevaCategoria"]').val() !== '') {
            var categoria = $('input[name="nuevaCategoria"]').val();
        }
        else {
            var categoria = $('select[name="categorias"]').val();
        }

        $.ajax({
            "url": 'capaAjax/insertarNuevoJugador.php',
            data: {"idUsuarios": idUsuarios, "categoria": categoria},
            type: "post",
            async: false,
            success: function(output) {
                if (output == 1) {
                    $('#datosIngreso').collapse('hide');
                    $('.estadoJugadores').html('<div class="alert alert-success">Jugador asignado Correctamente</div>');
                    $('.nuevoJugador').hide();
                }
                else if (output == 0) {
                    $('.estadoJugadores').html('<div class="alert alert-danger">Asignacion presenta errores</div>');
                }
                else {
                    alert(output);
                }
                $('.nuevoJugador').button('reset');
            }
        });

    });
</script>
<a href="#modalJugadores" role="button" class="btn btn-small btn-primary" data-toggle="modal"><strong>Nuevo Jugador</strong></a>
<a role="button" class="btn btn-small btn-danger" id="guardarRanking" style="display:none;" data-loading-text="Guardando..."><strong>Guardar Ranking</strong></a>
<br><br>

<div class="tabbable">
    <ul class="nav nav-tabs">
        <?php
        include_once (dirname(__FILE__) . '/../../capaControladores/jugadores.php');
        $categorias = Jugadores::getCategorias();
        $contador = 0;
        foreach ($categorias as $categoria) {
            if ($contador == 0) {
                echo '<li class="active"><a href="#categoria' . $categoria['categoria'] . '" data-toggle="tab">Categoría ' . $categoria['categoria'] . '</a></li>';
            } else {
                echo '<li><a href="#categoria' . $categoria['categoria'] . '" data-toggle="tab">Categoría ' . $categoria['categoria'] . '</a></li>';
            }
            $contador++;
        }
        ?>
    </ul>

    <div class="tab-content" style="max-height: 800px;">
        <?php
        $contador2 = 0;
        foreach ($categorias as $categoria) {
            if ($contador2 == 0) {
                echo '<div id="categoria' . $categoria['categoria'] . '" class="tab-pane active">';
            } else {
                echo '<div id="categoria' . $categoria['categoria'] . '" class="tab-pane">';
            }
            $letra = $categoria['categoria'];
            $ranking = Jugadores::getRankingPorCategoria($letra);

            $cantidad = end($ranking)['ranking'];
            echo "
                <div class='row-fluid'>
                    <div class='span1'></div>
                    <div class='span3'><center><strong>Nombre</strong></center></div>
                    <div class='span3'><center><strong>Apellido</strong></center></div>
                    <div class='span2'><center><strong>Posición</strong></center></div>
                    <div class='span2'><center><strong>Victorias</strong></center></div>
                    <div class='span1'></div>
                </div>
                <ul class='img-rounded media-list jugadores' categoria='" . $letra . "' style='list-style-type: none;'>
                    ";

            for ($i = 1; $i <= $cantidad; $i++) {
                $puesto = 0;
                foreach ($ranking as $player) {
                    if ($player['ranking'] == $i) {

                        echo "<li class='media ui-state-default jugador' categoria='" . $player['categoria'] . "' id='" . $player['idUsuarios'] . "' style='border: #e0e0e0 solid thin;'>
                    <div class='span1'><center><i class='icon-resize-vertical'> </i></center></div>
                    <div class='span3'><center>" . $player['nombre'] . "</center></div>
                    <div class='span3'><center>" . $player['apellido'] . "</center></div>
                    <div class='span2'><center>" . $player['ranking'] . "</center></div>
                    <div class='span2'><center>--</center></div>
                    <div class='span1'>
                  ";

                        echo "<center><a class='btn btn-small borrarJugador' idJugadores='" . $player['idUsuarios'] . "'><i class='icon-remove-sign'></i></a></center>
                ";

                        echo '</div></li>
                ';

                        $puesto++;
                    }//if
                }//foreach
                if ($puesto == 0) {
                    echo '<li class="media ui-state-default jugador" categoria="' . $letra . '" id="0" style="border: #e0e0e0 solid thin;">
                       <div class="span1"><center><i class="icon-resize-vertical"> </i></center></div>
                    <div class="span3"><center>Jugador</center></div>
                    <div class="span3"><center>No Registrado</center></div>
                    <div class="span2"><center>' . $i . '</center></div>
                    <div class="span2"><center>--</center></div>
                    <div class="span1">';
                }
            }//for


            echo '
                </ul></div>';
            $contador2++;
        }
        ?>

    </div><!-- /.tab-content -->
</div><!-- /.tabbable -->


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
    $(document).ready(function() {
        $(".jugadores").sortable({
            placeholder: "ui-state-highlight",
            axis: "y",
            cursor: "move",
            containment: "parent",
            change: function(ui) {


            }
        });
        $(".jugadores").disableSelection();
    });
</script>

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

<script>
    $(".jugadores").on("sortchange", function(event, ui) {
        $('#guardarRanking').show();
    });

    $('#guardarRanking').click(function() {
        $(this).button('loading');
        $('.jugadores').each(function() {
            var categoria = $(this).attr('categoria');
            var rank = $(this).sortable("toArray");
            $.ajax({
                "url": "capaAjax/guardarRanking.php",
                type: "post",
                async: false,
                data:{"categoria":categoria, "rank":rank},
                success: function(output){
                    alert(output);
                }//success


            });//ajax


        });//each ranking
    });//click guardarRanking

</script>
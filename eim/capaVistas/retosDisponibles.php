<center>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
    include_once(dirname(__FILE__) . '/../capaControladores/desafios.php');
    $desafiosDisponibles = Jugadores::getDesafiosDisponibles($_SESSION['jugador']['ranking'], $_SESSION['jugador']['categoria']);
    if (count($desafiosDisponibles) != 0) {
        foreach ($desafiosDisponibles as $desafio) {
            echo '
        <div class="span3 well well-small"><!--1ra persona-->
        <center><img class="img img-rounded" src="' . $desafio['foto'] . '" height="150" width="100"></center>
        <center><strong>' . $desafio['nombre'] . ' ' . $desafio['apellido'] . '</strong></center>
        <center>Ranking #' . $desafio['ranking'] . '</center>';

            $esDesafiable = Desafios::esDesafiable($desafio['idJugadores']);
            $esDesafiador = Desafios::esDesafiador($desafio['idJugadores']);
            $soyDesafiador = Desafios::esDesafiable($_SESSION['jugador']['idJugadores']);


            if ($esDesafiable && !$esDesafiador) {
                if (!$soyDesafiador) {
                    echo '<center><a href="#myModal" class="btn btn-primary btn-block desafiar" idJugadores="' . $desafio['idJugadores'] . '" data-loading-text="cargando...">¡Desafiar!</a></center>';
                } else {
//                    echo '<center><a class="btn btn-block" disabled="disabled">Desafío en curso.</a></center>';
                }
            } else {
                echo '<center><a class="btn btn-warning btn-block" disabled="disabled">Desafío en curso.</a></center>';
            }
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-success"><strong>¡Felicitaciones!</strong>, eres número uno en tu categoría. Sigue atento a los desafíos que te harán.</div>';
    }
    ?>
</center>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirma tu desafío</h3>
    </div>
    <div class="modal-body">
        <p>Se enviará un e-mail a tu rival <span id="contrincante"><strong></strong></span> y al administrador del sitio para concretar la fecha y hora del encuentro.</p>
<?php
echo '<input type="hidden" class="desafiante" idJugadores="' . $_SESSION['jugador']['idJugadores'] . '" nombre="' . $_SESSION['usuario']['nombre'] . '" apellido="' . $_SESSION['usuario']['apellido'] . '" correo="' . $_SESSION['usuario']['correo'] . '" telefono="' . $_SESSION['usuario']['telefono'] . '">'
?>
        <input type="hidden" class="desafiado" idJugadores="" nombre="" apellido="" correo="" telefono="">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary confirmarDesafio">Confirmar</button>
    </div>
</div>
<script>
    var modalBody = $('.modal-body').html();
    $('#myModal').on('hidden', function() {
        $('.modal-body').html(modalBody);
        $('.confirmarDesafio').show().button('reset');
    });
</script>
<script>
    $('.desafiar').click(function() {
        $(this).button('loading');
        var desafiado = $(this).attr('idJugadores');
        $.ajax({
            url: 'capaAjax/getDatosJugador.php',
            data: {idJugadores: desafiado},
            type: 'post',
            async: false,
            success: function(output) {
                data = JSON.parse(output);

                $('.desafiado')
                        .attr('idJugadores', data.idJugadores)
                        .attr('nombre', data.nombre)
                        .attr('apellido', data.apellido)
                        .attr('correo', data.correo)
                        .attr('telefono', data.telefono);
                $('#contrincante').text('(' + data.nombre + ' ' + data.apellido + ')');
                $('#myModal').modal('show');
                $('.desafiar').button('reset');


            },
            500: function() {
                alert('Hubo un error con el servidor, intentalo nuevamente.');
                $('.desafiar').button('reset');
            }
        });
    });
</script>
<script>
    $('.confirmarDesafio').click(function() {
        $(this).button('loading');
        var desafiado = {
            "idJugadores": $('.desafiado').attr('idJugadores'),
            "nombre": $('.desafiado').attr('nombre'),
            "apellido": $('.desafiado').attr('apellido'),
            "correo": $('.desafiado').attr('correo'),
            "telefono": $('.desafiado').attr('telefono')
        };
        var desafiante = {
            "idJugadores": $('.desafiante').attr('idJugadores'),
            "nombre": $('.desafiante').attr('nombre'),
            "apellido": $('.desafiante').attr('apellido'),
            "correo": $('.desafiante').attr('correo'),
            "telefono": $('.desafiante').attr('telefono')
        };
        $.ajax({
            data: {"desafiado": desafiado, "desafiante": desafiante},
            url: 'capaAjax/enviarDesafio.php',
            type: 'post',
            success: function(output) {
                if (output == '1') {
                    $('.modal-body').text('Desafio enviado!.');
                    $('.confirmarDesafio').button('reset').hide();
                }
                else {
                    $('.modal-body').text('Hubo un error en el envio de la informacion, intentalo denuevo.');
                    $('.confirmarDesafio').button('reset');
                }
            },
            500: function() {
                alert('ups! , hubo un error con el servidor. Intentalo denuevo!.');
                $('.confirmarDesafio').button('reset');
            }
        });

    });

</script>
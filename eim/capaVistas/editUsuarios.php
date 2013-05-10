<?php
if (!isset($_SESSION['usuario'])) {
    session_start();
}
?>
<div class="well well-small">
    <table class="table-hover table-condensed table-bordered" width="99%">
        <tbody>
            <?php
            echo '    <tr>
              <td>Nombre:</td>
              <td><input type="text" class="editable" id="nombre" value=" ' . $_SESSION['usuario']['nombre'] . '" ></td>
              <td>Segundo Nombre:</td>
              <td><input type="text" class="editable" id="segundoNombre" value=" ' . $_SESSION['usuario']['segundoNombre'] . '" placeholder="segundo nombre"></td>
	  </tr>
          <tr>
               <td>Apellido:</td>
               <td><input type="text" class="editable" id="apellido" value=" ' . $_SESSION['usuario']['apellido'] . '"></td>
	       <td>Segundo Apellido:</td>
               <td><input type="text" class="editable" id="segundoapellido" value=" ' . $_SESSION['usuario']['segundoApellido'] . '" placeholder="segundo apellido"></td>
	  </tr>
               <td>E-mail:</td>
               <td colspan="3"><input type="text" class="editable" id="correo" value=" ' . $_SESSION['usuario']['correo'] . '"></td>
	  </tr>
               <td>Teléfono:</td>
               <td colspan="3"><input type="text" class="editable" id="telefono" value=" ' . $_SESSION['usuario']['telefono'] . '"></td>
	  </tr>';
            ?>
        </tbody>
    </table>
    <div class="row-fluid" id="saveChanges"></div>
    <hr>
    <table class="table-hover table-condensed table-bordered" width="99%">
        <tbody>
            <tr>
                <td>Foto:</td>
                <td width='20%'><center><?php echo '<img class="img-rounded" src="' . $_SESSION['usuario']['foto'] . '" style="max-height:100px; max-width:100px;">'; ?></center>
        <button class='btn btn-small btn-block btn-primary' href="#modalEdit" data-toggle="modal"><strong>Cambiar Foto</strong></button>
        </td>
        <td width='15%'>Acerca de ti: <br><small><i>(Agrega una frase que te idenfique como jugador)</i></small></td>
        <td><textarea class="editable" id="about" placeholder='ej: ¡Soy el más rudo!'><?php echo $_SESSION['usuario']['about']; ?></textarea></td>
        </tr>
        </tbody>
    </table>
</div>

<div id="modalEdit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modalEditLabel">Subir nueva Foto</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-info" id="editFoto">La foto seleccionada reemplazará a la anterior.</div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id="upload-btn"  data-loading-text='Subiendo...'>Subir Nueva foto</button>
    </div>
</div>

<script>
    var modal = $('#modalEdit .modal-body').html();
    $('#modalEdit').on('hidden', function() {
        $(this).children('.modal-body').html('').html(modal);
        $(this)
                .children('.modal-footer')
                .html('').html("<button class='btn' data-dismiss='modal' aria-hidden='true'>Volver</button>\n\
                                <button class='btn btn-primary' id='upload-btn' data-loading-text='Subiendo...'>Subir Nueva foto</button>");
        $('#editar').click();
    });//on hidden
</script>
<script>
    $('#upload-btn').click(function() {
        var uploader = new ss.SimpleUpload({
            button: 'upload-btn',
            url: 'capaAjax/Upload.php',
            name: 'uploadfile',
            data: {
                "tipo": "usuario"
            },
            onComplete: function(filename, response) {
                var output = $.parseJSON(response);
                if (output.success === true) {
                    $('#editFoto')
                            .attr('class', 'alert alert-success')
                            .html('<strong>Foto actualizada con exito!</strong>');
                    $('#upload-btn').remove();
                    $('.imgUsuario').attr('src', '').attr('src', output.ruta);
                }
            }
        });
    });
</script>
<script>
    $('.editable').keydown(function() {
        $('#saveChanges').html('<center><a class="btn btn-primary guardarCambios" data-loading-text="Guardando..."><strong>Guardar Cambios</strong></a>\n\
                                    <a class="btn btn-danger cancel"><strong>Cancelar</strong></a></center>');
        $('.guardarCambios').click(function() {
            $(this).button('loading');
            var nombre = $('#nombre').val();
            var segundoNombre = $('#segundoNombre').val();
            var apellido = $('#apellido').val();
            var segundoApellido = $('#segundoApellido').val();
            var correo = $('#correo').val();
            var telefono = $('#telefono').val();
            var about = $('#about').val();
            $.ajax({
                "url": "capaAjax/actualizarDatosUsuario.php",
                "type": "post",
                "data": {
                    "nombre": nombre,
                    "segundoNombre": segundoNombre,
                    "apellido": apellido,
                    "segundoApellido": segundoApellido,
                    "correo": correo,
                    "telefono": telefono,
                    "about": about},
                success: function(output) {
                    alert(output);

                }//success
            });// ajax
        });


        $('.cancel').click(function() {
            $('#editar').click();// se eliminan los cambios
        });
    });


</script>
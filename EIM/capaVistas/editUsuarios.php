<?php
if (!isset($_SESSION['usuario'])) {
    session_start();
    include_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
}
?>
<div class="well well-small">
    <table class="table-hover table-condensed table-bordered" width="99%">
        <thead>
            <tr colspan="4"><th><center>Mis Datos</center></td></th>
        </thead>
        <tbody>
            <?php
            $datos = Usuarios::Datos($_SESSION['usuario']['idUsuarios']);
            echo '    <tr>
              <td>Nombre:</td>
              <td><input type="text" class="editable" id="nombre" value="' . $datos[0]['nombre'] . '" onKeyUp="this.value = this.value.toUpperCase();"></td>
              <td>Segundo Nombre:</td>
              <td><input type="text" class="editable" id="segundoNombre" value="' . $datos[0]['segundoNombre'] . '" placeholder="segundo nombre" onKeyUp="this.value = this.value.toUpperCase();"></td>
	  </tr>
          <tr>
               <td>Apellido:</td>
               <td><input type="text" class="editable" id="apellido" value="' . $datos[0]['apellido'] . '" onKeyUp="this.value = this.value.toUpperCase();"></td>
	       <td>Segundo Apellido:</td>
               <td><input type="text" class="editable" id="segundoApellido" value="' . $datos[0]['segundoApellido'] . '" placeholder="segundo apellido" onKeyUp="this.value = this.value.toUpperCase();"></td>
	  </tr>
               <td>E-mail:</td>
               <td colspan="3"><input type="text" class="editable" id="correo" value="' . $datos[0]['correo'] . '"></td>
	  </tr>
               <td>Teléfono:</td>
               <td colspan="3"><input type="text" class="editable" id="telefono" value="' . $datos[0]['telefono'] . '"></td>
	  </tr>';
            ?>
        </tbody>
    </table>
    <div class="row-fluid" id="saveChanges"></div>
    <table class="table-hover table-condensed table-bordered" width="99%">
        <tbody>
            <tr>
                <td>Foto:</td>
                <td width='20%'><center><?php echo '<a class="preview" href="' . $_SESSION['usuario']['foto'] . '"><img class="img-rounded" src="' . $_SESSION['usuario']['foto'] . '" style="max-height:100px; max-width:100px;"></a>'; ?></center>
        <button class='btn btn-small btn-block btn-primary' href="#modalEdit" data-toggle="modal"><strong>Cambiar Foto</strong></button>
        </td>
        <td width='15%'>Acerca de ti: <br><small><i>(Agrega una frase que te idenfique como jugador)</i></small></td>
        <td><textarea class="editable" id="about" placeholder='ej: ¡Soy el más rudo!'><?php echo $datos[0]['about']; ?></textarea></td>
        </tr>
        </tbody>
    </table>
    <div class="row-fluid" id="savePass"></div>
    <table class="table-hover table-condensed table-bordered" width="99%">
        <thead>
            <tr colspan="4">
                <th><center>Modificar mi Contraseña</center></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>Contraseña actual</td>
                <td><input type="password" id="oldPass"></td>
                <td colspan="2"><center><a disabled="disabled" class="btn btn-primary btn-small" id="changePass" data-loading-text="Guardando..."><strong>Cambiar Contraseña</strong></a></center></td>
        </tr>
        <tr>
            <td>Contraseña nueva</td>
            <td><input type="password" id="newPass"></td>
            <td>Repetir Contraseña</td>
            <td><input type="password" id="reNewPass"></td>
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
//            alert(nombre);
            var segundoNombre = $('#segundoNombre').val();
//            alert(segundoNombre);
            var apellido = $('#apellido').val();
//            alert(apellido);
            var segundoApellido = $('#segundoApellido').val();
//            alert(segundoApellido);
            var correo = $('#correo').val();
//            alert(correo);
            var telefono = $('#telefono').val();
//            alert(telefono);
            var about = $('#about').val();
//            alert(about);
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
                    if (output == 1) {
                        setTimeout(function() {
                            $('#editar').delay('slow').click();// se refresca
                        }, 4000)
                        $('#saveChanges').html('<div class="alert alert-info"><strong>Cambios Guardados satisfactoriamente!.</strong></div>');
                    } else if (output == 0) {
                        $('#saveChanges').html('<div class="alert alert-danger"><strong>Ha ocurrido un error!, Vuelve a intentarlo.</strong></div>')
                    } else {
                        alert(output);
                    }

                }//success
            });// ajax
        });


        $('.cancel').click(function() {
            $('#editar').click();// se eliminan los cambios
        });
    });
</script>
<script>
//$('#changePass').click(function(){
//    $(this).button('loading');
//    var oldPass = $('#oldPass').val();
//    var newPass = $('#newPass').val();
//    var reNewPass = $('#reNewPass').val();
//
//    $.ajax({
//        "url": "",
//                "type": "post",
//                "data": {
//                    "oldPass": oldPass,
//                    "newPass": newPass,
//                    "reNewPass": reNewPass},
//                success: function(output){
//                    alert(output);
//                }
//    });
//
//});
</script>
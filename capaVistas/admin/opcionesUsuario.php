<a href="#modalUsuario" role="button" class="btn btn-small btn-info" data-toggle="modal"><strong>Nuevo Usuario</strong></a>
<a class="btn btn-small btn-inverse"><i class="icon-refresh icon-white"></i></a><br><br>
<div class="row-fluid">
    <table class="table-condensed table-striped table-hover table-bordered" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Segundo Nombre</th>
                <th>Apellido</th>
                <th>Segundo Apellido</th>
                <th>E-mail</th>
                <th>Telefono</th>
                <th>Foto</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once('capaAjax/getUsuarios.php');
            foreach ($usuarios as $usuario) {
                echo '<tr>
                ';

                echo "<td>" . $usuario['nombre'] . "</td>
                  <td>" . $usuario['segundoNombre'] . "</td>
                  <td>" . $usuario['apellido'] . "</td>
                  <td>" . $usuario['segundoApellido'] . "</td>
                  <td>" . $usuario['correo'] . "</td>
                  <td>" . $usuario['telefono'] . "</td>
                  <td>" . $usuario['foto'] . "</td>
                  <td><a class='btn btn-small btn-block'><i class='icon-remove-sign'></i></a></td>
               ";

                echo '</tr>
                ';
            }
            ?>
        </tbody>
    </table>
</div>

<div id="modalUsuario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modalUsuarioLabel">Ingresar nuevo usuario</h3>
    </div>
    <div class="modal-body">
        <form method="post" action="" id="ingresoUsuarioForm">
            <table class="table-condensed table-striped table-hover table-bordered" width="100%">
                <tr>
                    <td>Rut(*)</td>
                    <td colspan="2"><input type="text" name="rut" placeholder="Rut ej: 12344942-9"></td>
                </tr>
                <tr>
                    <td>Nombres</td>
                    <td><input type="text" name="nombre" placeholder="primer nombre(*)" class="required"></td>
                    <td><input type="text" name="segundoNombre"placeholder="segundo nombre"></td>
                </tr>
                <tr>
                    <td>Apellidos</td>
                    <td><input type="text" name="apellido" placeholder="apellido paterno(*)" class="required"></td>
                    <td><input type="text" name="segundoApellido" placeholder="apellido materno"></td>
                </tr>
                <tr>
                    <td>Fecha de Nacimiento(*)</td>
                    <td colspan="2"><input type="text" name="fechaNacimiento" placeholder="fecha de nacimiento" class="datepicker required"></td>
                </tr>
                <tr>
                    <td>Sexo(*)</td>
                    <td><input type="radio" name="sexo" value="1" class="required"> Masculino</td>
                    <td><input type="radio" name="sexo" value="0" class="required"> Femenino</td>
                </tr>
                <tr>
                    <td>Telefonos</td>
                    <td><input type="text" name="telefono" placeholder="telefono(*)" class="required"></td>
                    <td><input type="text" name="telefono2" placeholder="telefono2"></td>
                </tr>
                <tr>
                    <td>Correo Electronico(*)</td>
                    <td colspan="2"><input type="text" name="correo" placeholder="correo electronico" class="required"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-info" id="nuevoUsuario" data-loading-text="Cargando..." type="submit"><strong>Ingresar</strong></button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#ingresoUsuarioForm').validate();
    });
    $('#nuevoUsuario').click(function() {
        $(this).button('loading');
        var rut = $('input[name="rut"]').val();
        var nombre = $('input[name="nombre"]').val();
        var segundoNombre = $('input[name="segundoNombre"]').val();
        var apellido = $('input[name="apellido"]').val();
        var segundoApellido = $('input[name="segundoApellido"]').val();
        var fechaNacimiento = $('input[name="fechaNacimiento"]').val();
        var sexo = $('input[name="sexo"]').val();
        var telefono = $('input[name="telefono"]').val();
        var telefono2 = $('input[name="telefono2"]').val();
        var correo = $('input[name="correo"]').val();
        var datos = {
            "rut": rut,
            "nombre": nombre,
            "segundoNombre": segundoNombre,
            "apellido": apellido,
            "segundoApellido": segundoApellido,
            "fechaNacimiento": fechaNacimiento,
            "sexo": sexo,
            "telefono": telefono,
            "telefono2": telefono2,
            "correo": correo
        };
        $.ajax({
            "url": 'capaAjax/insertarNuevoUsuario.php',
            data: datos,
            "type": "post",
            "async": false,
            success: function(output) {
                alert(output);
                $('#nuevoUsuario').button('reset');
            }

        });


    });
</script>
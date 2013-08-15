<div class="input-prepend input-append">
    <a href="#modalUsuario" role="button" class="btn btn-primary" data-toggle="modal"><strong>Nuevo Usuario</strong></a>
    <input class="" type="text" name="filtrar" placeholder="Filtrar" onKeyUp="this.value = this.value.toUpperCase();">
    <div class="btn-group">
        <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
            Redactar Correo
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="#modalCorreo" class="emailSelected" data-toggle="modal">Seleccionados</a></li>
            <li><a href="#EliminarSelecccion" class="emailNone">Eliminar Seleccionados</a></li>
            <li><a href="#modalCorreo" class="emailAll" data-toggle="modal">Enviar a todos</a></li>
        </ul>
    </div>

</div><!--opciones de usuario-->
<br><br>

<div class="row-fluid" style="max-height: 600px; overflow: auto;">
    <table class="table-condensed table-striped table-hover table-bordered" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Segundo Apellido</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tablaUsuarios">
            <?php
            include_once(dirname(__FILE__) . '/../../capaAjax/getUsuarios.php');
            foreach ($todos as $uno) {
                echo '<tr>
                ';

                echo "
                  <td>" . $uno['nombre'] . "</td>
                  <td>" . $uno['apellido'] . "</td>
                  <td>" . $uno['segundoApellido'] . "</td>
                  <td>" . $uno['correo'] . "</td>
                  <td>" . $uno['telefono'] . "</td>
                  <td>
                  <center>
                          <a class='btn btn-small borrarUsuario' idUsuarios='" . $uno['idUsuarios'] . "' data-toggle='modal' href='#modalBorrarUsuario'><i class='icon-remove-sign'></i></a>
                          <a class='btn btn-small editarUsuario' idUsuarios='" . $uno['idUsuarios'] . "' data-toggle='modal' href='#modalEdit'><i class='icon-edit'></i></a>
                          <input type='checkbox' class='selectUser' idUsuarios='" . $uno['idUsuarios'] . "'>
                  </center>
                  </td>
                  ";

                echo '</tr>
                ';
            }
            ?>
        </tbody>
    </table>
</div><!-- listado de usuarios del sistema-->

<div id="modalUsuario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modalUsuarioLabel">Ingresar nuevo usuario</h3>
    </div>
    <div class="modal-body">
        <div class="estadoIngreso"></div>
        <form method="post" action="" id="ingresoUsuarioForm">
            <table class="table-condensed table-striped table-hover table-bordered" width="100%">
                <tr>
                    <td>Rut(*)</td>
                    <td colspan="2"><input type="text" name="rut" placeholder="Rut ej: 12344942-9"></td>
                </tr>
                <tr>
                    <td>Nombres</td>
                    <td><input type="text" name="nombre" placeholder="primer nombre(*)" class="required" onKeyUp="this.value = this.value.toUpperCase();"></td>
                    <td><input type="text" name="segundoNombre"placeholder="segundo nombre" onKeyUp="this.value = this.value.toUpperCase();"></td>
                </tr>
                <tr>
                    <td>Apellidos</td>
                    <td><input type="text" name="apellido" placeholder="apellido paterno(*)" class="required" onKeyUp="this.value = this.value.toUpperCase();"></td>
                    <td><input type="text" name="segundoApellido" placeholder="apellido materno" onKeyUp="this.value = this.value.toUpperCase();"></td>
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
                    <td>Teléfonos</td>
                    <td><input type="text" name="telefono" placeholder="telefono(*)" class="required"></td>
                    <td><input type="text" name="telefono2" placeholder="telefono2"></td>
                </tr>
                <tr>
                    <td>Correo Electrénico(*)</td>
                    <td colspan="2"><input type="text" name="correo" placeholder="correo electronico" class="required"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id="nuevoUsuario" data-loading-text="Cargando..." type="submit"><strong>Ingresar</strong></button>
    </div>
</div><!-- modal para crear un nuevo usuario-->

<div id="modalCorreo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modalUsuarioLabel">Envío de Correo a Usuarios</h3>
    </div>
    <div class="modal-body">
        <div class="estadoEmail"></div>
        <div><input type="text" name="subject" placeholder="Asunto" id="asuntoEmail"></div>
        <div><textarea name="textEditor" id="mensajeEmail" placeholder="Mensaje" style="height: 200px;"></textarea></div>
    </div>
    <div class="modal-footer">
        <div class="progress progress-info progress-striped active">
            <div class="bar" style="width: 0%;"></div>
        </div>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id="enviarEmail" data-loading-text="Cargando..." type="submit"><strong>Enviar Correo</strong></button>
    </div>
</div><!-- modal para enviar correos-->

<div id="modalEdit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modalUsuarioLabel">Editar Usuario</h3>
    </div>
    <div class="modal-body">
        <div class="estadoEdit"></div>
        <table class="table-condensed table-striped table-hover table-bordered" width="100%">
            <tr>
                <td><input type="text" class="primerNombre" placeholder="Primer Nombre(*)"></td>
                <td><input type="text" class="segundoNombre" placeholder="Segundo Nombre"></td>
            </tr>
            <tr>
                <td><input type="text" class="apellidoPaterno" placeholder="Apellido Paterno(*)"></td>
                <td><input type="text" class="apellidoMaterno" placeholder="Apellido Materno"></td>
            </tr>
            <tr>
                <td><input type="text" class="telefono" placeholder="Telefono(*)"></td>
                <td><select class="sexo">
                        <option value="1">Masculino</option>
                        <option value="0">Femenino</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="text" class="fechaNacimiento" placeholder="Fecha de Nacimiento(*)"></td>
                <td><input type="text" class="email" placeholder="E-mail(*)"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id="editarUsuario" data-loading-text="Cargando..."><strong>Guardar</strong></button>
    </div>
</div><!-- modal para editar los datos de usuario-->

<div id="modalBorrarUsuario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalBorrarUsuarioLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="modalBorrarUsuarioLabel">Borrar Usuario</h3>
    </div>
    <div class="modal-body">
        <div id="idUsuario" style="display: none;"></div>
        <div class="estadoBorrado">
            <div class="alert alert-warning">El usuario será eliminado de la base de datos!!.</div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
        <button class="btn btn-primary" id="borrarUsuario" data-loading-text="Cargando..." type="submit"><strong>Confirmar</strong></button>
    </div>
</div><!-- modal para confirmar el borrado de usuarios-->

<script>
        $('#modalUsuario').on('hide', function() {
            $('#ingresoUsuarioForm').collapse('show');
            $('.estadoIngreso').html('');
            $('#nuevoUsuario').show('');
            $('input[name="rut"]').val('');
            $('input[name="nombre"]').val('');
            $('input[name="segundoNombre"]').val('');
            $('input[name="apellido"]').val('');
            $('input[name="segundoApellido"]').val('');
            $('input[name="fechaNacimiento"]').val('');
            $('input[name="telefono"]').val('');
            $('input[name="telefono2"]').val('');
            $('input[name="correo"]').val('');
        });
</script><!-- cuando el modal se esconde-->
<script>
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
                if (output == 1) {
                    $('#ingresoUsuarioForm').collapse('hide');
                    $('.estadoIngreso').html('<div class="alert alert-success">Usuario Ingresado Correctamente</div>');
                    $('#nuevoUsuario').hide();
                } else if (output == 0) {
                    $('.estadoIngreso').html('<div class="alert alert-danger">Faltan datos!</div>');
                } else if (output == 2) {
                    $('.estadoIngreso').html('<div class="alert alert-danger">Usuario Ya Registrado!</div>');
                } else {
                    alert(output);
                }
                $('#nuevoUsuario').button('reset');
            }
        });
    });
</script><!-- creacion de usuario-->
<script>
    $('input[name="filtrar"]').keyup(function() {
        var filtroDiag = $(this).val().toUpperCase();
        if (filtroDiag == '') {
            $('#tablaUsuarios').children('tr').children('td').each(function(index, domEle) {
                $(domEle).show();
            });
        }
        else {
            $('#tablaUsuarios').children('tr').each(function(index, domEle) {
                if ($(domEle).children('td').text().indexOf(filtroDiag) !== -1) {
                    $(domEle).show();
                }
                else {
                    $(domEle).hide();
                }
            });
        }
    });
</script><!-- live filter -->
<script>
    $('.emailAll').click(function() {
        $('.selectUser').prop('checked', true);
    });
    $('.emailNone').click(function() {
        $('.selectUser').prop('checked', false);
    });
</script><!-- seleccion y deseleccion de usuarios-->
<script>
    $('#modalCorreo').on('show', function() {
        var usuarios = $('.selectUser:checked').length;
        $('#modalCorreo .estadoEmail').html('<div class="alert alert-info">Se enviara un correo a <strong>' + usuarios + '</strong> usuarios.</div>');
        if (usuarios < 1) {
            $('#enviarEmail').attr('disabled', 'disabled');
        }
        $('.bar').css('width', '0%');
        $('#asuntoEmail').val('');
        $('#mensajeEmail').val('');
    });
</script><!-- modal correo-->
<script>
    $('#enviarEmail').click(function() {
        $(this).button("loading");
        var asuntoEmail = $('#asuntoEmail').val();
        var mensajeEmail = $('#mensajeEmail').val();
        var cantEnvios = $('.selectUser:checked').length;
        var enviados = 0;
        $('.selectUser:checked').each(function() {
            var idUsuarios = $(this).attr('idUsuarios');
            $.ajax({
                url: "capaAjax/enviarCorreo.php",
                data: {"idUsuarios": idUsuarios, "asunto": asuntoEmail, "mensaje": mensajeEmail},
                async: false,
                type: "post",
                success: function(output) {
                    if (output == 1) {
                        enviados++;
                        setTimeout(function() {
                            $('.bar').css('width', enviados / cantEnvios * 100 + '%');
                        }, 2000);//timeout
                    }//if
                }//success
            });//ajax
        });//each
        if (enviados == cantEnvios) {
            $('#modalCorreo .estadoEmail').html('<div class="alert alert-success">Correo enviado a <strong>' + enviados + '</strong> usuarios.</div>');
            $('#enviarEmail').attr('disabled', 'disabled').html('Enviados!');
        }
    });
</script><!-- envio de correo -->
<script>
    $('.editarUsuario').click(function() {
        var idUsuarios = $(this).attr('idUsuarios');

        $.ajax({
            "url": "capaAjax/getDatosUsuario.php",
            "data": {"idUsuarios": idUsuarios},
            "type": "post",
            "async": false,
            success: function(output) {
                var datos = jQuery.parseJSON(output);
                alert(datos.idUsuarios);
            }//success
        });//ajax

    });
</script><!-- edicion de los datos del usuario-->
<script>
    $('.borrarUsuario').click(function() {
        var idUsuario = $(this).attr('idUsuarios');
        $('#idUsuario').text(idUsuario);
        //traspaso del idUsuario correspondiente para eliminar
    });//click
    $('#borrarUsuario').click(function() {
        $(this).button('loading');
        //identificador del registro que se quiere borrar
        var idUsuario = $('#idUsuario').text();
        //se envia al ajax para borrar el registro
        $.ajax({
            url: "capaAjax/borrarRegistro.php",
            data: {
                "idUsuario": idUsuario,
                "tipo": "usuario"
            },
            type: "post",
            success: function(output) {
                //manejar resultados con variables numericas
                alert(output);
                if (output === 1) {
                    $('.estadoBorrado').html('<div class="alert alert-success"><strong>Usuario borrado con éxito!</strong></div>');
                    setTimeout(function() {
                        //esconder modal y refrescar la seccion si corresponde
                    }, 2000);//timeout
                }//if (1) -> resultado favorable
                else if (output === 0) {
                    $('.estadoBorrado').html('<div class="alert alert-danger"><strong>Usuario borrado con éxito!</strong></div>');
                    setTimeout(function() {
                        //esconder modal y refrescar la seccion si corresponde
                    }, 2000);//timeout
                }//if (0) -> resultado desfavorable
                else {
                    alert(output);
                }//resultado extrano
            }//success
        });//ajax
    });//click

</script><!-- eliminacion de un usuario-->
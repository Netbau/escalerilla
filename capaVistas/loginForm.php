<div class="">
    <center><h3>Conectarse</h3></center>
    <input type="text" name='user' class="input-block-level" placeholder="Ej: 15035156-k">
    <input type="password" name='password' class="input-block-level" placeholder="Contraseña">
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Recordarme
    </label>
    <button class="btn btn-large btn-primary btn-block" id='ingresar' data-loading-text="cargando...">Ingresar</button><div id="loginEstado"></div>
    <br>
    <center><a href="#">¿Olvidó su contraseña?</a></center>
</div>
<script>
    $('#ingresar').click(function() {
        $(this).button('loading');
        var usuario = $('input[name="user"]').val();
        var password = $('input[name="password"]').val();
        if (usuario !== '' && password !== '') {
            $.ajax({
                url: "capaAjax/login.php",
                data: {"usuario": usuario, "password": password},
                type: "post",
                async: false,
                success: function(output) {
                    if (output == 1) {
                        $('#loginEstado').html('<div class="alert alert-danger"><center>¡Usuario y contraseña no coinciden!</center></div>');
                    }
                    else if (output == 0) {
                        $('#loginEstado').html('<div class="alert alert-danger"><center>¡Error en envío de datos!</center></div>');
                    }
                    else if (output == 2) {
//                        alert(output);
                        window.location = 'usuario.php';
                    }
                    else if (output == 3) {
                        $('#loginEstado').html('<div class="alert alert-danger"><center>¡No se guardo la sesión!</center></div>');
                    } else {
                        alert(output);
                    }
                    $('#ingresar').button('reset');
                },
                statusCode: {
                    500: function() {
                        $('#loginEstado').html('<div class="alert alert-danger"><center>El servidor presenta problemas, ¡Inténtelo nuevamente!</center></div>');
                        $('#ingresar').button('reset');
                    }
                }


            });
        }//if
        else {
            $('#loginEstado').html('<div class="alert alert-danger">¡Debe llenar los campos!</div>');
            $(this).button('reset');
        }
    });
</script>
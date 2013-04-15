<div class="form-signin">
    <h3 class="form-signin-heading">Conectarse</h3>
    <input type="text" name='user' class="input-block-level" placeholder="Ej: 15035156-k">
    <input type="password" name='password' class="input-block-level" placeholder="Contrase&ntilde;a">
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Recordarme
    </label>
    <button class="btn btn-large btn-primary" id='ingresar' data-loading-text="cargando..." type="submit">Ingresar</button><div id="loginEstado"></div>
    <br>
    <a href="#">¿Olvid&oacute; su contrase&ntilde;a?</a>
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
                success: function(output) {
                    if (output == 1) {
                        $('#loginEstado').html('<div class="alert alert-danger"><center>Usuario y password no coinciden!</center></div>');
                    }
                    else if (output == 0) {
                        $('#loginEstado').html('<div class="alert alert-danger"><center>Error en envio de datos!</center></div>');
                    }
                    else if (output == 2) {
                        window.location = 'usuario.php';
                    }
                    $('#ingresar').button('reset');
                }


            });
        }//if 
        else {
            $('#loginEstado').html('<div class="alert alert-danger">Debes llenar los campos!</div>');
            $(this).button('reset');
        }
    });
</script>
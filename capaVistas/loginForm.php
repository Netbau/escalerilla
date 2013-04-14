<div class="form-signin">
    <h3 class="form-signin-heading">Conectarse</h3>
    <input type="text" name='user' class="input-block-level" placeholder="Ej: 15035156-k">
    <input type="password" name='password' class="input-block-level" placeholder="Contrase&ntilde;a">
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Recordarme
    </label>
    <button class="btn btn-large btn-primary" id='ingresar' data-loading-text="cargando...">Ingresar</button>
    <br>
    <a href="#">¿Olvid&oacute; su contrase&ntilde;a?</a>
</div>
<script>
$('#ingresar').click(function(){
   $(this).button('loading');
   var usuario = $('input[name="user"]').val();
   var password = $('input[name="password"]').val();
        $.ajax({
            url: "capaAjax/datosUsuario.php",
            data: {"usuario" : usuario, "password": password},
            type: "post",
            success: function(output){
                alert(output);
                $('#ingresar').button('reset');
            }
            
       
        }); 
});
</script>
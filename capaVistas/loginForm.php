<div class="form-signin">
    <h3 class="form-signin-heading">Conectarse</h3>
    <input type="text" class="input-block-level" placeholder="Ej: 15035156-k">
    <input type="password" class="input-block-level" placeholder="Contrase&ntilde;a">
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Recordarme
    </label>
    <button class="btn btn-large btn-primary" id='ingresar'>Ingresar</button>
    <br>
    <a href="#">¿Olvid&oacute; su contrase&ntilde;a?</a>
</div>

<script type='text/javascript'>
$('#ingresar').click(function(){
    var data = '14659205-8';
    $.ajax({
            url: 'capaAjax/datosUsuario.php',
            type: 'post',
            data: {'data':data},
            success: function(output){
            alert(output);
            }
    }); //end ajax
});
</script>  
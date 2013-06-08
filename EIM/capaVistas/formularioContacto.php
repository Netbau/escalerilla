<form method='post'>
    <div class='row-fluid'>
            <div id = "estadoContacto"></div>
            <div class="row-fluid">
                <div class="span4">NOMBRE:</div>
                <div class="span8"><input type="text" name="name" id="name_input" size="36" style="text-align: justify"></div>
            </div>
            <div class="row-fluid">
                <div class="span4">CORREO:</div>
                <div class="span8"><input type="text" name="e-mail" id="e-mail_input" size="36" style="text-align: justify" placeholder="ejemplo@tucorreo.cl"></div>
            </div>
            <div class="row-fluid">
                <div class="span4">ASUNTO:</div>
                <div class="span8"> <select name="mydropdown" id="mydropdown_input">
                        <option value="Consulta">Consulta</option>
                        <option value=Reclamo">Reclamo</option>
                        <option value="Sugerencia">Sugerencia</option>
                    </select>
                </div>
            </div>
            <div class="row-fluid">
                <div class="row-fluid">MENSAJE: </div>
            </div>
            <div class="row-fluid">
                <div class="row-fluid"><textarea name="txtmessage" id="txtmessage_input" rows="8" cols="300" style="text-align: justify" width='90%'></textarea></div>
            </div>

            <div class="row-fluid">
                <div class="row-fluid">
                    <input type="reset" name="limpiar" value="Limpiar" class='btn' id="contact_clear_btn" />
                    <input type="button" name="enviar" value="Enviar" class='btn btn-primary' id="contact_submit_btn"/>
                </div>
            </div>
    </div>
</form>
<script type="text/javascript">
    $("#contact_submit_btn").click(function(){
        if($("#name_input").val() != '' && $("#e-mail_input").val() != '' && $("#txtmessage_input").val() != '')
        {
            $.ajax({
                url:'capaAjax/Contacto.php',
                type: 'POST',
                data:{
                    name: $("#name_input").val(),
                    mail: $("#e-mail_input").val(),
                    consulta: $("#mydropdown_input").val(),
                    message: $("#txtmessage_input").val()
                },
                success: function(resultado)
                {
                    var result = JSON.parse(resultado);
                    if(result.status)
                    {
                        $('#estadoContacto').html('<div class="alert alert-success">'+$("#mydropdown_input").val()+' efectuada con exito.</div>');
                    }
                    else
                    {
                        $('#estadoContacto').html('<div class="alert alert-danger">Existe un problema al enviar la peticion.</div>');
                    }
                    
                }
            });
        }
        else
        {
            $('#estadoContacto').html('<div class="alert alert-danger">Faltan datos por completar.</div>');
        }
    
    });
    $("#contact_clear_btn").click(function(){
        $("#name_input").val('');
        $("#e-mail_input").val('');
        $("#mydropdown_input").val('Consulta');
        $("#txtmessage_input").val('');
    });
</script>
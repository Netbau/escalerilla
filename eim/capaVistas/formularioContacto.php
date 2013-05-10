<form method='post'>
    <div class='row-fluid'>
            <div class="row-fluid">
                <div class="span4">NOMBRE:</div>
                <div class="span8"><input type="text" name="name" size="36" style="text-align: justify"></div>
            </div>
            <div class="row-fluid">
                <div class="span4">CORREO:</div>
                <div class="span8"><input type="text" name="e-mail" size="36" style="text-align: justify" placeholder="ejemplo@tucorreo.cl"></div>
            </div>
            <div class="row-fluid">
                <div class="span4">ASUNTO:</div>
                <div class="span8"> <select name="mydropdown">
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
                <div class="row-fluid"><textarea name="txtmessage" rows="8" cols="300" style="text-align: justify" width='90%'></textarea></div>
            </div>

            <div class="row-fluid">
                <div class="row-fluid">
                    <input type="reset" name="limpiar" value="Limpiar" class='btn'>
                    <input type="submit" name="enviar" value="Enviar" class='btn btn-primary'>
                </div>
            </div>
    </div>
</form>
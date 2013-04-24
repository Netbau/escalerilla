<form method=post>
    <table class='table table-striped'>
        <center>
            <tr>
                <td>NOMBRE:	</td><td> <input type="text" name="name" size="36" style="text-align: justify"></td>	
            </tr>
            <tr>
                <td>CORREO:</td><td><input type="text" name="e-mail" size="36" style="text-align: justify" placeholder="ejemplo@tucorreo.cl"></td>
            </tr>
            <tr>
                <td>ASUNTO:</td>
                <td> <select name="mydropdown">
                        <option value="Consulta">Consulta</option>
                        <option value=Reclamo">Reclamo</option>
                        <option value="Sugerencia">Sugerencia</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan='2'>MENSAJE: </td>
            </tr>
            <tr>
                <td colspan='2'><textarea name="txtmessage" rows="8" cols="300" style="text-align: justify" width='90%'></textarea></td>
            </tr>		

            <tr>
                <td>
                    <input type="reset" name="limpiar" value="Limpiar" class='btn'>	
                    <input type="submit" name="enviar" value="Enviar" class='btn btn-info'>	
                </td>
            </tr>
        </center>	
    </table>
</form>
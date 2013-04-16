		<FORM action="form.php" method=post>
			NOMBRE:	 <input type="text" name="name" size="36" style="text-align: justify">	 <br><br>	
			CORREO:	<input type="text" name="e-mail" size="36" style="text-align: justify" value="ejemplo@tucorreo.cl" >	
				<br><br>
				
			ASUNTO: <select name="mydropdown">
				<option value="Consulta">Consulta</option>
				<option value="Reclamo">Reclamo</option>
				<option value="Sugerencia">Sugerencia</option>
				</select><br>
					
			MENSAJE: <textarea name="txtmessage" rows="8" cols="72" style="text-align: justify"></textarea>	
				<br><br>	
				<center>	
			<INPUT TYPE="RESET" NAME="limpiar" VALUE="LIMPIAR">	
			<INPUT TYPE="SUBMIT" NAME="enviar" VALUE="ENVIAR">	
			</center>	

		</FORM>
<?php
if (!isset($_SESSION['usuario'])) {
    session_start();
}
?>
<div class="well well-small">
    <table class="table-hover table-condensed table-bordered" width="99%">
        <tbody>
            <?php
            echo '    <tr>
              <td>Nombre:</td>
              <td><input type="text" value=" ' . $_SESSION['usuario']['nombre'] . '" disabled = disabled></td>
              <td>Segundo Nombre:</td>
              <td><input type="text" value=" ' . $_SESSION['usuario']['segundoNombre'] . '" disabled = disabled placeholder="segundo nombre"></td>
	  </tr>
          <tr>
               <td>Apellido:</td>
               <td><input type="text" value=" ' . $_SESSION['usuario']['apellido'] . '"disabled = disabled></td>
	       <td>Segundo Apellido:</td>
               <td><input type="text" value=" ' . $_SESSION['usuario']['segundoApellido'] . '" disabled = disabled  placeholder="segundo apellido"></td>
	  </tr>
               <td>E-mail:</td>
               <td colspan="3"><input type="text" value=" ' . $_SESSION['usuario']['correo'] . '"></td>
	  </tr>
               <td>Teléfono:</td>
               <td colspan="3"><input type="text" value=" ' . $_SESSION['usuario']['telefono'] . '"></td>
	  </tr>';
            ?>
        </tbody>
    </table>
    <hr>
    <table class="table-hover table-condensed table-bordered" width="99%">
        <tbody>
            <tr>
                <td>Foto:</td>
                <td width='20%'><center><?php echo '<img class="img-rounded" src="' . $_SESSION['usuario']['foto'] . '" style="max-height:100px; max-width:100px;">'; ?></center>
        <button class='btn btn-small btn-block btn-primary'>Cambiar Foto</button>
        </td>
        <td width='15%'>Acerca de ti: <br><small><i>(Agrega una frase que te idenfique como jugador)</i></small></td>
        <td><textarea placeholder='ej: ¡Soy el más rudo!'></textarea></td>
        </tr>
        </tbody>
    </table>
</div>

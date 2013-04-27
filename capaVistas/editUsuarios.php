<?php
session_start();

echo '<div class="well well-small">';

echo '<br><br>Nombre: <input type="text" value=" '.$_SESSION['usuario']['nombre']. '" disabled = disabled>
	  <br>Segundo Nombre: <input type="text" value=" '.$_SESSION['usuario']['segundoNombre']. '" disabled = disabled placeholder="segundo nombre">
	  <br>Apellido: <input type="text" value=" '.$_SESSION['usuario']['apellido']. '"disabled = disabled>
	  <br>Segundo Apellido: <input type="text" value=" '.$_SESSION['usuario']['segundoApellido']. '" disabled = disabled  placeholder="segundo apellido">
	  <br>E-mail: <input type="text" value=" '.$_SESSION['usuario']['correo']. '">
	  <br>Teléfono: <input type="text" value=" '.$_SESSION['usuario']['telefono']. '">
	  <br>Foto: <img class="img" src="'.$_SESSION['usuario']['foto'].'"heigth="60px" width="60px">';
	
echo '</div>';
?>
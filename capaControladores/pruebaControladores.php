<?php
require_once('../capaControladores/jugadores.php');
$rut= 14659205;
$jugador = Jugadores::Datos($rut);
print_r($jugador);


?>

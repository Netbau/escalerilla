<?php
session_start();
include('desafios.php');
include('jugadores.php');

$estado = '0';
$desafios = Desafios::getDesafiosPorEstado($estado);
print_r($desafios);

foreach($desafios as $desafio){
$desafiador =  Jugadores::getNombrePorID($desafio['idJugadores']);
$desafiado = Jugadores::getNombrePorID($desafio['idJugadores1']);
$desafio['idJugadores'] = $desafiador[0]['nombre'].' '.$desafiador[0]['apellido'];
$desafio['idJugadores1'] = $desafiado[0]['nombre'].' '.$desafiado[0]['apellido'];

echo '<br>';
echo $desafio['idJugadores'].'-'.$desafio['idJugadores1'].'-'.$desafio['fecha'].'-'.$desafio['estado']; 


}







?>
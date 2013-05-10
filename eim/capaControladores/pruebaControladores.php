<?php
session_start();
include('encuentro.php');
include('jugadores.php');
include('usuarios.php');
include('desafios.php');
print_r($_SESSION);
echo '<hr>';

//$soyDesafiador = Desafios::esDesafiador($_SESSION['jugador']['idJugadores']);
//if($soyDesafiador){
//    echo 'soy desafiador!!<hr>';
//}
//else{
//    echo 'NO soy desafiador!!<hr>';
//}


$desafio = Encuentro::ultimosGanadores();
if($desafio)
    {print_r($desafio);}
$asd = (explode('.',end(explode('/',$_SESSION['usuario']['foto']))));
echo $asd[0];
?>
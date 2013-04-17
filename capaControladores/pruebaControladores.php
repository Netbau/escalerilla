<?php
session_start();
include('desafios.php');
include('jugadores.php');
$idJugadores = 3;
//$datos = Jugadores::getUsuarioPorJugador($idJugadores);
$idJugadores1 = 6; 

$desafio = Desafios::Insertar($idJugadores, $idJugadores1);
if($desafio)
    {echo 'insertadp';}    
?>
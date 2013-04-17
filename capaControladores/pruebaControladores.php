<?php
session_start();
include('desafios.php');
include('jugadores.php');

$ranking = 3;
$categoria = 'A';

$desafiosDisponibles = Jugadores::getDesafiosDisponibles($ranking, $categoria);

print_r($desafiosDisponibles);
    
?>
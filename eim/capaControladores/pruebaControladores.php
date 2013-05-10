<?php
session_start();
include('encuentro.php');
include('jugadores.php');
include('usuarios.php');



$desafio = Encuentro::ultimosGanadores();
if($desafio)
    {print_r($desafio);}
$asd = (explode('.',end(explode('/',$_SESSION['usuario']['foto']))));
echo $asd[0];
?>
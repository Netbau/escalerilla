<?php
session_start();
include('desafios.php');
include('jugadores.php');

$estado = '0';
$desafios = Desafios::getDesafiosPorEstado($estado);
?>
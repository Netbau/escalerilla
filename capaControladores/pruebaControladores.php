<?php
session_start();
//print_r($_SESSION);
include('jugadores.php');
$categorias = Jugadores::getCategorias();

foreach($categorias as $categoria){
    $letra = $categoria['categoria'];
//    $letra = 'B';
    $ranking = Jugadores::getRankingPorCategoria($letra);
    print_r($ranking);
}



?>

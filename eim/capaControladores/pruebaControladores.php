<?php
session_start();
include('encuentro.php');
include('jugadores.php');
include('usuarios.php');
include('desafios.php');
print_r($_SESSION);
echo '<hr>';
$password = '5678';
$actualizado = Usuarios::actualizarPassword($_SESSION['usuario']['idUsuarios'], trim($password));
if($actualizado){
    echo 'password cambiada!';
}else{
    echo 'error';
}



//$soyDesafiador = Desafios::esDesafiador($_SESSION['jugador']['idJugadores']);
//if(!$soyDesafiador){
//    echo 'NO soy desafiador!!<hr>';
//}
//else{
//    echo 'soy desafiador!!<hr>';
//}


//$desafio = Encuentro::ultimosGanadores();
//if($desafio)
//    {print_r($desafio);}
//$asd = (explode('.',end(explode('/',$_SESSION['usuario']['foto']))));
//echo $asd[0];
?>
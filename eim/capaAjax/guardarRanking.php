<?php
include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
$categoria = $_POST['categoria'];
foreach($_POST['rank'] as $ranking => $idUsuarios){
   if($idUsuarios > 0){
       $actualizado = Jugadores::setRanking($idUsuarios, $ranking+1);
       //echo "$categoria - ranking: ".($ranking+1)." - id: $idJugador <br>";
       if($actualizado){
           echo 1;
       }
       else{
           echo 0;
       }
   }

}


?>

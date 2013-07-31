<?php
session_start();
if(isset($_SESSION['jugador']) && isset($_POST['idJugadores'])){
    require_once('../capaControladores/jugadores.php');
    $datos = Jugadores::getUsuarioPorJugador($_POST['idJugadores']);
    echo json_encode($datos[0]);


}else{
    echo '0';
}
?>

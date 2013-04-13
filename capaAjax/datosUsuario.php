<?php
session_start();

if(isset($_SESSION['id'])){

$_POST['rut'];

$rut = explode('-',$_POST['rut']);
$rut = $rut[0];


require_once('../capaControladores/usuarios.php');

$datos = usuarios::Datos($rut);

echo json_encode($datos);
}
?>

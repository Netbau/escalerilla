<?php
$rut = explode('-',$_POST['usuario']);
$rut = $rut[0];
$password = $_POST['password'];


require_once('../capaControladores/usuarios.php');

$datos = usuarios::Datos($rut);

echo json_encode($datos);

?>

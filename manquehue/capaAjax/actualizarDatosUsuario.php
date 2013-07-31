<?php
session_start();
if(isset($_SESSION['usuario'])){
    include_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
    $actualizado = Usuarios::actualizarDatos($_SESSION['usuario']['idUsuarios'], trim($_POST['nombre']), trim($_POST['apellido']), trim($_POST['correo']), trim($_POST['telefono']), trim($_POST['segundoNombre']), trim($_POST['segundoApellido']), trim($_POST['about']));
    if($actualizado){
        echo 1;
    }
    else{
        echo 0;
    }
}
else{
    echo 0;
}
?>

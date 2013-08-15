<?php

if (isset($_POST)) {
    if ($_POST['tipo'] == 'usuario') {
        $idUsuario = $_POST['idUsuario'];
        include_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
        $borrado = Usuarios::borrar($idUsuario);
        if($borrado){
            echo 1;
        }
        else{
            echo 0;
        }
    } elseif ($_POST['tipo'] == 'jugador') {

    } elseif ($_POST['tipo'] == 'desafio') {

    }
} else {
    echo 0;
}
?>

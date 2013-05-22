<?php

if (isset($_POST['idUsuarios']) && isset($_POST['asunto']) && isset($_POST['mensaje'])) {//envio ok
    require_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
    if (empty($_POST['mensaje'])) {// permite asunto vacio
        $asunto = 'Mensaje Escalerilla EIM';//asunto por defecto
    } else {
        $asunto = $_POST['asunto'];//asunto ingresado
    }

    if (!empty($_POST['idUsuarios']) && !empty($_POST['mensaje'])) { //envio no vacio
        $datos = Usuarios::Datos($_POST['idUsuarios']);//datos usuario
        print_r($datos);
    } else {//envio vacio
        echo 0;
    }
} else {//error en envio
    echo 0;
}
?>

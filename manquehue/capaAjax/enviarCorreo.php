<?php

if (isset($_POST['idUsuarios']) && isset($_POST['asunto']) && isset($_POST['mensaje'])) {//envio ok
    require_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
    if (empty($_POST['mensaje'])) {// permite asunto vacio
        $subject = 'Mensaje Escalerilla EIM'; //asunto por defecto
    } else {
        $subject = $_POST['asunto']; //asunto ingresado
    }

    if (!empty($_POST['idUsuarios']) && !empty($_POST['mensaje'])) { //envio no vacio
        $datos = Usuarios::Datos($_POST['idUsuarios']); //datos usuario
        $to = $datos[0]['correo'];

        $message = $_POST['mensaje'];
        $headers = "From: info@escalerilla.cl";
        $envio = mail($to, $subject, $message, $headers);
        if ($envio) {
            echo 1;
        } else {
            echo 0;
        }
    } else {//envio vacio
        echo 0;
    }
} else {//error en envio
    echo 0;
}
?>

<?php

session_start();
if (isset($_SESSION['usuario'])) {
    include_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
    if ($_POST['oldPass'] != '') {// password antigua ok
        if ($_POST['newPass'] != '' && $_POST['reNewPass'] != '') { //ingresadas new y reNew
            if ($_POST['newPass'] == $_POST['reNewPass']) { // coinciden las pass
                $actualizado = Usuarios::actualizarPassword($_SESSION['usuario']['idUsuarios'], trim($_POST['newPass']));
                if ($actualizado) {
                    $to = $_SESSION['usuario']['correo'];
                    $from = 'EIM';
                    $subject = "Cambio de Contraseña Escalerilla" . $from;
                    $message = "
                        Estimad@ " . $_SESSION['usuario']['nombre'] . $_SESSION['usuario']['apellido'] . " :

                        Se ha realizado correctamente tu cambio de contraseña.

                        Saludos Cordiales.
                        Escalerilla $from.

                        -- Este correo se genera automáticamente, no es necesario que lo respondas. --
                        -- Si no dispusiste un cambio de contraseña para tu cuenta contactanos en
                           http://www.escalerilla.cl/eim/contacto.php                               --
                        -- http://www.escalerilla.cl/eim                                            --
                            ";
                    $headers = "Cambio de contraseña Escalerilla" . $from . ":";
                    $mail = mail($to, $subject, $message, $headers);
                    if ($mail) {
                        echo 1;
                    } else {
                        echo $subject;// no se envio el mail
                    }
                } else {
                    echo 5; // no se pudo actualizar
                }
            } else {
                echo 2; // los password no coinciden
            }
        } else {
            echo 3; // newPass o reNewPass vacios
        }
    } else {
        echo 4; // oldpass vacia
    }
} else {
    echo 0; // usuario no loggeado
}
?>
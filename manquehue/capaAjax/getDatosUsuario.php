<?php

/*
 * Ajax para obtener los datos de un usuario
 * input: $_POST['idUsuario']
 */

    include_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
    $datosUsuario = Usuarios::Datos($_POST['idUsuarios']);// arreglo con los datos del usario
    echo json_encode($datosUsuario[0]);

    ?>

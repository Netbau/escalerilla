<?php

session_start();
require('Uploader.php');
if ($_GET['tipo'] == 'premio') {
    require_once (dirname(__FILE__) . '/../capaControladores/premios.php');
    $yaExiste = Premio::yaExiste($_GET['titulo'], $_GET['descripcion']);
    if (!$yaExiste) {
        $upload_dir = '../img/premios//';
        $valid_extensions = array('gif', 'png', 'jpeg', 'jpg', 'pdf');

        $Upload = new FileUpload('uploadfile');
        $result = $Upload->handleUpload($upload_dir, $valid_extensions);

        if (!$result) {
            echo json_encode(array('success' => false, 'msg' => $Upload->getErrorMsg()));
        } else {
            $url = $Upload->getSavedFile();
            $titulo = $_GET['titulo'];
            $descripcion = $_GET['descripcion'];
            // guardar ruta del archivo en la bbdd blabla
            $nuevoPremio = Premio::insertarPremio($titulo, $descripcion, 0, $url);

            if ($nuevoPremio) {
                echo json_encode(array('success' => true, 'file' => $Upload->getFileName(), 'ruta' => $url));
            } else {
                echo json_encode(array('success' => false, 'file' => $Upload->getFileName(), 'ruta' => $url));
            }
        }
    } else {
        echo json_encode(array('success' => false, 'msg' => 'duplicado'));
    }
} elseif ($_GET['tipo'] == 'usuario') {
    require_once (dirname(__FILE__) . '/../capaControladores/usuarios.php');
    $foto = explode('/', $_SESSION['usuario']['foto']);
    $foto = explode('.', end($foto));
    $nombreFoto = $foto[0];


    $upload_dir = '../img/usuarios/';
    $valid_extensions = array('gif', 'png', 'jpeg', 'jpg');

    $Upload = new FileUpload('uploadfile');
    $ext = $Upload->getExtension(); // Get the extension of the uploaded file
    $Upload->newFileName = $_SESSION['usuario']['idUsuarios'] . '.' . $ext;
    $result = $Upload->handleUpload($upload_dir, $valid_extensions);

    if (!$result) {
        echo json_encode(array('success' => false, 'msg' => $Upload->getErrorMsg(), 'ruta' => $upload_dir));
    } else {
        $url = 'http://www.escalerilla.cl/manquehue/img/usuarios/'.$Upload->getFileName();
        //$url = $Upload->getSavedFile();
        // guardar ruta del archivo en la bbdd blabla
        $actualizado = Usuarios::actualizarFoto($_SESSION['usuario']['idUsuarios'], $url);

        if ($actualizado) {
            $_SESSION['usuario']['foto'] = $actualizado; //actualiza la foto en la sesion
            echo json_encode(array('success' => true, 'file' => $Upload->getFileName(), 'ruta' => $url));
        } else {
            echo json_encode(array('success' => false, 'file' => $Upload->getFileName(), 'ruta' => $url));
        }
    }
}
?>
<?php

session_start();
require('Uploader.php');
require_once (dirname(__FILE__) . '/../capaControladores/premios.php');

$yaExiste = Premio::yaExiste($_GET['titulo'], $_GET['descripcion']);
if (!$yaExiste) {
    $upload_dir = '../img/premios/';
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
}else{
    echo json_encode(array('success' => false, 'msg'=> 'duplicado' ));
}
?>
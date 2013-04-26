<?php
include_once(dirname(__FILE__) . '/../capaControladores/jugadores.php');
$categorias = Jugadores::getCategorias();
if (isset($_POST['formato'])) {
    /*
     * FORMATOS:
     * - JSON -> json_encode
     * - option -> <option></option>
     * - lista -> <lista></lista>
     */
    $formato = $_POST['formato'];
} else {
    $formato = 'option';
}
if ($formato == 'option') {
    foreach ($categorias as $categoria) {
        echo "
            <option value='" . $categoria['categoria'] . "'>" . $categoria['categoria'] . "</option>";
    }
} elseif ($formato == 'json') {
    echo json_encode($categorias);
}
?>

<?php

include_once(dirname(__FILE__) . '/../capaControladores/usuarios.php');
if (isset($_GET['filtroUsuarios'])) {
    $todos = Usuarios::Crude($_GET['filtroUsuarios']);
} else {
    $todos = Usuarios::Crude();
}
?>

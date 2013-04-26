<a href="#modalPremios" role="button" class="btn btn-small btn-info" data-toggle="modal"><strong>Nuevo Premio</strong></a>
<br><br>
<div class="row-fluid">
<?php
require_once(dirname(__FILE__).'/../../capaControladores/premios.php');
$premios = Premio::Crud();
print_r($premios);


?>







</div>

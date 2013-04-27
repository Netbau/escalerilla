<a href="#modalPremios" role="button" class="btn btn-small btn-info" data-toggle="modal"><strong>Nuevo Premio</strong></a>
<br><br>
<div class="row-fluid">
<?php
require_once(dirname(__FILE__).'/../../capaControladores/premios.php');
$premios = Premio::Crud();
foreach($premios as $premio){
    echo '<embed src="'.$premio['urlpdf'].'" width="500" height="375">';

}


?>
<!--<embed src="http://yoursite.com/the.pdf" width="500" height="375"><!-- premio -->






</div>

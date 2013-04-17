<center>
<?php 
include_once('capaControladores/jugadores.php');
$desafiosDisponibles = Jugadores::getDesafiosDisponibles($jugador['ranking'], $jugador['categoria']);
if(count($desafiosDisponibles)!= 0){
foreach($desafiosDisponibles as $desafio){
    echo '<div class="span3 well"><!--1ra persona-->
        <center><img class="img img-rounded" src="'.$desafio['foto'].'" height="150" width="100"></center>
        <center><strong>'.$desafio['nombre'].' '.$desafio['apellido'].'</strong></center>
        <center>Ranking #'.$desafio['ranking'].'</center>
        <center><a href="#myModal" class="btn btn-info btn-block desafiar" idJugadores="'.$desafio['idJugadores'].'" data-loading-text="cargando...">Desafiar!</a></center>
    </div>';
}
}
else {echo '<div class="alert alert-success"><strong>Felicitaciones!</strong>, eres n&uacute;mero uno en tu categor&iacute;a. Sigue atento a los desaf&iacute;os que te har&aacute;n.</div>';}
?>    
</center>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Confirma tu desaf&iacute;o</h3>
  </div>
  <div class="modal-body">
      <p>Se enviar&aacute; un e-mail a tu rival <span id="contrincante"></span>y al administrador del sitio para acordar </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
<script>
    $('#desafiar').click(function(){
       $(this).button('loading');
       var desafiado = $(this).attr('idJugadores');
       $.ajax({
           url: 'capaAjax/getDesafiado.php',
           data: {idJugadores: desafiado},
           async: false,
           success: function(output){
               alert(output);
           },
           500: function(){
                alert('Hubo un error con el servidor, intentalo nuevamente.');
                $('#desafiar').button('reset');
           }
       });
    });
</script>
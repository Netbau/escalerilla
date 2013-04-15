<div class="row-fluid">
    <div class="span12">
        <?php $usuario = $_SESSION['usuario'][0]; ?>
        <div class="row-fluid">
           <strong>
                    <?php echo $usuario['nombre'] . ' ' . $usuario['segundoNombre'] . ' ' . $usuario['apellido'] . ' ' . $usuario['segundoApellido']; ?> 
           </strong>
        </div> 
        <div class="row-fluid">
            <?php echo $usuario['correo']; ?>
        </div>
        <div class="row-fluid">
            <center><img src="<?php echo $usuario['foto']; ?>" class="img-rounded"></center>
        </div>
        <div class="row-fluid">
            Mi Categor&iacute;a: 
        </div>
        <div class="row-fluid">
            Mi Ranking: 
        </div>
        <div class="row-fluid">
            <a class="btn btn-danger btn-block btn-small" id="logout" data-loading-text="cargando...">Salir</a>
        </div>
    </div>
</div>
<script>
    $('#logout').click(function() {
        $(this).button('loading');
        $.ajax({
            url: "capaAjax/logout.php",
            success: function() {
                window.location = 'index.php';
            }//success
        }); // ajax
    });//click
</script>    

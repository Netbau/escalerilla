<div class="row-fluid">
    <div class="span12">
        <?php $usuario = $_SESSION['usuario']; 
        if(isset($_SESSION['jugador'])){$jugador = $_SESSION['jugador'];}?>
        <div class="row-fluid">
           <center>
           <strong>
                    <h4><?php 
                        echo $usuario['nombre'];
                        if($usuario['segundoNombre']!= null){ echo ' '.$usuario['segundoNombre'];}
                        echo ' '.$usuario['apellido'];
                        if($usuario['segundoApellido']!= null){echo ' ' . $usuario['segundoApellido'];} ?>
                    </h4> 
           </strong>
           </center>
        </div> 
        <div class="row-fluid">
            <center><img src="<?php echo $usuario['foto']; ?>" class="img-rounded"></center>
        </div>
        <div class="row-fluid">
            <strong>Mi Correo:</strong> <?php echo $usuario['correo']; ?>
        </div>
        <?php if(isset($_SESSION['jugador'])){
        echo '<div class="row-fluid">
            <strong>Mi Categor&iacute;a:</strong> '.$jugador['categoria'].'</div>
        <div class="row-fluid">
            <strong>Mi Ranking:</strong> '.$jugador['ranking'].' 
        </div>';}?>
        
        <div class="row-fluid">
            <a class="btn btn-info btn-block btn-small" id="editar" data-loadig-text="cargando..." disabled="disabled">Editar mis datos</a> 
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

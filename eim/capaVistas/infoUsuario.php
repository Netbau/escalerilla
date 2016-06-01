<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <center>
                <strong>
                    <h4><?php
                        echo $_SESSION['usuario']['nombre'];
                        if ($_SESSION['usuario']['segundoNombre'] != null) {
                            echo ' ' . $_SESSION['usuario']['segundoNombre'];
                        }
                        echo ' ' . $_SESSION['usuario']['apellido'];
                        if ($_SESSION['usuario']['segundoApellido'] != null) {
                            echo ' ' . $_SESSION['usuario']['segundoApellido'];
                        }
                        ?>
                    </h4>
                </strong>
            </center>
        </div>
        <div class="row-fluid">
            <center><img src="<?php echo $_SESSION['usuario']['foto']; ?>" class="img-rounded imgUsuario"></center>
        </div>
        <div class="row-fluid">
            <strong>Mi Correo:</strong> <?php echo $_SESSION['usuario']['correo']; ?>
        </div>
        <?php
        if (isset($_SESSION['jugador'])) {
            echo '<div class="row-fluid">
            <strong>Mi Categoría:</strong> ' . $_SESSION['jugador']['categoria'] . '</div>
            <div class="row-fluid">
            <strong>Mi Ranking:</strong> ' . $_SESSION['jugador']['ranking'] . '
            </div>';
        }
        ?>

        <div class="row-fluid">
            <a class="btn btn-primary btn-block btn-small" id="editar" data-loadig-text="cargando...">Editar mis datos</a>
        </div>
        <div class="row-fluid">
            <a class="btn btn-danger btn-block btn-small" id="logout" data-loading-text="cargando...">Salir</a>
        </div>
    </div>
</div>
<script>
    $('#editar').click(function() {
        $('.span9').load('capaVistas/editUsuarios.php', function() {

            //CallBack

        });
    });//click
</script>
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

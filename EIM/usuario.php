<?php require(dirname(__FILE__) . '/capaVistas/header.php'); ?>
<div class="row-fluid">
    <div class="span3">
        <div class="well well-small"><!--Formulario login-->

            <?php
            if (!isset($_SESSION['usuario'])) {
                require(dirname(__FILE__) . "/capaVistas/loginForm.php");
            } else {
                require(dirname(__FILE__) . "/capaVistas/infoUsuario.php");
            }
            ?>

        </div><!--/.well well-small -->

        <div class="well well-small"><!--Convenios-->

            <?php require(dirname(__FILE__) . "/capaVistas/convenios.php"); ?>

        </div><!--/.well well-small -->

        <div class="well well-small hidden-phone"><!--Publicidad-->

            Espacio Publicitário

        </div><!--/.well well-small -->

    </div><!--/span-->
    <div class="span9">
        <div class="well well-small">
            <div class="row-fluid"><!--Retos Disponibles-->
                <center><h3>Tú puedes desafiar a:</h3></center>
                <div id="disponibles">
                    <?php
                    if (isset($_SESSION['jugador'])) {
                        require(dirname(__FILE__) . "/capaVistas/retosDisponibles.php");
                    } else {
                        echo '<div class="alert alert-danger">!Debes ingresar con tu cuenta para poder desafiar!</div>';
                    }
                    ?>
                </div>
                <script>
                    $('#myModal').on('hide', function() {
                        $('#disponibles').load('capaVistas/retosDisponibles.php', function() {

                        });//load
                    });
                </script>
            </div>
        </div>

        <div class="well well-small">
            <div class="row-fluid">
                <center><h3>Ranking</h3></center><!--Ranking-->

                <?php require(dirname(__FILE__) . "/capaVistas/ranking.php"); ?>

            </div><!--/row-->
        </div><!--well well-small-->
    </div><!--/span-->

</div><!--/Row Fluid-->

<div class="well well-small"><!--Últimas Noticias-->
    <?php require(dirname(__FILE__) . "/capaVistas/ultimasNoticias.php"); ?>
</div>
<footer><!-- ARCHIVO footer-->

    <?php require(dirname(__FILE__) . "/capaVistas/footer.php"); ?>

</footer><!-- ARCHIVO footer-->
</div><!--/.fluid-container-->


</body>
</html>
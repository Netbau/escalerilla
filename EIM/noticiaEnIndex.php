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

            <?php require(dirname(__FILE__) . "/capaVistas/noticias.php"); ?>

        </div>
    </div><!--/span-->
</div><!--/Row Fluid-->
</div><!--/.fluid-container-->
   <footer><!-- ARCHIVO footer-->

    <?php require(dirname(__FILE__) . "/capaVistas/footer.php"); ?>

</footer><!-- ARCHIVO footer-->


</body>
</html>
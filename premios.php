<?php require('capaVistas/header.php'); ?>
<div class="row-fluid">
    <div class="span3">
        <div class="well well-small"><!--Formulario login-->

            <?php
            if (!isset($_SESSION['usuario'])) {
                require("capaVistas/loginForm.php");
            } else {
                require("capaVistas/infoUsuario.php");
            }
            ?>

        </div><!--/.well well-small -->

        <div class="well well-small"><!--Convenios-->

<?php require("capaVistas/convenios.php"); ?>

        </div><!--/.well well-small -->

        <div class="well well-small"><!--Publicidad-->

            Espacio Publicitario

        </div><!--/.well well-small -->

    </div><!--/span-->
    <div class="span9">
        <div class="row-fluid"><!--Reglamento-->

<?php require("capaVistas/documentoPremios.php"); ?>

        </div><!--well well-small-->
    </div><!--/span-->
</div><!--/Row Fluid-->
<div class="well well-small"><!--Últimas Noticias-->
<?php require("capaVistas/ultimasNoticias.php"); ?>
</div>

<hr>

<footer><!-- ARCHIVO footer-->

<?php require("capaVistas/footer.php"); ?>

</footer><!-- ARCHIVO footer-->

</div><!--/.fluid-container-->


</body>
</html>
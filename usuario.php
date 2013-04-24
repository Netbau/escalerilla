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
        <div class="well well-small">
            <div class="row-fluid"><!--Retos Disponibles-->
                <center><h2>T&uacute; puedes desafiar a:</h2></center>
                <?php
                if (isset($_SESSION['jugador'])) {
                    require("capaVistas/retosDisponibles.php");
                } else {
                    echo '<div class="alert alert-danger">Debes ingresar con tu cuenta para poder desafiar!</div>';
                }
                ?>
            </div>
        </div>

        <div class="well well-small">
            <div class="row-fluid">
                <center><h2>Ranking</h2></center><!--Ranking-->

                <?php require("capaVistas/ranking.php"); ?>

            </div><!--/row-->
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
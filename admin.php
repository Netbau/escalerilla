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


    </div><!--/span-->
    <div class="span9">
        <div class="well well-small">

            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="btn btn-small accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            <strong>Creacion y Eliminacion de Usuarios</strong>
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse in">
                        <div class="accordion-inner"><!-- opciones de usuarios-->
                            <?php
                            if (isset($_SESSION['usuario']) && $usuario['nivel'] >= 3) {
                                include_once(dirname(__FILE__) . '/capaVistas/admin/opcionesUsuario.php');
                            }
                            ?>
                        </div><!-- opciones de usuarios -->
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="btn btn-small accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                            <strong>Jugadores Registrados</strong>
                        </a>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse">
                        <div class="accordion-inner"><!-- opciones de jugadores-->
                            <?php
                            if (isset($_SESSION['usuario']) && $usuario['nivel'] >= 3) {
                                include_once(dirname(__FILE__) . '/capaVistas/admin/opcionesJugador.php');
                            }
                            ?>
                        </div><!-- opciones de usuarios-->
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="btn btn-small accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            <strong>Registro de Desafios</strong>
                        </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse">
                        <div class="accordion-inner"><!-- opciones de jugadores-->

                        </div><!-- opciones de usuarios-->
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="btn btn-small accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                            <strong>Registro de Encuentros</strong>
                        </a>
                    </div>
                    <div id="collapseFour" class="accordion-body collapse">
                        <div class="accordion-inner"><!-- opciones de jugadores-->

                        </div><!-- opciones de usuarios-->
                    </div>
                </div>
            </div>

        </div>
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
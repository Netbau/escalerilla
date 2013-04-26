<?php
require(dirname(__FILE__) .'/capaVistas/header.php'); ?>
<div class="row-fluid">
    <div class="span3">
        <div class="well well-small"><!--Formulario login-->

            <?php
            if (!isset($_SESSION['usuario'])) {
                require_once(dirname(__FILE__) ."/capaVistas/loginForm.php");
            } else {
                require_once(dirname(__FILE__) ."/capaVistas/infoUsuario.php");
            }
            ?>

        </div><!--/.well well-small -->

        <div class="well well-small"><!--Convenios-->

            <?php require_once(dirname(__FILE__) . "/capaVistas/convenios.php"); ?>

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
                    <div id="collapseOne" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <a class="btn btn-small btn-inverse refreshUsuarios pull-left"><i class="icon-refresh icon-white"></i></a>
                            <div id="opcionesUsuario"><!-- opciones de usuarios-->
                                <?php
                                if (isset($_SESSION['usuario']) && $_SESSION['usuario']['nivel'] >= 3) {
                                    include_once(dirname(__FILE__) . '/capaVistas/admin/opcionesUsuario.php');
                                }
                                ?>

                                <script>
                                    $('.refreshUsuarios').click(function() {
                                        $('#opcionesUsuario').load('capaVistas/admin/opcionesUsuario.php', function() {
                                            //accion al refrescar
                                        });
                                    });
                                </script>
                            </div><!-- opciones de usuarios -->
                        </div>
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
                            <a class="btn btn-small btn-inverse refreshJugadores pull-left"><i class="icon-refresh icon-white"></i></a>
                            <div id="opcionesJugador"><!-- opciones de usuarios-->
                                <?php
                                if (isset($_SESSION['usuario']) && $_SESSION['usuario']['nivel'] >= 3) {
                                    include_once(dirname(__FILE__) . '/capaVistas/admin/opcionesJugador.php');
                                }
                                ?>
                                <script>
                                    $('.refreshJugadores').click(function() {
                                        $('#opcionesJugador').load('capaVistas/admin/opcionesJugador.php', function() {
                                            //accion al refrescar
                                        });
                                    });
                                </script>
                            </div><!-- opciones de usuarios-->
                        </div>
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

                        </div><!-- opciones de jugadores-->
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

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="btn btn-small accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                            <strong>Premios</strong>
                        </a>
                    </div>
                    <div id="collapseFive" class="accordion-body collapse">
                        <div class="accordion-inner"><!-- opciones de jugadores-->

                        </div><!-- opciones de usuarios-->
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="btn btn-small accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
                            <strong>Noticias</strong>
                        </a>
                    </div>
                    <div id="collapseSix" class="accordion-body collapse">
                        <div class="accordion-inner"><!-- opciones de jugadores-->

                        </div><!-- opciones de usuarios-->
                    </div>
                </div>

            </div><!-- accordion -->

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
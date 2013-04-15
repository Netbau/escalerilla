<?php require('capaVistas/header.php');?>
            <div class="row-fluid">
                <div class="span3">
                    <div class="well"><!--Formulario login-->

                        <?php if(!isset($_SESSION['usuario'])){require("capaVistas/loginForm.php");}else{require("capaVistas/infoUsuario.php");} ?>

                    </div><!--/.well -->

                    <div class="well"><!--Convenios-->

                        <?php require("capaVistas/convenios.php"); ?>

                    </div><!--/.well -->

                    <div class="well"><!--Publicidad-->

                        Espacio Publicitario

                    </div><!--/.well -->

                </div><!--/span-->
                <div class="span9">
                    <div class="row-fluid"><!--Retos Disponibles-->
                        <div class="span12 well"><center><h2>Retos Disponibles</h2></center>

                            <?php require("capaVistas/retosDisponibles.php"); ?>
                        </div>
                    </div>

                    <div class="well">
                        <div class="row-fluid"><center><h2>Ranking</h2></center><!--Ranking-->

                            <?php require("capaVistas/ranking.php"); ?>

                        </div><!--/row-->
                    </div><!--well-->
                </div><!--/span-->
            </div><!--/Row Fluid-->
            <div class="well"><!--Últimas Noticias-->
                <?php require("capaVistas/ultimasNoticias.php"); ?>
            </div>

            <hr>

            <footer><!-- ARCHIVO footer-->

                <?php require("capaVistas/footer.php"); ?>

            </footer><!-- ARCHIVO footer-->

        </div><!--/.fluid-container-->


    </body>
</html>
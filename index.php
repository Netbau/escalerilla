<?php require('capaVistas/header.php');?>
            <div class="row-fluid"><!-- row de contenido -->
                <div class="span3">

                    <div class="well well-small"><!--Formulario login-->
                        <?php if(!isset($_SESSION['usuario'])){require("capaVistas/loginForm.php");}else{require("capaVistas/infoUsuario.php");} ?>
                    </div><!--/.well well-small -->

                    <div class="well well-small"><!--Convenios-->
                        <?php require("capaVistas/convenios.php"); ?>
                    </div><!--/.well well-small -->

                    <div class="well well-small"><!--Publicidad-->
                        Espacio Publicitario
                    </div><!--/.well well-small -->

                </div><!--/span-->

                <div class="span9">

                    <div class="well well-small"><center><h2>Ranking</h2></center><!--Ranking-->
                        <?php require("capaVistas/ranking.php"); ?>
                    </div>

                    <div class="well well-small">
                        <div class="row-fluid"><center><h3>Últimos Ganadores</h3></center><!--Últimos Ganadores-->
                            <?php require("capaVistas/ultimosGanadores.php"); ?>
                        </div><!--/row-->
                    </div><!--well well-small-->

                </div><!--/span-->


                <div class="well well-small"><!--Últimas Noticias-->
                    <?php require("capaVistas/ultimasNoticias.php"); ?>
                </div>

                <hr>

                <footer><!-- ARCHIVO footer-->
                    <?php require("capaVistas/footer.php"); ?>
            </div><!--/row--> </footer>
    </div><!--/row-->
</div><!--/.fluid-container-->
</body>
</html>
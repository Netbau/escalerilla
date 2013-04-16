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
                    <div class="row-fluid"><!--Reglamento-->
                        
					<?php require("capaVistas/documentoPremios.php"); ?>
						
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
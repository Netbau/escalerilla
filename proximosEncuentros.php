<?php require('capaVistas/header.php'); ?>
<div class="row-fluid"><!-- row de contenido -->
    <div class="span3">

        <div class="well well-small"><!--Formulario login-->
            <?php
            if (!isset($_SESSION['usuario'])) {
                require(trim("capaVistas/loginForm.php"));
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

        
		<center>
    <?php
    include_once(dirname(__FILE__) . '/../capaControladores/encuentro.php');
    $ultimosEncuentros = Enceuntro::getEncuentroPorFecha($fecha, $limite = 1);
    if (count($ultimosEncunetros) != 0) {
        foreach ($ultimosEncuentros as $encuentros) {
            echo '<div class="span6 well well-small"><!--1er Encuentro-->
        <center><strong>' . $encuentro['fecha'] . ' ' .$encuentro['idJugadores'] . ' ' . $encuentro['idJugadores1']'</center>
    </div>';
        }
    }
	
	else {
        echo '<div class="alert alert-warning"><strong>Error :D</strong></div>';
    }
    ?>
		</center>
        

        <div class="well well-small">
            <div class="row-fluid">
                <center><h3>Últimos Ganadores</h3></center><!--Últimos Ganadores-->
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
    </footer>

</div><!--/row-->
</div><!--/row-->
</div><!--/.fluid-container-->
</body>
</html>
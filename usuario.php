<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Escalerilla, EIM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"><!-- css jQuery UI-->
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"><!-- css bootstrap-->
        <link href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" rel="stylesheet"><!-- css bootstrap-->
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>

    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner"><!-- navbar -->
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Ranking</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="#proximos">Pr&oacute;ximos Encuentros</a></li>
                            <li><a href="#reglamento">Reglamento</a></li>
                            <li><a href="#premios">Premios</a></li>
                            <li><a href="#contacto">Contacto</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <h2><center>Escalerilla Estadio Israelita 2013 <img src="img/LogoEimCompacto.jpg" height ="35" width="40"></center></h2>
            </div>
            <div class="row-fluid">
                <div class="span3">
                    <div class="well"><!--Formulario login-->

                        <?php require("capaVistas/loginForm.php"); ?>

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
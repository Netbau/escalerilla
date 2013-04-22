<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Escalerilla, EIM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"><!-- css jQuery UI-->
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"><!-- css bootstrap-->
        <!--<link href="css/bootstrap.min.css" rel="stylesheet"><!--css bootstrap-->
        <!--<link href="css/bootstrap-responsive.css"><!--bootsrap responsive-->
        <link href="css/estilo.css" rel="stylesheet"><!-- css personalizados -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><!-- JQUERY-->
        <!--<script src="js/jquery191.js"></script><!-- JQUERY-->
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script><!-- bootstrap js -->
        <!--<script src="js/bootstrap.js"></script><!-- bootstrap js -->

    </head>
    <body>
        <div class="navbar navbar-info navbar-fixed-top">
            <div class="navbar-inner"><!-- navbar -->
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="index.php">Escalerilla Estadio Israelita 2013</a>
                    <img src="img/LogoEimCompacto.jpg" width="35" height="35" class="pull-left">
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="#proximos">Pr&oacute;ximos Encuentros</a></li>
                            <?php if (isset($_SESSION['jugador'])) {
                                echo "<li><a href='usuario.php'><i class='icon-screenshot icon-white'></i><strong>Desafiar!</strong></a></li>";
                            } ?>
                            <li><a href="reglamento.php">Reglamento</a></li>
                            <li><a href="#noticias">Noticias</a></li>
                            <li><a href="premios.php">Premios</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                            <?php if (isset($_SESSION['usuario'])) {
                                if ($_SESSION['usuario']['nivel'] >= 3) {
                                    echo "<li><a href='#administrar'><i class='icon-wrench icon-white'></i><strong>Administrar</strong></a></li>";
                                }
                            } ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid"><!-- titulo -->
                <h1><center><small>Escalerilla Estadio Israelita 2013</small></center></h1>
            </div>

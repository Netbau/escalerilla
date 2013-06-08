<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Escalerilla, EIM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- estilos desde cdns -->
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"><!-- css jQuery UI-->
        <!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet"><!-- css bootstrap css -->
        <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet"><!-- font awsome -->
        <!--<link href="http://netdna.bootstrapcdn.com/bootswatch/2.3.1/cerulean/bootstrap.min.css" rel="stylesheet"><!-- css bootswatch-->

        <!--estilos desde el servidor -->
        <link href="css/cerulean/bootstrap.min.css" rel="stylesheet"><!--css bootstrap.min-->
        <link href="css/cerulean/bootstrap.css" rel="stylesheet"><!--css bootstrap-->
        <link href="css/default/bootstrap-responsive.css" rel="stylesheet"><!--bootstrap responsive-->
        <link href="css/cerulean/font-awsome.min.css" rel="stylesheet"><!-- font-awsome-->
        <link href="css/cerulean/bootswatch.css" rel="stylesheet"><!-- bootswatch-->
        <link href="css/estilo.css" rel="stylesheet"><!-- css personalizados -->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><!-- JQUERY-->
        <!--<script src="js/jquery191.js"></script><!-- JQUERY-->
        <script type="text/javascript" src="js/SimpleAjaxUploader.js"></script><!-- ajax uploader -->
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script><!-- JQUERY UI-->
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script><!-- bootstrap js -->
        <!--<script src="js/bootstrap.js"></script><!-- bootstrap js -->
        <script>
            $(document).ready(function() {
                $('.datepicker').datepicker({dateFormat: "yy-mm-dd", yearRange: "1950:2050", changeYear: true, changeMonth: true});
                $('.carousel').carousel('cycle');
            });
        </script>
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
                    <img src="img/LogoEimCompacto.jpg" width="40" height="40" class="pull-left">
                    <a class="brand" href="index.php">Escalerilla EIM 2013</a>

                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="proximosEncuentros.php">Próximos Encuentros</a></li>
                            <?php
                            if (isset($_SESSION['jugador'])) {
                                echo "<li><a href='usuario.php'><i class='icon-screenshot'></i><strong>¡Desafiar!</strong></a></li>";
                            }
                            ?>
                            <li><a href="reglamento.php">Reglamento</a></li>
                            <li><a href="noticiaEnIndex.php">Notícias</a></li>
                            <li><a href="premios.php">Premios</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                            <?php
                            if (isset($_SESSION['usuario'])) {
                                if ($_SESSION['usuario']['nivel'] >= 3) {
                                    echo "<li><a href='admin.php'><i class='icon-wrench'></i><strong>Administrar</strong></a></li>";
                                }
                            }
                            ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid" style="margin-top: 20px;">

                <div id="myCarousel" class="carousel slide span12" data-interval="1500">
                    <!-- Carousel items -->
                    <center>
                        <div class="carousel-inner">
                            <div class="active item"><img src="img/logoeim.jpg"></div>
                            <div class="item"><img src="img/slide-2.jpg"></div>
                            <div class="item"><img src="img/slide-3.jpg"></div>
                            <div class="item"><img src="img/slide-4.jpg"></div>
                            <div class="item"><img src="img/slide-5.jpg"></div>
                        </div>
                    </center>
                </div>
            </div>
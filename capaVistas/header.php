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
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet"><!-- css bootstrap css -->
        <!--<link href="css/bootstrap-responsive.css"><!--bootsrap responsive-->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet"><!-- font awsome -->
        <link href="http://netdna.bootstrapcdn.com/bootswatch/2.3.1/cerulean/bootstrap.min.css" rel="stylesheet"><!-- css bootswatch-->
        <!--<link href="css/bootstrap.min.css" rel="stylesheet"><!--css bootstrap-->

        <!--<link href="css/estilo.css" rel="stylesheet"><!-- css personalizados -->
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 10px;
                background: #cedbe9;
                /*Old browsers*/
                background: -moz-linear-gradient(top,  #cedbe9 0%, #aac5de 17%, #6199c7 50%, #3a84c3 51%, #419ad6 59%, #4bb8f0 71%, #3a8bc2 84%, #26558b 100%);  /*FF3.6+*/
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cedbe9), color-stop(17%,#aac5de), color-stop(50%,#6199c7), color-stop(51%,#3a84c3), color-stop(59%,#419ad6), color-stop(71%,#4bb8f0), color-stop(84%,#3a8bc2), color-stop(100%,#26558b));  /*Chrome,Safari4+*/
                background: -webkit-linear-gradient(top,  #cedbe9 0%,#aac5de 17%,#6199c7 50%,#3a84c3 51%,#419ad6 59%,#4bb8f0 71%,#3a8bc2 84%,#26558b 100%);  /*Chrome10+,Safari5.1+*/
                background: -o-linear-gradient(top,  #cedbe9 0%,#aac5de 17%,#6199c7 50%,#3a84c3 51%,#419ad6 59%,#4bb8f0 71%,#3a8bc2 84%,#26558b 100%);  /*Opera 11.10+*/
                background: -ms-linear-gradient(top,  #cedbe9 0%,#aac5de 17%,#6199c7 50%,#3a84c3 51%,#419ad6 59%,#4bb8f0 71%,#3a8bc2 84%,#26558b 100%);  /*IE10+*/
                background: linear-gradient(to bottom,  #cedbe9 0%,#aac5de 17%,#6199c7 50%,#3a84c3 51%,#419ad6 59%,#4bb8f0 71%,#3a8bc2 84%,#26558b 100%);  /*W3C*/
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cedbe9', endColorstr='#26558b',GradientType=0 );  /*IE6-9*/
            }
            .sidebar-nav {
                padding: 5px;
            }
            .tab-content{
                max-height: 238px;
            }
            .small{
                max-height: 200px;
            }
            textarea{
                width: 98%;
            }
            input{
                width: 95%;
            }
            table img{
                width: 65px;
                height: 70px;

            }
            .span3 img{
                width: 70px;
                height: 70px;
            }
            .span6 img{
                width: 70px;
                height: 70px;
            }

            h1,h2,h3{
                padding-top: 0px;
                padding-bottom: 0px;
                margin-top: 0px;
                margin-bottom: 0px;
                color: #00b2ff;
            }
            footer p{
                color: #0075ff;
            }

            * {
                margin: 0;
                padding: 0;
            }
            body {
                font: 13px/1.4 Georgia, Serif;
            }
            #page-wrap {
                margin: 50px;
            }
            p {
                margin: 20px 0;
            }
            .well {
                padding-right: 9px;
                padding-left: 9px;
                padding-top: 2px;
            }
            .carousel{
                height: 40px;
            }
            .navbar .brand{
                padding-bottom: 0px;
            }
            /* iPads (portrait and landscape) ----------- */
            @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
                body {
                    width: 1024px;
                }
            }

        </style>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><!-- JQUERY-->
        <!--<script src="js/jquery191.js"></script><!-- JQUERY-->
        <script type="text/javascript" src="js/SimpleAjaxUploader.js"></script><!-- ajax uploader -->
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script><!-- JQUERY UI-->
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script><!-- bootstrap js -->
        <!--<script src="js/bootstrap.js"></script><!-- bootstrap js -->
        <script>
            $(document).ready(function() {
                $('.datepicker').datepicker({dateFormat: "yy-mm-dd", yearRange: "2010:2050", changeYear: true, changeMonth: true});
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
                    <a class="brand" href="index.php">Escalerilla EIM 2013</a>
                    <img src="img/LogoEimCompacto.jpg" width="40" height="40" class="pull-left">
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="proximosEncuentros.php">Próximos Encuentros</a></li>
                            <?php
                            if (isset($_SESSION['jugador'])) {
                                echo "<li><a href='usuario.php'><i class='icon-screenshot'></i><strong>¡Desafiar!</strong></a></li>";
                            }
                            ?>
                            <li><a href="reglamento.php">Reglamento</a></li>
                            <li><a href="#noticias">Notícias</a></li>
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

                <div id="myCarousel" class="carousel slide span12">
                    <!-- Carousel items -->
                    <center>
                        <div class="carousel-inner">
                            <div class="active item"><img src="img/logoeim.jpg"></div>
                            <div class="item"><img src="img/slide-2.jpg"></div>
                            <div class="item"><img src="img/slide-3.jpg"></div>
                            <div class="item"><img src="img/slide-4.jpg"></div>
                            <div class="item"><img src="img/slide-5.jpg"></div>
                        </div>

                        <!-- Carousel nav -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                    </center>
                </div>
            </div>
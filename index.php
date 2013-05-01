<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Escalerilla</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- estilos desde cdns -->
        <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"><!-- css jQuery UI-->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet"><!-- css bootstrap css -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet"><!-- font awsome -->
        <!--<link href="http://netdna.bootstrapcdn.com/bootswatch/2.3.1/cerulean/bootstrap.min.css" rel="stylesheet"><!-- css bootswatch-->

        <!--estilos desde el servidor -->
        <!--<link href="css/cerulean/bootstrap.min.css" rel="stylesheet"><!--css bootstrap-->
        <!--<link href="css/default/bootstrap-responsive.css" rel="stylesheet"><!--bootstrap responsive-->
        <!--<link href="css/cerulean/font-awsome.min.css" rel="stylesheet"><!-- font-awsome-->
        <!--<link href="css/cerulean/bootswatch.css" rel="stylesheet"><!-- bootswatch-->
        <!--<link href="css/estilo.css" rel="stylesheet"><!-- css personalizados -->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><!-- JQUERY-->
        <!--<script src="js/jquery191.js"></script><!-- JQUERY-->
        <!--<script type="text/javascript" src="js/SimpleAjaxUploader.js"></script><!-- ajax uploader -->
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
        <div class="row-fluid">
            <div class="hero-unit">
                <h1>Proyecto Escalerilla</h1>

                <div class="well">
                    <a href="http://www.escalerilla.cl/eim"> Estadio Israelita <img src="eim/img/logoeim.jpg"></a>
                </div>
            </div>

        </div>


        <footer>
            <div class="well">
            <p>&copy; Netbau 2013</p>
            </div>
        </footer>

    </body>
</html>

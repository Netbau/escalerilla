<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Rama de Tenis, Estadio Israelita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"><!-- css jQuery UI-->
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"><!-- css bootstrap-->
	<link href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" rel="stylesheet"><!-- css bootstrap-->
	<style type="text/css">
	
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
	  .tab-content {
	  max-height: 22	0px;
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
	<!-- scripts js externos --> 
	<script src="http://code.jquery.com/jquery-latest.js"></script><!-- CDN jquery-->
	<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script><!-- CDN jquery tools-->
	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script><!-- CDN jquery UI-->
	<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script><!-- CDN bootstrap-->

	
  </head>

  <body>
  
    <div class="navbar navbar-inverse navbar-fixed-top">
		
		<?php include("capaVistas/navbar.php"); ?>
		
    </div>

     <div class="container-fluid">
       <div class="row-fluid"><h2><center>Escalerilla Estadio Israelita 2013 <img src="img/LogoEimCompacto.jpg" height ="35" width="40"></center></h2></div>
	   <div class="row-fluid">
        <div class="span3">
          <div class="well"><!--Formulario login-->
             
			 <?php require("capaVistas/loginForm.php"); ?>

          </div><!--/.well -->
		  
		  <div class="well"><!--Convenios-->
            
			<?php require("capaVistas/convenios.php");?>
			
          </div><!--/.well -->
		  
        </div><!--/span-->
        <div class="span9">
          <div class="row-fluid"><!--Retos Disponibles-->
		   <div class="span12 hero-unit"><center><h2>Retos Disponibles</h2></center>
		   
			<?php require("capaVistas/retosDisponibles.php"); ?>
		   </div>
          </div>
		  
          <div class="row-fluid"><!--Ranking-->
            
			<?php require("capaVistas/ranking.php"); ?>
			
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/Row Fluid-->

	  <div class="nav nav-list">
			<li class="nav-header"><h4>Últimas Noticias</h4></li>
			<li>Adidas</a></li>
			<li><a href="#">Brooks</a></li>
			<li><a href="#">Nike</a></li>
			<li><a href="#">        </a></li>
			<li><a href="#">Willson</a></li>
		
	  </div>
	  
      <hr>

      <footer><!-- ARCHIVO footer-->
        
			<?php require("capaVistas/footer.php"); ?>
		
      </footer>

    </div><!--/.fluid-container-->

  
  </body>
</html>
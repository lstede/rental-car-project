<?php
require_once('loginCheck.php');
require_once('../functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rent an electric</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">

	                </div>
	              </div>
	           </div>

	        </div>
	     </div>
	</div>

    <?php paneladmin() ?>

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="content-box-large">

                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
    <!--- deze 2 divs starten bij de functions.php NIET WEGHALEN !--->
    </div>
    </div>
    <!--- deze 2 divs starten bij de functions.php NIET WEGHALEN !--->

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2017 Eigendom van mij
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
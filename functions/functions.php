<?php

function headerHtml() {
    ?>

    <!doctype html>
    <!--[if lt IE 7]>
    <html lang="en" class="no-js ie6"><![endif]-->
    <!--[if IE 7]>
    <html lang="en" class="no-js ie7"><![endif]-->
    <!--[if IE 8]>
    <html lang="en" class="no-js ie8"><![endif]-->
    <!--[if gt IE 8]><!-->
    <html lang="en" class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="UTF-8">
        <title>Rent an electric</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <link rel="shortcut icon" href="favicon.png">

        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="js/rs-plugin/css/settings.css">

        <script type="text/javascript" src="js/modernizr.custom.32033.js"></script>

        <link rel="stylesheet" href="css/eco.css">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <?php
}


function menu() { ?>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="fa fa-bars fa-lg"></span>
				</button>
				<a class="navbar-brand" href="index.php">
					<img src="img/eco/logo.png" alt="" class="logo">
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php#about">Onze kenmerken</a>
					</li>
					<li><a href="index.php#screens">Merken</a>
					</li>
					<!---<li><a class="getApp" href="rent-car.php">Producten</a>
					</li>!--->
					<li><a href="index.php#support">Contact</a>
					</li>
                    <li><a href="vestigingen.php">Vestigingen</a>
                    </li>
                    <li><a href="login.php">Login</a>
                    </li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-->
	</nav>


<?php }

function footer() {
    ?>
    <footer>
        <div class="container">
            <a href="#" class="scrollpoint sp-effect3">
                <img src="img/eco/logo.png" alt="" class="logo">
            </a>
            <div class="social">
                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-twitter fa-lg"></i></a>
                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-google-plus fa-lg"></i></a>
                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-facebook fa-lg"></i></a>
            </div>
            <div class="rights">
                <p>Copyright &copy; 2017</p>
                <p>Alle rechten voorbehouden aan <a href="#" target="_blank">Rent an electric</a></p>
            </div>
        </div>
    </footer>


    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/placeholdem.min.js"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            appMaster.preLoader();
        });
    </script>


    </body>

    </html>
    <?php
}

?>
<?php
include_once ('functions/functions.php');
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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



<body class="rent-car-body">

<header>

	<?php menu(); ?>

</header>

<div class="wrapper">

	<section id="rent-car-form">

		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#registratieModal">Open Modal</button>

	</section>

</div>




<!-- Modal -->
<div class="modal fade" id="registratieModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2>Registratie</h2>
			</div>

			<div class="modal-body">

				<div class="container col-md-12 bestuurder-info">
					<h4>Vul hier uw informatie in:</h4>
					<form>
						<div class="form-group">

							<h6>Voornaam</h6>
							<input type="text" class="form-control" placeholder="Voornaam">
						</div>

						<div class="form-group">
							<h6>Achternaam</h6>
							<input type="text" class="form-control" placeholder="Achternaam">
						</div>

						<div class="form-group">
							<h6>Email</h6>
							<input type="email" class="form-control" placeholder="Email">
						</div>

						<div class="form-group">
							<h6>Telefoonnummer</h6>
							<input type="number" class="form-control">
						</div>
						<div class="form-group col-md-8">
							<h6>Adres</h6>
							<input type="text" class="form-control" placeholder="Adres">
						</div>
						<div class="form-group col-md-4">
							<h6>Nummer</h6>
							<input type="number" class="form-control">
						</div>
						<div class="form-group">
							<h6>Postcode</h6>
							<input type="text" class="form-control" placeholder="Postcode">
						</div>


						<button type="submit" class="btn btn-success col-md-12 reserveer-btn">Registreer</button>
					</form>

				</div>

			</div>
			<div class="modal-footer">
			</div>
		</div>

	</div>
</div>


<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/placeholdem.min.js"></script>
<script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/scripts.js"></script>



</body>

</html>



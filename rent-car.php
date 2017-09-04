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
<div class="row">
	<div class="container col-xs-12 col-sm-12 col-md-4 auto-info">
		Hier komt informatie over de auto
	</div>

	<div class="container col-xs-12 col-sm-12 col-md-7 bestuurder-info">
	<form>
	<div class="form-group">
		<h4>Naam Bestuurder</h4>
		<h6>Voornaam</h6>
		<input type="text" class="form-control" placeholder="Voornaam">
	</div>

		<div class="form-group">
			<h6>achternaam</h6>
			<input type="text" class="form-control" placeholder="Achternaam">
		</div>

		<div class="form-group">
			<h4>Contact gegevens</h4>
			<h6>Email</h6>
			<input type="email" class="form-control" placeholder="Email">
		</div>

		<div class="form-group">
            <h6>Telefoonnummer</h6>
            <input type="number" class="form-control" placeholder="Telefoonnummer">
        </div>
        <div class="form-group">
            <h6>Adres</h6>
            <input type="text" class="form-control" placeholder="Adres">
        </div>
        <div class="form-group col-md-3">
            <h6>Nummer</h6>
            <input type="number" class="form-control" placeholder="Nummer">
        </div>
        <div class="form-group col-md-4">
            <h6>Postcode</h6>
            <input type="text" class="form-control" placeholder="Postcode">
        </div>

        <div class="form-group date">
            <h6>Reserveer datum</h6>
		<input type="text" class="" id="booking-from" name="booking-from" />
		<input type="text" class="" id="booking-to" name="booking-to" />
    </div>
<br>
		<button type="submit" class="btn btn-success reserveer-btn">Reserveer</button>
	</form>

	</div>
</div>
</section>

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





<script>
    $("#booking-from").datepicker({
        defaultDate: "+1w",
        minDate: 0,
        firstDay: 0,
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {


            var minDate = $(this).datepicker('getDate');
            var newMin = new Date(minDate.setDate(minDate.getDate() + 1));
            $( "#booking-to" ).datepicker( "option", "minDate", newMin );
        }
    });
    $("#booking-to").datepicker({
        defaultDate: "+1w",
        minDate: '+2d',
        changeMonth: true,
        firstDay: 0,
        dateFormat: 'dd-mm-yy',
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            var maxDate = $(this).datepicker('getDate');
            var newMax  = new Date(maxDate.setDate(maxDate.getDate() - 1));
            $( "#booking-from" ).datepicker( "option", "maxDate",  newMax);
        }
    });

    $("#booking-from").datepicker('setDate', '+1');
    $("#booking-to").datepicker('setDate', '+8');

</script>

</body>

</html>



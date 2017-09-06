<?php
include_once ('functions/functions.php');
?>
<?php headerHtml(); ?>


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
	<div class="form-group col-md-12">
		<h4>Naam Bestuurder</h4>
		<h6>Voornaam</h6>
		<input type="text" class="form-control" placeholder="Voornaam">
	</div>

		<div class="form-group col-md-12">
			<h6>Achternaam</h6>
			<input type="text" class="form-control" placeholder="Achternaam">
		</div>

		<div class="form-group col-md-12">
			<h4>Contact gegevens</h4>
			<h6>Email</h6>
			<input type="email" class="form-control" placeholder="Email">
		</div>

		<div class="form-group col-md-12">
            <h6>Telefoonnummer</h6>
            <input type="number" class="form-control" placeholder="Telefoonnummer">
        </div>
        <div class="form-group col-md-12">
            <h4>Adres gegevens</h4>
            <h6>Adres</h6>
            <input type="text" class="form-control" placeholder="Adres">
        </div>

        <div class="form-group col-md-6">
            <h6>Nummer</h6>
            <input type="number" class="form-control" placeholder="Nummer">
        </div>
        <div class="form-group col-md-6">
            <h6>Postcode</h6>
            <input type="text" class="form-control" placeholder="Postcode">
        </div>

        <div class="form-group date col-md-12">
            <h4>Reserveer</h4>
            Van:
		<input type="text" class="form-control" id="booking-from" name="booking-from" />
            Tot:
		<input type="text" class="form-control" id="booking-to" name="booking-to" />

    </div>

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



<?php
include_once ('functions/functions.php');
headerHtml(); ?>


	<body class="vestiging-body">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy7hxGxNFdwtu_NDRUspMAWZ0ufT8i-u0"></script>
	<header>

<?php
menu();?>

	<div class="wrapper">
		<section id="vestiging">
			<div class="row">
			<div class="container col-md-8"
	<div class="container col-md-4">




		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>
		asdlikajhgsujiofiusyfg<br>

	</div>
			</div>

		</section>
	</div>
	</header>

    <div id="maps" style="width: 100%; height: 480px;"></div>
	</body>

<script type="text/javascript">
    var locations = [
        ['Amsterdam', 52.3702157, 4.895167899999933, 5],
        ['Rotterdam', 51.9244201, 4.4777325999999675, 4],
        ['Utrecht', 52.09073739999999, 5.121420100000023, 3],
        ['Arnhem', 51.9851034, 5.898729600000024, 2],
        ['Groningen', 53.2193835, 6.566501700000003, 1]
    ];

    var map = new google.maps.Map(document.getElementById('maps'), {
        zoom: 7,
        center: new google.maps.LatLng(52.13263300000001, 5.2912659999999505),
        scrollwheel:  false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    var markers = new Array();

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        markers.push(marker);

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }



</script>
<?php
footer();
?>

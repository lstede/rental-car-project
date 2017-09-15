<?php
session_start();
require_once( '../functions/functionsCMS.php' );
include_once( '../classes/fresh/cars.php' );
include_once( '../classes/fresh/user.php' );
require_once( 'auto-toevoegen.php' );


headerHtml();
$car = new cars();
$user = new user();
$user->checkLogin( 'cms' );


?>
<!DOCTYPE html>
<html>


<body>


<div class="row">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <!-- <div class="absolute-wrapper"> </div> -->
    <!-- Menu -->
	<?php sidemenu(); ?>

    <!-- Main Content -->

    <div class="side-body">
        <h1> Main Content here </h1>

        <div class="container">
            <button type="button" class="btn btn-outline-dark glyphicon glyphicon-plus" data-toggle="modal"
                    data-target="#addStatusModal"></button>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nr</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
						<?php
						//print_r($user->results);
						//print_r($user->results);
						$count = 1;
						$table = 'carstatus';
						foreach ( $car->getAllCars( $table ) as $singleRowData ) {
							echo "<tr>";
							foreach ( $singleRowData as $singleRow => $singleData ) {
								echo "<td>";
								if ( $singleRow == "userId" ) {
									echo $count;

								} else {
									echo 's';
									echo $singleData;
								}
								echo "</td>";

							}
							echo "</tr>";
							$count ++;
						}
						?>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

		<?php


		statusToevoegen();
		$table = 'carstatus';
		if ( isset( $_POST['status-toevoegen'] ) ) {

			$columns = array(
				'carStatusName' => $_POST['txt_status']
			);
			$car->addCar( $table, $columns );

		}


		?>


    </div>
</div>


</body>
</html>
<?php
footer();
?>

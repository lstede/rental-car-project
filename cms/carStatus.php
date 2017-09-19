<?php
session_start();
require_once( '../functions/functionsCMS.php' );
include_once( '../classes/fresh/cars.php' );
include_once( '../classes/fresh/user.php' );
include_once('../classes/fresh/input.php');
require_once( 'auto-toevoegen.php' );


headerHtml();
$car = new cars();

$user = new user();
$user->checkLogin( 'cms' );



$idValid = false;
$idValidDelete = false;
$updated = false;

if ( isset( $_POST['status-toevoegen'] ) ) {

	$columns = array(
		'carStatusName' => $_POST['txt_status']
	);
	$car->addCar($columns);

}

if ( isset( $_POST['status-bijwerken'] ) ) {

	$columns = array(
		'carStatusName' => $_POST['txt_status']
	);

	$extraOptions = array("carStatusId" => $_GET['edit']);

	$car->editStatus($columns,$extraOptions);




}

if (isset($_GET['edit'])) {
	$dataUser = null;
	if ($car->getCar($_GET['edit'])) {
		$dataUser = $car->getCar($_GET['edit'])[0];
	}

	if ($dataUser) {
		$idValid = true;
		$_POST['txt_status'] = $dataUser['carStatusName'];

	}
}


if (isset($_GET['delete'])) {
	if ( $car->getCar( $_GET['delete'] ) ) {
		$idValidDelete = true;
	}
	if ( isset( $_POST['delete-submit'] ) && $idValidDelete ) {
		$extraOptions = array( 'carStatusId' => $_GET['delete'] );
		if ( $car->deleteCarStatus($extraOptions ) ) {
			$updated = true;
		}
	}
}

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
                        <th>Bewerken</th>

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
								if ( $singleRow == "carStatusId" ) {
									echo $count;

								} else {

									echo $singleData;
								}
								echo "</td>";

							}
							echo "<td>
                                        <a class='' href='?edit=" . $singleRowData['carStatusId'] . "'>
                                            <button class='btn btn-default glyphicon glyphicon-pencil'></button>
                                        </a>
                                           <a class='' href='?delete=" . $singleRowData['carStatusId'] . "'>
                                            <button class='btn btn-default glyphicon glyphicon-trash'></button>
                                        </a>
                                     </td>";
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

		?>

    </div>
</div>
<?php


?>

<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Status verwijderen</h4>
            </div>
            <div class="modal-body">
                <p>Weet u zeker dat u de Status wilt verwijderen?</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form method="post">
                                <input type="submit" name="delete-submit" id="delete-submit"
                                       tabindex="4" class="form-control  btn-default btn"
                                       value="Status verwijderen">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



</body>
</html>

<div class="modal fade" id="bewerkStatusModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button
            </div>

            <h4 class="modal-title">Status toevoegen</h4>
            <div class="modal-body">
                <form class="form" role="form" method="POST" title="signin">

                    <div class="form-group">
                        <label for="usr">Type:</label>
                        <input type="text" class="form-control" value="<?php echo input::get('carStatusName'); ?>" name="txt_status" title="signin">
                    </div>
                    <div>
                    </div>
                    <a class="btn btn-default" data-dismiss="modal">Annuleren</a>
                    <input type="submit" class="btn btn-primary" name="status-bijwerken" value="Toevoegen"/>


                </form>
            </div>
        </div>

    </div>
</div>

<?php

footer();

if(isset($_POST['status-bijwerken']) && $updated === false) {
	?>
    <script>
        $('#bewerkStatusModal').modal('show');
    </script>
	<?php
}

if ($idValid && $updated === false) {
	?>
    <script>
        $('#bewerkStatusModal').modal('show');


        $("#status-bijwerken").attr('name', 'update');
        $("#status-bijwerken").attr('value', 'Bijwerken');

        $('#bewerkStatusModal').on('hidden.bs.modal', function (e) {
            window.history.pushState({}, "Hide", "carStatus.php");
        })
    </script>;
	<?php
}


if ($idValidDelete && $updated === false) {
	?>
    <script>
        $('#deleteModal').modal('show');
        $('#deleteModal').on('hidden.bs.modal', function(e) {
            window.history.pushState({}, "Hide", "carStatus.php");
        })
    </script> <?php

}

?>



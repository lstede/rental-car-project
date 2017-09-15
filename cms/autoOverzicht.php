<?php
session_start();
require_once('../functions/functionsCMS.php');
include_once('../classes/fresh/cars.php');
include_once('../classes/fresh/user.php');
require_once('auto-toevoegen.php');
require('upload.php');


headerHtml();

$car = new user();
$user = new user();
$user->checkLogin('cms');



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
        <div class="container-fluid">
            <div class="side-body">
                <h1> Main Content here </h1>

	            <?php
	            autoToevoegen();
                $table = 'cars';
	            if(isset($_POST['auto-toevoegen'])){

		            $columns = array(
			            'carName' => $_POST['txt_carType'],
			            'carColor' => $_POST['txt_carColor'],
			            'carBuildYear' => $_POST['txt_carAge'],
			            'carBrand'=> $_POST['txt_carBrand'],
			            'carSeats' => $_POST['txt_carSeats'],
			            'carPrice' => $_POST['txt_carPrice'],
			            'carLocation' => $_POST['txt_carLoc'],
			            'carLicencePlate' => $_POST['txt_carPlate']);


		            $car->addCar($table,$columns);



                }

	            ?>


                <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    Select upload file: <input type="file" id="file" name="file" />
                    <input type="submit" value="uploaden" />
                    <p>
                </form>
	            <?php


	            if(isset($_FILES['file'])){

		            $fileupload = new uploadImg();
		            if( $fileupload -> sizecheck()) {
			            if ( $fileupload->filecheck() ) {
				            if ( $fileupload->uploadfile() ) {
					            echo ' uploaden gelukt';

				            } else {
					            echo ' uploaden mislukt';
				            }
			            }
		            }
	            }



	            ?>

            </div>
        </div>
    </div>


</body>
</html>
<?php
footer();
?>

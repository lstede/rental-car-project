<?php
require_once('loginCheck.php');
require_once('../functions/functions.php');
require_once('functies.php');
require('upload.php');
require_once('auto-toevoegen.php');

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
<?php
paneladmin()
?>

<div class="col-md-10">
	<div class="row">
		<div class="col-md-12">

			<div class="content-box-large">
				<div class="container">
					<div class="col-md-12">
						<?php
						autoToevoegen();
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
		</div>
	</div>
</div>
<!--- deze 2 divs starten bij de functions.php NIET WEGHALEN !--->
</div>
</div>
<!--- deze 2 divs starten bij de functions.php NIET WEGHALEN !--->
</body>
</html>


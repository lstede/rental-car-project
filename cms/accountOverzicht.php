<?php
require_once( 'loginCheck.php' );
require_once( '../functions/functions.php' );
require_once( 'functies.php' );
require_once( 'accountWijzigen.php' );
$user  = new USER;
$table = 'studentinfo';
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


                <div class='table-responsive'>
                    <table id='table' class='table table-responsive table-bordered'>
                        <tr>
                            <th>Klantnummer:</th>
                            <th>Gebruikersnaam:</th>
                            <th>Voornaam:</th>
                            <th>Achternaam:</th>
                            <th>Telefoonnummer:</th>
                            <th>Email:</th>
                            <th>Tussenvoegsel:</th>
                            <th>Wijzigen:</th>
                        </tr>

						<?php
						$rows = $user->getRows( 'users', array( 'order_by' => 'id DESC' ) );
						if ( ! empty( $rows ) ) {
							$count = 0;
							foreach ( $rows as $row ) {
								$count ++;
								echo "<td>", $row['userId'], "</td>";
								echo "<td>", $row['userName'], "</td>";
								echo "<td>", $row['userFirstName'], "</td>";
								echo "<td>", $row['userLastName'], "</td>";
								echo "<td>", $row['userPhoneNumber'], "</td>";
								echo "<td>", $row['userEmail'], "</td>";
								echo "<td>", $row['userPrefix'], "</td>";
								?>
                                <td><a class='btn btn-default'
                                       href=<?php $_SERVER['PHP_SELF'] ?> ?uId=<?php echo $row['userId'] ?>>
                                        <span class='glyphicon glyphicon-pencil'></span>
                                    </a>
                                    <a class='btn btn-default' href=?id=<?php echo $row['userId'] ?>><span
                                                class='glyphicon glyphicon-trash'></span></a>

                                </td>
								<?php


								?>
								<?php
								echo "</tr>";


							}
						}
						?>
                    </table>
                </div>
            </div>
        </div>

		<?php
		$_SESSION['uId'] = $_GET['uId'];
		$uId             = $_SESSION['uId'];

		$stmt = $user->runQuery( "SELECT * FROM users WHERE userId = :uId" );
		$stmt->execute( array( ':uId' => $uId ) );
		$row = $stmt->fetch( PDO::FETCH_ASSOC );

		$result = $stmt->rowCount();


		if ( isset( $_GET['uId'] ) ) {
			?>
            <form class="form-signin" method="post" title="signin">
                <div class="form-group col-xs-6">
                    <label for="usr">studentennummer:</label>
                    <input type="text" class="form-control" value= <?php echo $row['userId']; ?> name="txt_stnumber"
                           title="signin" required>
                </div>
                <div class="form-group col-xs-6">
                    <label for="usr">Voornaam:</label>
                    <input type="text" class="form-control" value="'.$row['studentFirstName'].'" name="txt_stname"
                           title="signin" required>
                </div>
                <div class="form-group col-xs-6">
                    <label for="usr">tussenvoegsel:</label>
                    <input type="text" class="form-control" value="'.$row['studentPrefix'].'" name="txt_stprefix"
                           title="signin">
                </div>
                <div class="form-group col-xs-6">
                    <label for="usr">Achternaam:</label>
                    <input type="text" class="form-control" value="'.$row['studentLastName'].'" name="txt_stlastname"
                           title="signin" required>
                </div>
                <div class="form-group col-xs-6">
                    <label for="usr">E-Mail:</label>
                    <input type="EMAIL" class="form-control" value="'.$row['studentEmail'].'" name="txt_stmail"
                           title="signin" required>
                </div>
                <div class="form-group col-xs-6">
                    <label for="usr">telefoon nummer:</label>
                    <input type="number" class="form-control" value="'.$row['studentPhone'].'" name="txt_stmobile"
                           title="signin" required>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" href="stWijzigen.php">Annuleren</a>
                    <input type="submit" class="btn btn-primary" name="wijzigen" value="Wijzig"/>
                </div>
            </form>
			<?php
		}
		?>
    </div>
    <div class="panel-body">

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

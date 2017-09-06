<?php
include_once ('functions/functions.php');
headerHtml();
require_once("cms/session.php");
$functies = new USER();
?>
<body>



<header>

    <?php
    menu();?>

    <?php


//controleer of de sessie leeg is
    if(empty($_SESSION['user_session'])){
	    $_SESSION['user_session'] = "";
    }
    // de user id is gelijk aan de user sessie
    $user_id = $_SESSION['user_session'];
// als de user sessie niet leeg is selecteer de alle gebruiker gegevens
    if (!empty($_SESSION['user_session'])) {


	    $stmt = $functies->runQuery("SELECT * FROM users WHERE userId=:user_id");
	    $stmt->execute(array(":user_id" => $user_id));

	    $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
// zodra er io de login-submit knop geklikt is verstuurd de gebruikersnaam en wachtwoord naar de functie doLogin om te verifieren.
    if(isset($_POST['login-submit']))
    {


	    $uname = strip_tags($_POST['username']);
	    $password = strip_tags($_POST['password']);
	    $_SESSION['username'] = strip_tags($_POST['username']);
	    if($functies->doLogin($uname,$password))
	    {

		    header("refresh:0");

	    }
	    else
	    {
            echo 'wachtwoord: 123456';
	    }

    }
    $user = new USER();
    $table = 'users';

// wanneer er op de register button wordt geklikt worden de values van de registratie doorgestuurd naar de functies en vanuit daar wordt het in de database gezet.

    if(isset($_POST['register-submit']))
    {
	    $data= array(

	    'userName' => strip_tags($_POST['username']),
	    'userFirstName' => strip_tags($_POST['name']),
	    'userLastName' => strip_tags($_POST['surname']),
	    'userEmail' => strip_tags($_POST['email']),
	    'userPhoneNumber' => strip_tags($_POST['nummer']),
	    'userPassword' => strip_tags($_POST['password'])



    );
	    $register = false;
	   $insert = $user->toevoegen($table,$data);

	   $register = true;
// melding is zichtbaar als er succesvol een account is aangemaakt
       if($register = true){
           echo 'YES';
       }

    }

// als de gebruiker niet is ingelogd laat hem dan hier inloggen
    if(!$session->is_loggedin()){
	    exit();
    }
    ?>

	<?php

	if(empty($user_id)){ ?>
    <!--RevSlider-->
    <div class="tp-banner-container force-height">
        <div class="tp-banner">
            <div class="container move-from-top">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-login">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <a href="#" class="price" id="login-form-link" onclick="login()">Login</a>
                                            <a href="#" class="registreer-link" onclick="myFunction()" id="register-form-link">Registreer</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form id="login-form"  method="post" style="display: block;">
                                                <div class="form-group">
                                                    Email:
                                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Email" value="">
                                                </div>
                                                <div class="form-group">
                                                    Wachtwoord:
                                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-center">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <form id="register-form"  method="post" role="form" style="display: none;">
                                                <div class="form-group">
                                                    Gebruikersnaam:
                                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Voornaam" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    Voornaam:
                                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Voornaam" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    Achternaam:
                                                    <input type="text" name="surname" id="surname" tabindex="1" class="form-control" placeholder="Achternaam" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    Email:
                                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    Telefoonnummer:
                                                    <input type="number" name="nummer" id="nummer" tabindex="1" class="form-control" placeholder="Nummer" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    Wachtwoord:
                                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    Herhaal Wachtwoord:
                                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Registreer nu">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


</header>


<?php }
//als de gebruiker nog niet is uitgelogd stuurt hij hem direct door naar de cms pagina
if (!empty($user_id)){
	header("location: cms/index.php");

}    ?>


<script>
    // als de register-form een display none heeft en er wordt op geklikt veranderd hij naar een display block
    function myFunction() {
        var y = document.getElementById('register-form');
        var x = document.getElementById('login-form');
        if (y.style.display === 'none') {
            y.style.display = 'block';
            x.style.display = 'none';
        }
    }

    // zodra er op de register-from wordt geklikt krijgt login-form een display none
    // totdat er weer op de login-form wordt geklikt dan krijgt hij een display block
    function login() {

        var x = document.getElementById('login-form');
        var y = document.getElementById('register-form');
        if (x.style.display === 'none') {
            x.style.display = 'block';
            y.style.display = 'none';

        }
    }
</script>


    <?php
footer();
?>




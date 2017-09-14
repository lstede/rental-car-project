<?php
session_start();
include_once('functions/functions.php');
include_once('classes/fresh/user.php');
include_once('classes/fresh/input.php');
include_once('classes/fresh/validate.php');
headerHtml();

//jaxel.meshach@uiu.us
//henkietankie


/*

Server: sql11.freemysqlhosting.net
Name: sql11193140
Username: sql11193140
Password: chRvUVtkvF
Port number: 3306

*/


$user = new user();
$user->checkLogin('login');
$validateUser = new validate();
if (isset($_POST['login-submit'])) {
    $username = input::get('username');
    $password = $_POST['password'];

    $data = array(
        'username' => array(
            'required' => true,
            'min' => '4',
            'max' => '15'
        ),
        'password' => array(
            'required' => true,
            'min' => '2',
            'max' => '15'
        ));


    if ($validateUser->validateInfo($data)) {
        $user->login($username, $password);
    }

}


$validateRegister = new validate();
if (isset($_POST['register-submit'])) {


    $data = array(
        'usernameRegister' => array(
            'required' => true,
            'min' => '4',
            'max' => '15'
        ),
        'phoneRegister' => array(
            'required' => true,
            'min' => '10',
            'max' => '10'
        ),
        'emailRegister' => array(
            'required' => true,
            'min' => '5',
            'max' => '254'
        ),
        'nameRegister' => array(
            'required' => true,
            'min' => '2',
            'max' => '35'
        ),
        'surnameRegister' => array(
            'required' => true,
            'min' => '2',
            'max' => '35'
        ),
        'passwordRegister' => array(
            'required' => true,
            'min' => '8',
            'max' => '32',
        ),
        'confirm-passwordRegister' => array(
            'required' => true,
            'match' => 'passwordRegister'
        ));


    if ($validateRegister->validateInfo($data)) {

        $hashPassword = $user->md5(input::get('passwordRegister'));
        $columns = array(
            'userPhoneNumber' => input::get('phoneRegister'),
            'userEmail' => input::get('emailRegister'),
            'userFirstName' => input::get('nameRegister'),
            'userLastName'=> input::get('surnameRegister'),
            'userName' => input::get('usernameRegister'),
            'userPassword' => $hashPassword,
            'userAdmin' => 0);

        $user->addUser('users',$columns);
    }


}


?>

<body>



<header>

    <?php
    menu(); ?>


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
                                        <a href="#" class="registreer-link" onclick="myFunction()"
                                           id="register-form-link">Registreer</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form" method="post" role="form" style="display: block;">
                                            <div class="form-group">
                                                Gebruikersnaam: <span
                                                        style="color: red;"><?php echo $validateUser->showErrors('username') ?></span>
                                                <input type="text" name="username" id="username" tabindex="1"
                                                       class="form-control" placeholder="Gebruikersnaam"
                                                       value="<?php echo input::get('username'); ?>">
                                            </div>
                                            <div class="form-group">
                                                Wachtwoord: <span
                                                        style="color: red;"><?php echo $validateUser->showErrors('password') ?></span>
                                                <input type="password" name="password" id="password" tabindex="2"
                                                       class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="login-submit" id="login-submit"
                                                               tabindex="4" class="form-control btn btn-login"
                                                               value="Log In">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <a href="https://phpoll.com/recover" tabindex="5"
                                                               class="forgot-password">Wachtwoord vergeten?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <form id="register-form"
                                              method="post" role="form" style="display: none;">
                                            <div class="form-group">
                                                Voornaam: <span
                                                        style="color: red;"><?php echo $validateRegister->showErrors('nameRegister') ?></span>
                                                <input type="text" name="nameRegister" id="name" tabindex="1"
                                                       class="form-control" placeholder="Voornaam"
                                                       value="<?php echo input::get('nameRegister'); ?>">
                                            </div>
                                            <div class="form-group">
                                                Achternaam: <span
                                                        style="color: red;"><?php echo $validateRegister->showErrors('surnameRegister') ?></span>
                                                <input type="text" name="surnameRegister" id="surname" tabindex="1"
                                                       class="form-control" placeholder="Achternaam"
                                                       value="<?php echo input::get('surnameRegister'); ?>">
                                            </div>
                                            <div class="form-group">
                                                Email: <span
                                                        style="color: red;"><?php echo $validateRegister->showErrors('emailRegister') ?></span>
                                                <input type="email" name="emailRegister" id="email" tabindex="1"
                                                       class="form-control" placeholder="Email"
                                                       value="<?php echo input::get('emailRegister'); ?>">
                                            </div>
                                            <div class="form-group">
                                                Telefoon: <span
                                                        style="color: red;"><?php echo $validateRegister->showErrors('phoneRegister') ?></span>
                                                <input type="number" name="phoneRegister" id="email" tabindex="1"
                                                       class="form-control" placeholder="phone"
                                                       value="<?php echo input::get('phoneRegister'); ?>">
                                            </div>
                                            <div class="form-group">
                                                Gebruikersnaam: <span
                                                        style="color: red;"><?php echo $validateRegister->showErrors('usernameRegister') ?></span>
                                                <input type="text" name="usernameRegister" id="username" tabindex="1"
                                                       class="form-control" placeholder="Gebruikersnaam"
                                                       value="<?php echo input::get('usernameRegister'); ?>">
                                            </div>
                                            <div class="form-group">
                                                Wachtwoord: <span
                                                        style="color: red;"><?php echo $validateRegister->showErrors('passwordRegister') ?></span>
                                                <input type="password" name="passwordRegister" id="password"
                                                       tabindex="2"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                Herhaal Wachtwoord: <span
                                                        style="color: red;"><?php echo $validateRegister->showErrors('confirm-passwordRegister') ?></span>
                                                <input type="password" name="confirm-passwordRegister"
                                                       id="confirm-password"
                                                       tabindex="2" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="register-submit" id="register-submit"
                                                               tabindex="4" class="form-control btn btn-register"
                                                               value="Registreer nu">
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

<script>
    function myFunction() {
        var y = document.getElementById('register-form');
        var x = document.getElementById('login-form');
        if (y.style.display === 'none') {
            y.style.display = 'block';
            x.style.display = 'none';
        }
    }

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




<?php
include_once ('functions/functions.php');
headerHtml(); ?>

<body>



<header>

    <?php
    menu();?>


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
                                            <form id="login-form" action="https://phpoll.com/login/process" method="post" role="form" style="display: block;">
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
                                                                <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Wachtwoord vergeten?</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: none;">
                                                <div class="form-group">
                                                    Voornaam:
                                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Voornaam" value="">
                                                </div>
                                                <div class="form-group">
                                                    Achternaam:
                                                    <input type="text" name="surname" id="surname" tabindex="1" class="form-control" placeholder="Achternaam" value="">
                                                </div>
                                                <div class="form-group">
                                                    Email:
                                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
                                                </div>
                                                <div class="form-group">
                                                    Wachtwoord:
                                                    <input type="password" name="password" id="password" tabindex="2" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    Herhaal Wachtwoord:
                                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control">
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




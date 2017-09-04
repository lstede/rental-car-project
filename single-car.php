<!doctype html>
<!--[if lt IE 7]>
<html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]>
<html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]>
<html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>Rent an electric</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="js/rs-plugin/css/settings.css">

    <script type="text/javascript" src="js/modernizr.custom.32033.js"></script>

    <link rel="stylesheet" href="css/eco.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="pre-loader">
    <div class="load-con">
        <img src="img/eco/logo.png" class="animated fadeInDown" alt="">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>

<header>

    <?php
    include_once ('functions/functions.php');
    menu();?>


    <!--RevSlider-->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <div class="container move-from-top">
                <div class="row">
                    <div class="col-md-3">
                        <div class="inner-cars">
                            <form method="post">

                                <label> Sorteer op soort
                                    <select>
                                        <option>Alle types</option>
                                        <option>Minivan</option>
                                        <option>Standaard</option>
                                        <option>Stationwagen</option>
                                        <option>Hatchback</option>
                                        <option>SUV</option>

                                    </select>
                                </label>

                                <label> Sorteer op kleur
                                    <select>
                                        <option>Blauw</option>
                                        <option>Geel</option>
                                        <option>Paars</option>
                                        <option>Rood</option>
                                        <option>Groen</option>
                                        <option>Wit</option>
                                        <option>Zwart</option>
                                    </select>
                                </label>

                                <label> Sorteer op bouwjaar
                                    <select>
                                        <?php
                                        for ($i = 2017; 1999 < $i; $i--) {
                                            echo ' <option>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </label>

                                <label> Sorteer op zitplaatsen
                                    <select>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                    </select>
                                </label>


                            </form>
                        </div>
                    </div>
                    <div class="col-md-9 margin-fix">
                        <span class="car-name">BMW I8</span>
                        <div class="inner-cars">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="img/cars/2017-bmw-i8.png">
                                    <i class="fa fa-users" aria-hidden="true"></i> 4
                                </div>
                                <div class="col-md-4">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto beatae
                                    consectetur consequatur, deleniti dolorum est eveniet in laboriosam modi, nostrum,
                                    officiis perferendis placeat possimus quibusdam saepe sint ut veniam!
                                </div>
                                <div class="col-md-4">
                                    <div class="price-wrap pull-right">
                                        <p class="price">€500,00 Per dag</p>
                                        <button class="reservate">Reserveren</button>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <span class="car-name">Tesla Model S</span>
                        <div class="inner-cars">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="img/cars/2015-tesla-model-s-sedan-angular-front.png">
                                    <i class="fa fa-users" aria-hidden="true"></i> 4
                                </div>
                                <div class="col-md-4">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto beatae
                                    consectetur consequatur, deleniti dolorum est eveniet in laboriosam modi, nostrum,
                                    officiis perferendis placeat possimus quibusdam saepe sint ut veniam!
                                </div>
                                <div class="col-md-4">
                                    <div class="price-wrap pull-right">
                                        <p class="price">€100,00 Per dag</p>
                                        <button class="reservate">Reserveren</button>
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


<div class="wrapper">
    

    <section id="support" class="doublediagonal">
        <div class="container">
            <div class="section-heading scrollpoint sp-effect3">
                <h1>Support</h1>
                <div class="divider"></div>
                <p>For more info and support, contact us!</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 scrollpoint sp-effect1">
                            <form role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your email">
                                </div>
                                <div class="form-group">
                                    <textarea cols="30" rows="10" class="form-control"
                                              placeholder="Your message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-4 col-sm-4 contact-details scrollpoint sp-effect2">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <i class="fa fa-map-marker fa-2x"></i>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">4, Some street, California, USA</h4>
                                </div>
                            </div>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <i class="fa fa-envelope fa-2x"></i>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="mailto:support@oleose.com">support@oleose.com</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <i class="fa fa-phone fa-2x"></i>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">+1 234 567890</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <a href="#" class="scrollpoint sp-effect3">
                <img src="img/eco/logo.png" alt="" class="logo">
            </a>
            <div class="social">
                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-twitter fa-lg"></i></a>
                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-google-plus fa-lg"></i></a>
                <a href="#" class="scrollpoint sp-effect3"><i class="fa fa-facebook fa-lg"></i></a>
            </div>
            <div class="rights">
                <p>Copyright &copy; 2014</p>
                <p>Template by <a href="http://www.scoopthemes.com" target="_blank">ScoopThemes</a></p>
            </div>
        </div>
    </footer>

</div>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/placeholdem.min.js"></script>
<script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/scripts.js"></script>
<script>
    $(document).ready(function () {
        appMaster.preLoader();
    });
</script>
</body>

</html>

<?php
include_once ('functions/functions.php');
?>
<!doctype html>
<!--[if lt IE 7]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">

    <title>Rent an electric</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="css/bootstrap.css">
    
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="js/rs-plugin/css/settings.css">

    <script type="text/javascript" src="js/modernizr.custom.32033.js"></script>
    
    <link rel="stylesheet" href="css/eco.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
<!--- pre-loader uitgezet omdat hij niet werkt :D
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
   !--->
    <header>
<?php menu(); ?>

        
        <!--RevSlider-->
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfl fadeout hidden-xs"
                            data-x="left"
                            data-y="bottom"
                            data-hoffset="-150"
                            data-voffset="0"
                            data-speed="500"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="img/cars/model-select-modelx.png" alt="">
                        </div>

                        <div class="tp-caption lfl fadeout visible-xs"
                            data-x="left"
                            data-y="center"
                            data-hoffset="700"
                            data-voffset="250"
                            data-speed="500"
                            data-start="700"
                            data-easing="Power4.easeOut">
                            <img src="img/cars/model-select-modelx.png" alt="">
                        </div>

                        <div class="tp-caption large_white_light sft" data-x="550" data-y="center" data-hoffset="0" data-voffset="-80" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                            Huur een

                        </div>
                        <div class="tp-caption large_white_bold sfr" data-x="650" data-y="center" data-hoffset="0" data-voffset="0" data-speed="500" data-start="1400" data-easing="Power4.easeOut">
                            Tesla model X
                        </div>

                        <div class="tp-caption sfb hidden-xs" data-x="550" data-y="center" data-hoffset="0" data-voffset="85" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                            <a href="#about" class="btn btn-primary inverse btn-lg">Bekijk ons aanbod</a>
                        </div>

                    </li>
                    <!-- SLIDE 2 -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfl fadeout hidden-xs"
                             data-x="left"
                             data-y="bottom"
                             data-hoffset="-150"
                             data-voffset="-150"
                             data-speed="500"
                             data-start="700"
                             data-easing="Power4.easeOut">
                            <img src="img/cars/2017-bmw-i8.png" alt="">
                        </div>

                        <div class="tp-caption lfl fadeout visible-xs"
                             data-x="left"
                             data-y="center"
                             data-hoffset="700"
                             data-voffset="250"
                             data-speed="500"
                             data-start="700"
                             data-easing="Power4.easeOut">
                            <img src="img/cars/model-select-modelx.png" alt="">
                        </div>

                        <div class="tp-caption large_white_light sft" data-x="550" data-y="center" data-hoffset="0" data-voffset="-80" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                            Huur een

                        </div>
                        <div class="tp-caption large_white_bold sfr" data-x="650" data-y="center" data-hoffset="0" data-voffset="0" data-speed="500" data-start="1400" data-easing="Power4.easeOut">
                            BMW I8
                        </div>

                        <div class="tp-caption sfb hidden-xs" data-x="550" data-y="center" data-hoffset="0" data-voffset="85" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                            <a href="#about" class="btn btn-primary inverse btn-lg">Bekijk ons aanbod</a>
                        </div>

                    </li>

                    <!-- SLIDE 3 -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="img/transparent.png"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfl fadeout hidden-xs"
                             data-x="left"
                             data-y="bottom"
                             data-hoffset="-150"
                             data-voffset="-150"
                             data-speed="500"
                             data-start="700"
                             data-easing="Power4.easeOut">
                            <img src="img/cars/2015-tesla-model-s-sedan-angular-front.png" alt="">
                        </div>

                        <div class="tp-caption lfl fadeout visible-xs"
                             data-x="left"
                             data-y="center"
                             data-hoffset="700"
                             data-voffset="250"
                             data-speed="500"
                             data-start="700"
                             data-easing="Power4.easeOut">
                            <img src="img/cars/model-select-modelx.png" alt="">
                        </div>

                        <div class="tp-caption large_white_light sft" data-x="550" data-y="center" data-hoffset="0" data-voffset="-80" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                            Huur een

                        </div>
                        <div class="tp-caption large_white_bold sfr" data-x="650" data-y="center" data-hoffset="0" data-voffset="0" data-speed="500" data-start="1400" data-easing="Power4.easeOut">
                            Tesla Model s
                        </div>

                        <div class="tp-caption sfb hidden-xs" data-x="550" data-y="center" data-hoffset="0" data-voffset="85" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                            <a href="#about" class="btn btn-primary inverse btn-lg">Bekijk ons aanbod</a>
                        </div>

                    </li>

                </ul>
            </div>
        </div>


    </header>


    <div class="wrapper">

        

        <section id="about">
            <div class="container">
                
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Onze kenmerken</h1>
                    <div class="divider"></div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="about-item scrollpoint sp-effect2">
                            <i class="fa fa-leaf fa-2x"></i>
                            <h3>Milieuvriendelijke</h3>
                            <p>Omdat onze auto's voornamelijk elecktrishe zijn, rijden de auto's milieuvriendelijke</p>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" >
                        <div class="about-item scrollpoint sp-effect5">
                            <i class="fa fa-globe fa-2x"></i>
                            <h3>300 locaties</h3>
                            <p>Wij willen zo snel mogelijk uitbreiden naar Belgie, Duitsland, Frankrijk en Italie </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" >
                        <div class="about-item scrollpoint sp-effect5">
                            <i class="fa fa-clock-o fa-2x"></i>
                            <h3>24/7</h3>
                            <p>Wij zijn 24/7 open zodat u de auto kan ophalen wanneer u wilt.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" >
                        <div class="about-item scrollpoint sp-effect1">
                            <i class="fa fa-eur fa-2x"></i>
                            <h3>Beste prijsgarantie</h3>
                            <p>Wij garanderen u de beste prijzen voor onze huurauto's!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section id="screens">
            <div class="container">

                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Merken</h1>
                    <div class="divider"></div>
                    <p>Bekijk ons volledige assortiment</p>
                </div>


                <div class="slider filtering scrollpoint sp-effect5" >
                    <div class="one">
                        <img src="images/tesla.png" alt="">
                        <h4>Tesla</h4>
                    </div>
                    <div class="two">
                        <img src="images/bmw.png" alt="">
                        <h4>Bmw</h4>
                    </div>
                    <div class="one">
                        <img src="images/mercedes-logo.png" alt="">
                        <h4>Mercedes-Benz</h4>
                    </div>
                    <div class="two">
                        <img src="images/volkswagen-logo.png" alt="">
                        <h4>Volkswagen</h4>
                    </div>
                    <div class="three">
                        <img src="images/rolls-royce-logo.png" alt="">
                        <h4>Rolls-Royce</h4>
                    </div>
                </div>
            </div>
        </section>




        <section id="support" class="doublediagonal">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>Contact</h1>
                    <div class="divider"></div>
                    <p>Heeft u vragen? Stel ze dan hier!</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 scrollpoint sp-effect1">
                                <form role="form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Naam">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea cols="30" rows="10" class="form-control" placeholder="Uw bericht"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg">Verstuur</button>
                                </form>
                            </div>
                            <div class="col-md-4 col-sm-4 contact-details scrollpoint sp-effect2">
                                <div class="media">
                                    <a class="pull-left">
                                        <i class="fa fa-map-marker fa-2x"></i>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Rotterdam,  Willemstraat 3881 TT, NL </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="#" >
                                        <i class="fa fa-envelope fa-2x"></i>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="mailto:support@oleose.com">support@rentanelectric.nl</a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="#" >
                                        <i class="fa fa-phone fa-2x"></i>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">+0341 09 67 43</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




            <div id="map" style="width: 100%;height: 350px;"></div>




	    <?php
	    footer();
	    ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy7hxGxNFdwtu_NDRUspMAWZ0ufT8i-u0"></script>
    <script>
        $(document).ready(function() {
            appMaster.preLoader();
        });
    </script>
    <script type="text/javascript">
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 8,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(51.926312, 4.517767), // Rotterdam
                scrollwheel:  false,

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#88e9ad"},{"visibility":"on"}]}]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(51.926312, 4.517767),
                map: map,
                title: 'Rent an electric'
            });


        }
    </script>

</body>

</html>

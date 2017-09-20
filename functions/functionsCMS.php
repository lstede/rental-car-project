<?php
function headerHtml() {
?>

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

    <link rel="stylesheet" href="/rental-oefen-examen/rental-car-project/css/bootstrap.min4.css">

        <link rel="stylesheet" href="/rental-oefen-examen/rental-car-project/css/main.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
}


function sidemenu()
{
    ?>

    <div class="side-menu">

        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="brand-wrapper">
                    <!-- Hamburger -->
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Brand -->
                    <div class="brand-name-wrapper">
                        <a class="navbar-brand" href="#">
                            Brand
                        </a>
                    </div>

                    <!-- Search -->
                    <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>

                    <!-- Search body -->
                    <div id="search" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form class="navbar-form" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default "><span
                                            class="glyphicon glyphicon-ok"></span></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">

                    <li><a href="#"><span class="glyphicon glyphicon-send"></span> Overzicht</a></li>
                    <li class="active"><a href="../cms/userOverview.php"><span class="glyphicon glyphicon-plane"></span> Gebruikers overzicht</a></li>
                    <li><a href="../cms/autoOverzicht.php"><span class="glyphicon glyphicon-cloud"></span> Auto's overzicht</a></li>

                    <!-- Dropdown-->
                    <li class="panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl1">
                            <span class="glyphicon glyphicon-user"></span>Instellingen<span class="caret"></span>
                        </a>

                        <!-- Dropdown level 1 -->
                        <div id="dropdown-lvl1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href=../cms/locaties.php>Locaties toevoegen</a></li>
                                    <li><a href="#">Merken</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <!-- Dropdown-->
                    <li class="panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl2">
                            <span class="glyphicon glyphicon-user"></span>Auto's overzicht<span class="caret"></span>
                        </a>

                        <!-- Dropdown level 1 -->
                        <div id="dropdown-lvl2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="../cms/autoOverzicht.php">Auto's</a></li>
                                    <li><a href="../cms/carStatus.php">Status</a></li>
                                    <li><a href="../cms/carColor.php">Kleur</a></li>
                                    <li><a href="../cms/autoType.php">Type</a></li>
                                    <li><a href="../cms/carBrands.php">Merken</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </div>

    <?php
}






function footer() {
    ?>



    <script src="/rental-oefen-examen/rental-car-project/js/jquery-3.2.1.min.js"></script>
    <script src="/rental-oefen-examen/rental-car-project/js/bootstrap.min4.js"></script>

    <script>
        $(function () {
            $('.navbar-toggle').click(function () {
                $('.navbar-nav').toggleClass('slide-in');
                $('.side-body').toggleClass('body-slide-in');
                $('#search').removeClass('in').addClass('collapse').slideUp(200);

                /// uncomment code for absolute positioning tweek see top comment in css
                //$('.absolute-wrapper').toggleClass('slide-in');

            });

            // Remove menu for searching
            $('#search-trigger').click(function () {
                $('.navbar-nav').removeClass('slide-in');
                $('.side-body').removeClass('body-slide-in');

                /// uncomment code for absolute positioning tweek see top comment in css
                //$('.absolute-wrapper').removeClass('slide-in');

            });
        });
    </script>


    </body>

    </html>
    <?php
}
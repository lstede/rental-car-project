<?php
include 'verifyLogin.php';

$verify = new verifyLogin();

$verify->verify();


if (isset($_GET['loguit'])) {
    $verify->logOut();
}
?>


<div class="row">
    <div class="side-menu">

        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <div class="brand-wrapper">
                    <!-- Hamburger -->
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <div class="brand-name-wrapper">
                        <a class="navbar-brand" href="../homePage/home.php">
                            <?php echo "Hallo " . $_SESSION["username"];
                            if ($_SESSION["rights"] == 1) {
                                echo "(Beheerder)";
                            } elseif ($_SESSION["rights"] == 2) {
                                echo "(Management)";
                            } else {
                                echo "Medewerker";

                            } ?>
                        </a>
                    </div>

                </div>

            </div>

            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">


                    </li>
                    <li><a href="../uitleenMenu/uitleen.php"><span class="glyphicon glyphicon-eject"></span>
                            Uitlenen</a>
                    </li>
                    <?php
                    if ($_SESSION["rights"] == 2) {
                        ?>
                        <li><a href="../userMenu/user.php"><span class="glyphicon glyphicon-knight"></span> Gebuikers
                                Instellingen </a>
                        </li>
                        </li>
                        <li><a href="../itemsmenu/items.php"><span class="glyphicon glyphicon-hdd"></span>
                                Artikellen Instellingen</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li><a href="../studentMenu/student.php"><span class="glyphicon glyphicon-pawn"></span>
                            Student Instellingen</a>
                    </li>
                    <li><a href="../teacherMenu/teacher.php"><span class="glyphicon glyphicon-bishop"></span>
                            Docent Instellingen</a>
                    </li>
                    <li><a href="../clientsMenu/clients.php"><span class="glyphicon glyphicon-shopping-cart"></span>
                            Klant Instellingen</a>
                    </li>
                    </li>
                    <li><a href="../ticketsMenu/tickets.php"><span class="glyphicon glyphicon-print"></span>
                            Ticket Overzicht</a>
                    </li>


                    <li><a href="?loguit"><span class="glyphicon glyphicon-log-out"></span> Loguit </a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </div>


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script>$(function () {
            $('.navbar-toggle').click(function () {
                $('.navbar-nav').toggleClass('slide-in');
                $('.side-body').toggleClass('body-slide-in');
                //$('html, body').css('overflowX', 'hidden');
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
        });</script>

        




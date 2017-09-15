<?php
session_start();
require_once( '../functions/functionsCMS.php' );
include_once( '../classes/fresh/user.php' );


headerHtml();

$user = new user();
$user->checkLogin( 'cms' );


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

    <div class="side-body">
        <h1> Main Content here </h1>


    </div>
</div>


</body>
</html>
<?php
footer();
?>

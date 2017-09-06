<?php
require ('functies.php');
$user_logout = new USER();


if($user_logout->is_loggedin()!= "")
{
    header("Location: ../login.php");
}
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $user_logout->doLogout();
    header("Location: ../login.php");
}
else{
    session_destroy();
    header("Location: ../login.php");
}

?>
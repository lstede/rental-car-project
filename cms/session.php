<?php
session_start();
error_reporting(0);
require_once ("functies.php");
$session = new USER();


if(!$session->is_loggedin())
{
        header("Location: login.php");
}


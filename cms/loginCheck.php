<?php
require_once('session.php');
require_once('functies.php');

$functies = new USER();

if(empty($_SESSION['user_session']))
{
    header("Location: ../login.php");
}
$user_id = $_SESSION['user_session'];

if (!empty($_SESSION['user_session']))
{
    // check rights
    $stmt2 = $functies->runQuery("SELECT * FROM users WHERE userId = :id");
    $stmt2->bindParam(":id",$_SESSION['user_session']);
    $stmt2->execute();
    $userRow = $stmt2->fetch(PDO::FETCH_ASSOC);
    $_SESSION['userName'] = $userRow['userName'];
    $_SESSION['userRights'] = $userRow['userRights'];
 

}
?>
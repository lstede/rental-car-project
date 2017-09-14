<?php
class verifyLogin
{
    public function verify() {
        if(isset($_SESSION["username"]) && isset($_SESSION["rights"])) {

        }
        else {
            ?>
            <meta http-equiv="refresh" content="0; url=../index.php" />
            <?php
        }
    }

    public function verifyAcces() {
        if(isset($_SESSION["rights"])) {

        }
        else {
            ?>
            <meta http-equiv="refresh" content="0; url=../index.php" />
            <?php
        }
    }

    public function verifyAdmin() {
        if(($_SESSION["rights"]) >= 2) {

        }
        else {
            ?>
            <meta http-equiv="refresh" content="0; url=../index.php" />
            <?php
        }
    }

    public function logOut() {

            session_unset();
            session_destroy();
            header('Location: ../index.php');

    }



}

?>
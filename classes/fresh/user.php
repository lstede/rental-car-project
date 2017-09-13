<?php
include_once('dbExec.php');

class user extends dbExec
{

    public $errors = array();

    public function login($username, $password)
    {
        $extraOptions = array("username" => $username);
        $this->query('select','users', '', $extraOptions);

        if ($this->countResults < 1) {
            $this->errors[] = 'Gebruikersnaam bestaat niet';
        }


        if ($this->results[0]['userPassword'] == $this->md5($password)) {
            $_SESSION['logged'] = true;
            $_SESSION['rights'] = $this->results[0]['userAdmin'];
            ?>
            <meta http-equiv="refresh" content="0;url=cms/index.php"> <?php
        } else {
            $this->errors[] = 'Wachtwoord is onjuist';
        }
    }

    public function md5($password)
    {
        return md5($password);
    }

    public function checkLogin($page)
    {
        if (!isset($_SESSION['logged'])) {
            $_SESSION['logged'] = false;
        }

        if ($_SESSION['logged'] && $page == 'login') {
            header("location:cms/index.php");
            echo 1;
            die;
        }

        else if (!$_SESSION['logged'] && $page == 'cms') {
            header("location:../login.php");
            echo 2;
            die;
        }


    }

    public function addUser($table,$columns) {
        $this->query('insert',$table,$columns);
    }

    public function getAllUsers() {
        $this->query('select','users');
        return $this->results;
    }

}
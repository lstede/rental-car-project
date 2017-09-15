<?php
include 'feedback.php';

class dbExecutes
{
    private $host = "127.0.0.1";
    private $db_name = "compict";
    private $username = "root";
    private $password = "";
    private $userRights;
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }


    }

    public function login($username, $hashedPassword)
    {
        //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM user WHERE userName = :username And userPassword = :hashedPassword";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':hashedPassword', $hashedPassword);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION["username"] = $row['userName'];
                $this->userRights = $row['userRights'];
                $_SESSION["rights"] = $this->userRights;

                $id = $row['userId'];

                $selector = array(
                    "userLastLogin" => date("d-m-Y H:i:s")
                );


                $edituser = new users(new dbExecutes, "user");
                $edituser->edituser("user", $selector, $id, "userId");

                ?>

                <div class="alert alert-success">
                    <strong>Success!</strong> U wordt ingelogd...
                </div>

                <meta http-equiv="refresh" content="0;url=homePage/home.php">

                <?php


            }
        } else {
            ?>
            <div class="alert alert-danger">
                <strong>Verkeerde inloggegevens! </strong> Probeer het opnieuw.
            </div>

            <?php
        }
    }





}

?>
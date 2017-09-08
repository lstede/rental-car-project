<?php


class dbConn
{
    private $host = "localhost";
    private $db_name = "rentacar";
    private $username = "root";
    private $password = "";
    protected $conn;


    public function __construct()
    {
            try {

                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
    }






}

?>
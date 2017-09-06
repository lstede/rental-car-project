<?php
require('dbconn.php');
require('session.php');


class USER
{

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;

    }
    public function getRows($table,$conditions = array()){
        $sql = 'SELECT ';
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        if(array_key_exists("where",$conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }

        $query = $this->conn->prepare($sql);
        $query->execute();

        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
            switch($conditions['return_type']){
                case 'count':
                    $data = $query->rowCount();
                    break;
                case 'single':
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    break;
                default:
                    $data = '';
            }
        }else{
            if($query->rowCount() > 0){
                $data = $query->fetchAll();
            }
        }
        return !empty($data)?$data:false;
    }

    public function doLogin($uname,$password)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE userEmail = :uname AND userPassword = :upass");
            $stmt->bindParam(":uname", $uname);
            $stmt->bindParam(":upass", $password);
            $stmt->execute();

            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1) {
                if ($password = ['userPassword']) {

                    $_SESSION['user_session'] = $userRow['userId'];
                    return true;
                }
                else {

                    return false;

                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function toevoegen($table,$data){
      
            $columnString = implode(',', array_keys($data));
            $valueString = ":".implode(',:', array_keys($data));
            $stmt = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
            $query = $this->conn->prepare($stmt);
            foreach($data as $key=>$val){
                $query->bindValue(':'.$key, $val);
            }
            $insert = $query->execute();
            return $insert?$this->conn->lastInsertId():false;
    }
   
    public function update($table,$data,$conditions){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;

            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions)&& is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $sql = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
            $query = $this->conn->prepare($sql);
            $update = $query->execute();
            return $update?$query->rowCount():false;
        }else{
            return false;
        }
    }

        public function delete($table,$conditions){
        $whereSql = '';
        if(!empty($conditions)&& is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql = "DELETE FROM ".$table.$whereSql;
        $delete = $this->conn->exec($sql);
        return $delete?$delete:false;
    }
    
        


    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function is_loggedin_id()
    {
        return $_SESSION['user_session'];
    }

    public function doLogout()
    {
        session_destroy();
        return true;
    }
}











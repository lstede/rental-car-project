<?php
include_once('dbConn.php');

class dbExec extends dbConn
{

    public $results;
    protected $countResults = 0;

    public function __construct()
    {

        parent::__construct();

    }

    public function mainExecute($action, $table, $where = array())
    {
        $sql = "{$action} from {$table}";

        if (!empty($where)) {
            $value = $where[0];
            $operator = $where[1];
            $input = $where[2];

            $sql .= " where {$value} {$operator} :input";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':input', $input);
        } else {
            $stmt = $this->conn->prepare($sql);

        }


        $stmt->execute();
        $this->results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->countResults = $stmt->rowCount();
    }


    public function insert($table, $columns)
    {
        $sql = "INSERT INTO {$table} ( " . implode(', ', array_keys($columns)) . ") VALUES (";

        $arrayKeys = array_keys($columns);
        foreach ($columns as $singleColum => $singleValue) {
            $sql .= ":" . $singleColum;
            if ($singleColum != end($arrayKeys)) {
                $sql .= ", ";
            }

        }
        $sql .= ')';
        $stmt = $this->conn->prepare($sql);

        foreach ($columns as $singleColum => $singleValue) {
            $stmt->bindParam($singleColum, $columns[$singleColum]);
        }

        $stmt->execute();


    }

    public function query($option, $table, $columns)
    {
        switch ($option) {
            case ('insert'):
                $sql = "INSERT INTO {$table} ( " . implode(', ', array_keys($columns)) . ") VALUES (";
                $arrayKeys = array_keys($columns);
                foreach ($columns as $singleColum => $singleValue) {
                    $sql .= ":" . $singleColum;
                    if ($singleColum != end($arrayKeys)) {
                        $sql .= ", ";
                    }

                }
                $sql .= ')';
                break;
            case('update'):
                $sql = "UPDATE {$table} SET ";
                $arrayKeys = array_keys($columns);
                foreach ($columns as $singlecolum => $singleValue) {
                    $sql.= $singlecolum . " = :" . $singlecolum;
                    if ($singlecolum != end($arrayKeys)) {
                        $sql .= ", ";
                    }
                }
                $sql.= "WHERE";
                break;
        }


        $stmt = $this->conn->prepare($sql);

        foreach ($columns as $singleColum => $singleValue) {
            $stmt->bindParam($singleColum, $columns[$singleColum]);
        }

        $stmt->execute();


    }

    public function update()
    {

    }


    public function getData($table, $where)
    {
        $this->mainExecute('SELECT *', $table, $where);
        return $this;
    }


}
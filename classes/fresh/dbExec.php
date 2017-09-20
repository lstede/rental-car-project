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

    public function query($option, $table, $columns = NULL, $extraOptions = NULL)
    {
        switch ($option) {

            case ('select'):
                $sql = "SELECT * FROM {$table} ";

                if (!empty($extraOptions)) {
                    $sql .= "WHERE ";
                    $arrayKeys = array_keys($extraOptions);
                    foreach ($extraOptions as $option => $value) {
                        if ($option != end($arrayKeys)) {
                            $sql .= $option . " = :{$option} AND ";
                        } else {
                            $sql .= $option . " = :{$option}";
                        }

                    }
                }

                break;

            case('selectJoin'):

                $sql = "SELECT ";

                if (!empty($columns)) {
                    $arrayKeys = array_values($columns);

                    foreach ($columns as $value) {
                        $sql .= $value;
                        if ($value != end($arrayKeys)) {
                            $sql .= ", ";
                        }
                    }
                }

                $sql.= " FROM {$table} ";

                foreach ($extraOptions as $extraTable => $extraValues) {
                    $sql.= "JOIN $extraTable";
                    foreach ($extraValues as $singleValue => $singleTarget) {
                        $sql.= " ON {$singleValue} = {$singleTarget} ";
                    }
                }
                break;

            case('insert'):
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
                    $sql .= $singlecolum . " = :" . $singlecolum;
                    if ($singlecolum != end($arrayKeys)) {
                        $sql .= ", ";
                    }
                }
                if (!empty($extraOptions)) {
                    $sql .= " WHERE ";
                    $arrayKeys = array_keys($extraOptions);
                    foreach ($extraOptions as $option => $value) {
                        if ($option != end($arrayKeys)) {
                            $sql .= $option . " = :{$option} AND ";
                        } else {
                            $sql .= $option . " = :{$option}";
                        }

                    }
                }
                break;

            case('delete'):
                $sql = "DELETE FROM {$table}";
                /*$arrayKeys = array_keys($columns);
                foreach ($columns as $singlecolum => $singleValue) {
                    $sql .= $singlecolum . " = :" . $singlecolum;
                    if ($singlecolum != end($arrayKeys)) {
                        $sql .= ", ";
                    }
                }*/
                if (!empty($extraOptions)) {
                    $sql .= " WHERE ";
                    $arrayKeys = array_keys($extraOptions);
                    foreach ($extraOptions as $option => $value) {
                        if ($option != end($arrayKeys)) {
                            $sql .= $option . " = :{$option} AND ";
                        } else {
                            $sql .= $option . " = :{$option}";
                        }

                    }
                }
                break;

        }


        $stmt = $this->conn->prepare($sql);

        if (!empty($columns) && $option != 'selectJoin') {
            foreach ($columns as $singleColum => $singleValue) {
                $stmt->bindParam($singleColum, $columns[$singleColum]);
            }
        }

        if (!empty($extraOptions) && $option != 'selectJoin') {
            foreach ($extraOptions as $singleColumn => $value) {
                $stmt->bindParam(":" . $singleColumn, $extraOptions[$singleColumn]);
            }
        }


        $stmt->execute();
        $this->results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->countResults = $stmt->rowCount();

    }


}
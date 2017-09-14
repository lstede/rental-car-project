<?php


class users
{

    public $conn;
    public $arrayData = array();
    public $arrayInfo = array();
    public $returnNoData;

    public function __construct(dbExecutes $db, $table)
    {

        $this->conn = $db->conn;

    }

    public function hasPassword($password)
    {
        return md5($password);
    }

    public function loadData($select, $selectArray)
    {
        if (strpos($select, "itemstatus") !== false || strpos($select, "ticketHandled") !== false) {
            $removeDelete = "true";
        }

        $sql = "SELECT * FROM $select";


        $stmt = $this->conn->prepare($sql);
        $stmt->execute();


        if ($stmt->rowCount() < 1) {
            ?>
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <strong>Geen resultaten</strong>
            </div>
            <?php
            $this->returnNoData = true;
        }

        if ($select == "studentinfo" && count($selectArray) > 1) {
            $select = "student";
        }
        if ($select == "teacherinfo") {
            $select = "teacher";
        }
        if (strpos($select, "items") === false) {
        } else {
            $select = "item";
        }
        if (strpos($select, "ticket") === false) {
        } else {
            $select = "ticket";
        }
        if (strpos($select, "user") !== false) {
            $select = "user";
        }


        if (count($selectArray) > 2) {


            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                echo "<tr>";
                foreach ($selectArray as $show) {

                    switch($show) {
                        case "ticketIncome":
                            break;
                        case "ticketType" :
                            break;
                        case "ticketCat":
                            break;
                        case "ticketSubCat" :
                            break;

                        default:
                        echo "<td>" . $row["$show"] . "</td>";
                    }


                    array_push($this->arrayData, $row["$show"]);
                }


                if (strpos($select, "user") !== false) {
                    echo "<td>";
                    echo "******";
                    echo "</td>";


                    if ($row['userRights'] == 2) {
                        echo "<td>";
                        echo "Management";
                        echo "</td>";
                    } elseif ($row['userRights'] == 1) {
                        echo "<td>";
                        echo "Beheerder";
                        echo "</td>";
                    } elseif ($row['userRights'] == 0) {
                        echo "<td>";
                        echo "Medewerker";
                        echo "</td>";
                    } else {

                    }
                }
                ?>


                <?php
                ?>
                <td>
                    <form method="post">


                        <?php
                        foreach ($this->arrayData as $testje => $value) {
                            ?>
                            <input type="hidden" name="<?php echo $testje ?>" value="<?php echo $value ?>">
                            <?php
                            $this->arrayData = array();
                        }


                        switch ($select) {
                            case "name":
                                ?>
                                <input type="hidden" name="confirmUsername" value="<?php echo $row['userName'] ?>">
                                <?php
                                break;

                            case ($select == "user" || $select == "student" || $select == "teacher"):
                                ?>

                                <input type="hidden" name="name"
                                       value="<?php echo $row['' . $select . 'FirstName'] . " " . $row['' . $select . 'Prefix'] .
                                           " " . $row['' . $select . 'LastName'] ?>">
                                <?php
                                break;

                            case ($select == "item" || $select == "client"):
                                ?>
                                <input type="hidden" name="name"
                                       value="<?php echo $row['' . $select . 'Name'] ?>">
                                <?php
                                break;

                        }


                        ?>
                        <input type="hidden" name="id" value="<?php echo $row['' . $select . 'Id'] ?>">

                        <button type="submit" name="<?php if ($select == "ticket") {
                            echo "update";
                        } else {
                            echo "update";
                        }
                        ?>" class="btn btn-default">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>
                        <?php
                        if ($_SESSION['rights'] > 1) {
                            if (!isset($removeDelete)) {


                                ?>
                                <button type="submit" name="delete" class="btn btn-default">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                                <?php
                            }
                        }
                        ?>

                    </form>
                    <?php

                    ?>


                </td>
                <?php


                echo "</tr>";

            }

        } else {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                foreach ($selectArray as $id => $value) {
                    $this->arrayInfo[$row[$id]] = $row[$value];
                }
            }
        }
    }

    public function addUser($table, $selector)
    {
        $keys = array_keys($selector);
        $values = "";
        $x = 1;

        foreach ($selector as $field) {
            $values .= "?";
            if ($x < count($selector)) {
                $values .= ', ';
            }
            $x++;
        }

        $sql = "INSERT INTO {$table} (" . implode(', ', $keys) . ") VALUES ({$values})";

        try {


            $stmt = $this->conn->prepare($sql);
            $x = 1;
            foreach ($selector as $field) {
                $stmt->bindValue($x, $field);
                $x++;
            }

            if ($stmt->execute()) {
                succes();
            } else {
                failed();
            }


        } catch (Exception $e) {
            failed();
        }

    }

    public function editUser($table, $selector, $id, $selectid)
    {
        $set = "";
        $x = 1;


        foreach ($selector as $name => $value) {
            $set .= "{$name} = ?";
            if ($x < count($selector)) {
                $set .= ', ';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE {$selectid} = {$id}";


        try {

            $stmt = $this->conn->prepare($sql);
            $x = 1;
            foreach ($selector as $field) {
                $stmt->bindValue($x, $field);
                $x++;
            }

            if ($stmt->execute()) {
                succes();
            } else {
                failed();
            }
        } catch (Exception $e) {
            failed();
        }

    }


    public function deleteUser($select, $userid, $selectId)
    {
        try {
            $sql = "DELETE FROM $select WHERE $selectId=:userid";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':userid', $userid);
            $stmt->execute();

            if ($stmt->execute()) {
                succes();
            } else {
                failed();
            }
        } catch (Exception $e) {
            failed();
        }
    }


}


?>
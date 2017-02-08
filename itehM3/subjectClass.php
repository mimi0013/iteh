<?php

include_once('response.php');

class Subject
{
    public $id;
    public $name;


    public function __construct($name)
    {
        $this->name = $name;

    }

    public static function getAll()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM subject";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while ($row = $result->fetch_object()) {
            $subject = new Subject($row->name);
            $subject->id = $row->id;
            array_push($arrayResult, $subject);
        }
        return $arrayResult;
    }

    public static function getLast()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM subject ORDER BY id DESC LIMIT 1";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error;
            exit();
        }

        $subject = null;
        while ($row = $result->fetch_object()) {
            $subject = new Subject($row->name);
            $subject->id = $row->id;
        }
        return $subject;
    }

    public static function getById($id)
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM subject WHERE id = $id";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error . " SUBJECT CLASS";
            exit();
        }

        $subject = null;
        while ($row = $result->fetch_object()) {
            $subject = new Subject($row->name);
            $subject->id = $row->id;
        }
        return $subject;
    }

    public function addNew()
    {
        include_once('mysqlConnection.php');
        global $mysqli;

        $query = "INSERT INTO subject (name) VALUES ('"
            . $mysqli->real_escape_string($this->name) . "')";

        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function editSubject()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $query = "UPDATE subject SET NAME = '" . $this->name . "' WHERE id = $this->id";

        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSubject()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $query = "DELETE FROM subject WHERE id = $this->id";
        if ($mysqli->query($query)) {
            echo json_encode(new Response(1, "Predmet je obrisana!."));
            return true;
        } else {
            echo json_encode(new Response(0, "Predmet je trenunto u upotrebi!"));
            return false;
        }
    }


}
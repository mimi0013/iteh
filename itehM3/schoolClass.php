<?php

include_once('response.php');

class School
{
    public $id;
    public $name;
    public $address;
    public  $numberOfStudents;

    public function __construct($name, $address, $numberOfStudents)
    {
        $this->name = $name;
        $this->address = $address;
        $this->numberOfStudents = $numberOfStudents;
    }

    public static function getAll()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM school";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR" . $mysqli->mysql_error;
            exit();
        }

        $arrayResult = array();
        while ($row = $result->fetch_object()) {
            $school = new School($row->name, $row->address, $row->numberOfStudents);
            $school->id = $row->id;
            array_push($arrayResult, $school);
        }
        return $arrayResult;
    }

    public static function getLast()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM school ORDER BY id DESC LIMIT 1";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error;
            exit();
        }

        $school = null;
        while ($row = $result->fetch_object()) {
            $school = new School($row->name, $row->address, $row->numberOfStudents);
            $school->id = $row->id;
        }
        return $school;
    }

    public static function getById($id)
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM school WHERE id = $id";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error . " SCHOOL CLASS";
            exit();
        }

        $school = null;
        while ($row = $result->fetch_object()) {
            $school = new School($row->name, $row->address, $row->numberOfStudents);
            $school->id = $row->id;
        }
        return $school;
    }

    public function addNew()
    {
        include_once('mysqlConnection.php');
        global $mysqli;

        //zasto je name narandzasto

        $query = "INSERT INTO school (name, address, numberOfStudents) VALUES ('"
            . $mysqli->real_escape_string($this->name) . "', '"
            . $mysqli->real_escape_string($this->address) . "', '"
            . $mysqli->real_escape_string($this->numberOfStudents) . "')";

        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function editSchool()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $query = "UPDATE school SET NAME = '" . $this->name . "', ADDRESS = '" . $this->address . "', NUMBEROFSTUDENTS = '" . $this->numberOfStudents . "' WHERE id = $this->id";

        if ($mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSchool()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $query = "DELETE FROM school WHERE id = $this->id";
        if ($mysqli->query($query)) {
            echo json_encode(new Response(1, "Skola obrisana!."));
            return true;
        } else {
            echo json_encode(new Response(0, "Skola je trenunto u upotrebi!"));
            return false;
        }
    }


}
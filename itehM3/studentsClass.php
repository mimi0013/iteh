<?php
include_once('response.php');

class Student
{
    public $id;
    public $first_name;
    public $last_name;
    public $grade;
    public $address;
    public $date_of_birth;
    public $school;
    public $subject;

    public function __construct($first_name, $last_name, $grade, $address,$date_of_birth, $school, $subject)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->grade = $grade;
        $this->address = $address;
        $this->date_of_birth= $date_of_birth;
        $this->school = $school;
        $this->subject = $subject;

    }

    public static function getAll()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM students";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR" . $mysqli->mysql_error . " STUDENT CLASS";
            exit();
        }

        $arrayResult = array();
        while ($row = $result->fetch_object()) {
            $student = new Student($row->first_name, $row->last_name, $row->grade, $row->address,$row->date_of_birth, $row->school, $row->subject);
            $student->id = $row->id;
            array_push($arrayResult, $student);
        }
        return $arrayResult;
    }

    public static function getLast()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM students ORDER BY id DESC LIMIT 1";

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error;
            exit();
        }

        $student = null;
        while ($row = $result->fetch_object()) {
            $student = new Student($row->first_name, $row->last_name, $row->grade, $row->address,$row->date_of_birth, $row->school, $row->subject);
            $student->id = $row->id;
        }
        return $student;
    }

    public static function getById($id)
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $sql = "SELECT * FROM students WHERE id=" . $id;

        if (!$result = $mysqli->query($sql)) {
            echo "ERROR " . $mysqli->error;
            exit();
        }

        $student = null;
        while ($row = $result->fetch_object()) {
            $student = new Student($row->first_name, $row->last_name, $row->grade, $row->address, $row->date_of_birth, $row->school, $row->subject);
            $student->id = $row->id;
        }
        return $student;
    }

    public function addNew()
    {
        include_once('mysqlConnection.php');
        global $mysqli;

        $query = "INSERT INTO students (first_name, last_name, grade, address,date_of_birth, school, subject) VALUES ('"
            . $mysqli->real_escape_string($this->first_name) . "', '"
            . $mysqli->real_escape_string($this->last_name) . "', '"
            . $mysqli->real_escape_string($this->grade) . "', '"
            . $mysqli->real_escape_string($this->address) . "', '"
            . $mysqli->real_escape_string(date('Y-m-d', strtotime($this->date_of_birth))) . "', '"
            . $mysqli->real_escape_string($this->school) . "', '"
            . $mysqli->real_escape_string($this->subject) . "')";

        if ($mysqli->query($query)) {
            return true;
        } else {
            echo $mysqli->error;
            return false;
        }
    }

    public function editStudent()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $query = "UPDATE STUDENTS SET FIRST_NAME = '" . $this->first_name
            . "', LAST_NAME = '" . $this->last_name
            . "', GRADE = '" . $this->grade
            . "', ADDRESS = '" . $this->address
            . "', DATE_OF_BIRTH = '" . date('Y-m-d', strtotime($this->date_of_birth))
            . "', SCHOOL = '" . $this->school
            . "', SUBJECT = '" . $this->subject
            . "' WHERE id = $this->id";

        if ($mysqli->query($query)) {
            return true;
        } else {
            echo $mysqli->error;
            return false;
        }
    }


    public function deleteStudent()
    {
        include_once('mysqlConnection.php');
        global $mysqli;
        $query = "DELETE FROM students WHERE id =" . $this->id;
        if ($mysqli->query($query)) {
            echo json_encode(new Response(1, "Student obrisan."));
            return true;
        } else {
            echo json_encode(new Response(0, "Greska pri brisanju studenata!"));
            return false;
        }
    }
}

?>


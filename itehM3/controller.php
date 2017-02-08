<?php
require_once 'studentsClass.php';
require_once 'subjectClass.php';
require_once 'schoolClass.php';


class Controller {

    static function  deleteStudent($id) {
        $student = Student::getById($id);
        $student->deleteStudent();
    }

    static function  deleteSchool($id) {
        $school = School::getById($id);
        $school->deleteSchool();
    }

    static function  deleteSubject($id) {
        $subject = Subject::getById($id);
        $subject->deleteSubject();
    }

    static function getLastStudent() {
        $student = Student::getLast();
        return $student;
    }

    static function getLastSchool() {
        $school = School::getLast();
        return $school;
    }

    static function getSubjects() {
        $subjects = Subject::getAll();
        return $subjects;
    }

    static function getSubjectById($id) {
        $subject = Subject::getById($id);
        return $subject;
    }

    static function getSchoolById($id) {
        $school = School::getById($id);
        return $school;
    }

    static function getSchools() {

        $schools = School::getAll();
        var_dump($schools);
        exit;
        return $schools;
    }

    static function getStudents() {
        $students = Student::getAll();
        return $students;
    }

    static function getStudentById($id) {
        $student = Student::getById($id);
        return $student;
    }

    static function addSubject($name) {
        $subject = new Subject($name);
        $result = $subject->addNew();
        return $result;
    }

    static function addSchool($name, $address, $numberOfStudents) {
        $school = new School($name,$address, $numberOfStudents);
        $result = $school->addNew();
        return $result;
    }

    static function  addStudent($data) {
        $student = new Student($data->first_name,$data->last_name,$data->grade, $data->address, $data->date_of_birth, $data->school, $data->subject);
        $result = $student->addNew();
        return $result;
    }

    static function editStudent($data) {
        $student = Student::getById($data->id);
        $student->first_name = $data->first_name;
        $student->last_name = $data->last_name;
        $student->grade = $data->grade;
        $student->address = $data->address;
        $student->date_of_birth = $data->date_of_birth;
        $student->school = $data->school;
        $student->subject = $data->subject;
        $result = $student->editStudent();
        return $result;
    }

    static function editSchool($id,$name,$address,$numberOfStudents) {
        $school = School::getById($id);
        $school->name  = $name;
        $school->address  = $address;
        $school->numberOfStudents  = $numberOfStudents;
        $result = $school->editSchool();
        return $result;
    }

}

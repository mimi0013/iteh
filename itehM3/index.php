<?php
require 'flight/Flight.php';
require 'controller.php';

Flight::route('GET /', function () {
 try{

  Flight::redirect('/newHome');
 }catch(Exception $e){
  echo $e;
 }
});

//student
Flight::route('DELETE /student/delete/@id', function ($id) {
 Controller::deleteStudent($id);
});

Flight::route('GET /student/last', function () {
 echo json_encode(Controller::getLastStudent());
});

Flight::route('GET /student/get/@id', function ($id) {
 echo json_encode(Controller::getStudentById($id));
});

Flight::route('GET /student/all', function () {
 echo json_encode(Controller::getStudents());
});

Flight::route('POST /student/add', function () {
 echo json_encode(Controller::addStudent(Flight::request()->data));
});

Flight::route('POST /student/edit', function () {
 echo json_encode(Controller::editStudent(Flight::request()->data));
});

//school
Flight::route('DELETE /school/delete/@id', function ($id) {
 Controller::deleteSchool($id);
});

Flight::route('GET /school/last', function () {
 echo json_encode(Controller::getLastSchool());
});

Flight::route('GET /school/all', function () {
 echo json_encode(Controller::getSchools());
});

Flight::route('GET /school/get/@id', function ($id) {
 echo json_encode(Controller::getSchoolById($id));
});

Flight::route('POST /school/add', function () {
 $data = Flight::request()->data;
 echo json_encode(Controller::addSchool($data->name, $data->address, $data->numberOfStudents));
});

Flight::route('PUT /school/edit/@id/@name/@address/@numberOfStudents', function ($id,$name,$address,$numberOfStudents) {
 echo json_encode(Controller::editSchool($id,$name,$address,$numberOfStudents));
});

//subject
Flight::route('DELETE /subject/delete/@id', function ($id) {
 Controller::deleteSubject($id);
});

Flight::route('GET /subject/all', function () {
 echo json_encode(Controller::getSubjects());
});

Flight::route('GET /subject/get/@id', function ($id) {
 echo json_encode(Controller::getSubjectById($id));
});

Flight::route('POST /subject/add', function () {
 echo json_encode(Controller::addSubject(Flight::request()->data->name));
});


Flight::start();
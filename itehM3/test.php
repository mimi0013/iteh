<?php
/**
 * Created by PhpStorm.
 * User: Mimi
 * Date: 2/8/2017
 * Time: 12:54 PM
 */

include 'schoolClass.php';

$array = School::getAll();
echo json_encode($array);
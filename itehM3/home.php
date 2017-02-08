<?php
include ('header.php');
?>

<script src="home.js"></script>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

    <!-- First Photo Grid-->
    <div class="w3-row-padding w3-padding-16 w3-center" id="food">
        <div class="w3-quarter">
            <h4 class="panel-heading">Subjects</h4>
            <div id="subjects"></div>
                <br/>
        </div>
        <div class="w3-quarter">
            <h4 class="panel-heading">Last Added School</h4>
                <div id="lastSchool"></div>
                <br/>
                <input type="button" class="btn btn-sm btn-info" onclick="location.href='school.php'">Schools</inp>
            </p>
        </div>
        <div class="w3-quarter">
            <h4 class="panel-heading">Last Added Student</h4>
                <div id="lastStudent"></div>
                <br/>
                <input type="button" class="btn btn-sm btn-info" onclick="location.href='students.php'">Students</input>
            </p>
        </div>
    </div>

    </div>

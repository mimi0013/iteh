<?php
include_once('header.php');
include_once('studentsClass.php');
include_once('schoolClass.php');
include_once('subjectClass.php')

?>

<script src="students.js"></script>
<div id="container" class="container">
    <div class="well form-horizontal">

        <legend>Students</legend>

        <table class="table table-hover">
            <thead id="students-table">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    First Name
                </th>
                <th>
                    Last Name
                </th>
                <th>
                    Grade
                </th>
                <th>
                    Address
                </th>
                <th>
                    Data Of Birth
                </th>
                <th>
                    School
                </th>
                <th>
                    Subject
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody id="students">
            </tbody>
        </table>
    </div>
</div>

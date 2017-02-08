<?php

include_once('header.php');


?>

<script src="addStudent.js"></script>

<div class="container">
    <form class="well form-horizontal">
        <fieldset>

            <legend>Add new Student</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="first_name" placeholder="First Name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Last Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="last_name" placeholder="Last Name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Grade</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input id="grade" placeholder="Grade" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Address</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-indent-right"></i></span>
                        <input id="address" placeholder="Address" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Date of birth</label>

                <div class="col-md-4 inputGroupContainer">

                    <div class="input-group date" id="date-picker">
                        <span class="input-group-addon"><i
                                class="glyphicon glyphicon-th"></i></span>
                        <input type="text" id="date_of_birth" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">School</label>

                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                        <select id="schools" name="school" class="form-control selectpicker" required>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Subject</label>

                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                        <select id="subjects" name="subject" class="form-control selectpicker" required>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>

                <div class="col-md-4">
                    <input type="button" name="save" onclick="addStudent()" class="btn btn-primary">Send <span class="glyphicon glyphicon-send"></span>

                </div>
            </div>

        </fieldset>
    </form>
</div>

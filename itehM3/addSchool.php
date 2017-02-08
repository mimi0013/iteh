<?php
include_once('header.php');

?>


<div class="container">
    <form class="well form-horizontal" id="contact_form">
        <fieldset>

            <legend>Add new School</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="name" placeholder="Name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Adress</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="address" placeholder="Adress" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">NumberOfStudents</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input id="numberOfStudents" placeholder="NumberOfStudents" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="button"  onclick="addSchool()" class="btn btn-primary" value="Add">

                </div>
            </div>

        </fieldset>
    </form>
</div>

<script src="addSchool.js"></script>
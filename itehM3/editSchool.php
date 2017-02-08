<?php
include_once('header.php');

?>

<script src=editSchool.js></script>

<div class="container">
    <form class="well form-horizontal" action="editSchool.php" method="post" id="contact_form">
        <fieldset>

            <legend>Edit School</legend>
            <input name="id" placeholder="id" id="id" value="<?php echo $_GET['id'] ?>" class="form-control" type="hidden">

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="id" id="name" placeholder="Name"  class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Address</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="address" id="address" placeholder="Address"  class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">NumberOfStudents</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input name="numberOfStudents" id="numberOfStudents" placeholder="NumberOfStudents" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="button" id="update" onclick="updateSchool()"name="update" class="btn btn-primary">Update <span class="glyphicon glyphicon-send"></span>
                </div>
            </div>

        </fieldset>
    </form>
    <input type="button" class="btn btn-warning" onclick="goToSchools()"><span class="glyphicon glyphicon-arrow-left"></span>
</div>

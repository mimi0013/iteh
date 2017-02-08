<?php

include_once('header.php');

?>

<script src="addSubject.js"></script>

<div class="container">
    <form class="well form-horizontal">
        <fieldset>

            <legend>Add Subject</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Subject Name</label>

                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="name" placeholder="Subject Name" class="form-control" type="text" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>

                <div class="col-md-4">
                    <input type="button" name="save" onclick="addSubject()" class="btn btn-primary">Add <span
                            class="glyphicon glyphicon-plus"></span>

                </div>
            </div>

        </fieldset>
    </form>
</div>

<div class="container">
    <div class="well form-horizontal">

        <legend>Subject</legend>

        <table class="table table-hover positions-table">
            <thead id="subjects-table" >
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody id="subjects">
            </tbody>
        </table>
    </div>
</div>

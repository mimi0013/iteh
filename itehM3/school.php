<?php

include_once('header.php');
?>



<div id ='container' class="container">
    <div class="well form-horizontal">

        <legend>Schools</legend>

        <table class="table table-hover">
            <thead id="schools-table">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Address
                </th>
                <th>
                    NumberOfStudents
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody id="schools">
            </tbody>
        </table>
    </div>
</div>
<div id="edit-school">

</div>

<script src="school.js"></script>
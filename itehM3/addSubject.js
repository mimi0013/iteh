$(document).ready(function () {
    getSubjects();
    $("#subjects-table").tablesorter();

});


function getSubjects() {
    $.ajax({
        type: "GET",
        url: 'subject/all',
        dataType: 'json',
        success: function (response) {
            if(response == null) {
                $('#subjects').append('Currently, there are no subjects.');
                $('#subjects-table').hide();
            }
            else {
                var subjects = response;
                for(var i = 0; i < subjects.length; i++) {
                    $('#subjects').append("<tr><td id='id'>" + subjects[i].id + "</td><td>" + subjects[i].name + "</td><td><input type='button' id='delete-button' onclick='deleteSubject("+ subjects[i].id + ")' class='btn btn-sm btn-danger'>Delete</td></tr>");
                }
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function addSubject() {
    var name = $('#name').val();
    $.ajax({
        type: "POST",
        url: 'subject/add',
        data: {
            name: name
        },
        success: function () {
            location.reload();
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function deleteSubject(id) {
    $.ajax({
        type: "DELETE",
        dataType: "json",
        url: 'subject/delete/' + id ,
        success: function (response) {
            location.reload();
        },
        error: function (error) {
            alert("Error deleting subject: " + error.status);
        }
    });
}
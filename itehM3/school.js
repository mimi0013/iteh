
function deleteSchool(id) {
    $.ajax({
        type: "DELETE",
        url: 'school/delete/' + id ,
        success: function (response) {
            location.reload();
        },
        error: function (error) {
            alert("Error deleting schools: " + error.status);
        }
    });
}

function getSchools() {
    console.log("metodaaa");
    $.ajax({
        type: "GET",
        url: 'school/all',
        dataType: 'json',
        contentType: "application/json",
        success: function (response) {
            if(response == null || response.length == 0) {

                $('#schools').append('<h2><strong>Currently, there are no schools.</strong></h2>');
                $('#schools-table').hide();
            }
            else {
                var schools = response;
                alert('radi dovde');
                console.log(schools);
                for(var i = 0; i < schools.length; i++) {
                    $('#schools').append("<tr><td>" + schools[i].id + "</td><td>" + schools[i].name + "</td><td>" + schools[i].address + "</td><td>" + schools[i].numberOfStudents + "</td><td><input type='button' id='edit-button' name='edit-button' onclick='editSchool(" + schools[i].id + ")' class='btn btn-primary btn-sm'>Edit<input type='button' id='delete-button' onclick='deleteSchool(" + schools[i].id +")' class='btn btn-danger btn-sm'>Delete</td>");
                }
            }


        },
        error: function (error) {
            console.log(error);        }
    });
}


function editSchool(id) {
    window.location.href = 'editSchool.php?id=' + id;
}

$(document).ready(function () {
    getSchools();

    $("#schools-table").tablesorter();

});
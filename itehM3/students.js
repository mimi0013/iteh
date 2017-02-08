$(document).ready(function () {
    getStudents();
    $("#students-table").tablesorter();

});


function editStudent(id) {
    window.location.href = 'editStudent.php?id=' + id;

}
function deleteStudent(id) {
    $.ajax({
        type: "DELETE",
        url: 'student/delete/' + id,
        success: function (response) {
            location.reload();
        },
        error: function (error) {
            alert("Error deleting student: " + error.status);
        }
    });
}

function getStudents() {
    $.ajax({
        type: "GET",
        url: 'student/all',
        dataType: 'json',
        success: function (response) {
            if(response == null || response.length == 0) {
                $('#students').append('<h2><strong>Currently, there are no students.</strong></h2>');
                $('#students-table').hide();
            }
            else {
                var students = response;
                for(var i = 0; i < students.length; i++) {
                    $('#students').append("<tr><td>" + students[i].id + "</td><td>" + students[i].first_name + "</td><td>" + students[i].last_name + "</td><td>" + students[i].grade + "</td><td>" + students[i].address + "</td><td>"+ students[i].date_of_birth + "</td><td><input type='button' id='edit-button' name='edit-button' onclick='editStudent(" + students[i].id + ")' class='btn btn-primary btn-sm'>Edit<input type='button' id='delete-button' onclick='deleteStudent(" + students[i].id +")' class='btn btn-danger btn-sm'>Delete</td>");
                }
            }


        },
        error: function (error) {
            alert("Error: " + error);
        }
    });
}

function goToSchools() {
    window.location = 'http://localhost/itehM3/school.php';
}


function getSubject(id) {
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: 'subject/' + id,
        success: function (response) {
            $('#studentSubject').append(response.name);
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getSchool(id) {
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: 'school/' + id,
        success: function (response) {
            $('#studentSchool').append(response.name);
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

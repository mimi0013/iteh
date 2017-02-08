$(document).ready(function () {
    getSchools();
    getSubjects();

    $('#date-picker input').datepicker({
        todayBtn: "linked",
        language: "en-GB",
        orientation: "bottom auto"
    })
});

function addStudent() {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var grade = $('#grade').val();
    var address = $('#address').val();
    var date_of_birth = $('#date_of_birth').val();
    var school = $('#schools').val();
    var subject = $('#subjects').val();

    $.ajax({
        type: "POST",
        url: 'student/add',
        data: {
            first_name: first_name,
            last_name: last_name,
            grade: grade,
            address: address,
            date_of_birth: date_of_birth,
            school: parseInt(school),
            subject: parseInt(subject)
        },
        success: function (response) {
            window.location.href = 'students.php';
        },
        error: function (error) {
            alert("Error: " + json_encode(error));
        }
    });
}


function getSchools() {
    $.ajax({
        type: "GET",
        url: 'school/all',
        dataType: 'json',
        success: function (response) {
            if(response == null || response.length == 0) {
                $('#schools').append('<option value=""> There are no schools available.</option>');
            }
            else {
                var schools = response;
                $('#schools').append('<option value=" ">Select school</option>');
                for(var i = 0; i < schools.length; i++) {
                    $('#schools').append("<option value=" + schools[i].id + ">" + schools[i].name + "</option>");
                }
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getSubjects() {
    $.ajax({
        type: "GET",
        url: 'subject/all',
        dataType: 'json',
        success: function (response) {
            if(response == null || response.length == 0) {
                $('#subjects').append('<option value=""> There are no subjects available.</option>');
            }
            else {
                var subjects = response;
                $('#subjects').append('<option value=" ">Select subject</option>');
                for(var i = 0; i < subjects.length; i++) {
                    $('#subjects').append("<option value=" + subjects[i].id + ">" + subjects[i].name + "</option>");
                }
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

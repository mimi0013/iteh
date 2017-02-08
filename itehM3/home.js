$(document).ready(function () {
    getLastStudent();
    getLastSchool();
    getSubjects();
});

function getLastStudent() {
    $.ajax({
        type: "GET",
        url: 'student/last',
        success: function (response) {
            if(response == null || response == "null") {
                $('#lastStudent').append('Currently, there are no students.');
            }else {
                var student = JSON.parse(response);
                var subject = getSubject(student.subject);
                var school = getSchool(student.school);
                $('#lastStudent').append(
                    "First Name: <strong>" + student.first_name
                    + "</strong><br/>Last Name: <strong>" + student.last_name
                    + "</strong><br/>Grade: <strong>" + student.grade
                    + "</strong><br/>Address: <strong>" + student.address
                    + "</strong><br/>Date Of Birth: <strong>" + student.date_of_birth
                    + "</strong><br/>School: <strong>" + "<span id='lastStudentSchool'></span>"
                    + "</strong><br/>Subject: <strong>" + "<span id='lastStudentSubject'></span>" +  "</strong>"
                );
            }

        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getLastSchool() {
    $.ajax({
        type: "GET",
        url: 'school/last',
        dataType: 'json',
        success: function (response) {
            if(response == null) {
                $('#lastSchool').append('Currently, there are no schools.');
            }else {
                var school = response;
                $('#lastSchool').append(
                    "Name: <strong>" + school.name
                    + "</strong><br/>Address: <strong>" + school.address
                    + "</strong><br/>Number Of Students: <strong>" + school.numberOfStudents + "</strong>"
                );
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getSubject(id) {
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: 'subject/get/' + id,
        success: function (response) {
            $('#lastStudentSubject').append(response.name);
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
        url: 'school/get/' + id,
        success: function (response) {
            $('#lastStudentSchool').append(response.name);
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
            if(response == null) {
                $('#subjects').append('Currently, there are no subjects.');
            }
            else {
                var subjects = response;
                for(var i = 0; i < subjects.length; i++) {
                    $('#subjects').append("<strong>" +   subjects[i].id + "</strong>  <strong>" + subjects[i].name + "</strong><br/>");
                }
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

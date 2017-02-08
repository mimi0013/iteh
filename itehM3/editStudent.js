$(document).ready(function () {
    getStudent($('#id').val());
    getSchools();
    getSubjects();
});

function getStudent(id) {
    $.ajax({
        type: "GET",
        url: 'student/get/' + id,
        dataType: 'json',
        success: function (response) {
            var student = response;
            getSchool(student.school);
            getSubject(student.subject);
            $('#first_name').val(student.first_name);
            $('#last_name').val(student.last_name);
            $('#grade').val(student.grade);
            $('#address').val(student.address);
            $('#date_of_birth').val(student.date_of_birth);

        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getSchool(id) {
    $.ajax({
        type: "GET",
        url: 'school/get/' + parseInt(id),
        dataType: 'json',
        success: function (response) {
            $('#schools').append("<option selected value='" + id + "'>"+ response.name +"</option>");
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getSubject(id) {
    $.ajax({
        type: "GET",
        url: 'subject/get/' + parseInt(id),
        dataType: 'json',
        success: function (response) {
            $('#subjects').append("<option selected value='" + id + "'>"+ response.name +"</option>");
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function getSchools() {
    $.ajax({
        type: "GET",
        url: 'school/all',
        dataType: 'json',
        success: function (response) {
            var schools = response;
            for(var i = 0; i < schools.length; i++) {
                $('#schools').append("<option value=" + schools[i].id + ">" + schools[i].name + "</option>");
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

            var subjects = response;
            for(var i = 0; i < subjects.length; i++) {
                $('#subjects').append("<option value=" + subjects[i].id + ">" + subjects[i].name + "</option>");
            }
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}
function goToStudents() {
    window.location = 'students.php';
}
function updateStudent() {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var grade = $('#grade').val();
    var address = $('#address').val();
    var date_of_birth = $('#date_of_birth').val();
    var school = $('#school').val();
    var subject = $('#subject').val();
    var id = $('#id').val();

    $.ajax({
        type: "POST",
        url: 'student/edit',
        dataType: 'json',
        data: {
            id: id,
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
            alert("Error: " + error);
        }
    });
}
$(document).ready(function () {
    getSchool($('#id').val());
});


function getSchool(id) {
    $.ajax({
        type: "GET",
        url: 'school/get/' + id ,
        dataType: 'json',
        success: function (response) {
            var school = response;
            $('id').val(school.id);
            $('#name').val(school.name);
            $('#address').val(school.address);
            $('#numberOfStudents').val(school.numberOfStudents);
        },
        error: function (error) {
            alert("Error: " + error.status);
        }
    });
}

function updateSchool() {
    var id = $('#id').val();
    var name = $('#name').val();
    var address = $('#address').val();
    var numberOfStudents = $('#numberOfStudents').val();

    $.ajax({
        type: "PUT",
        url: 'school/edit/' + id + '/' + name + '/' + address + '/' + numberOfStudents ,
        dataType: 'json',
        success: function () {
            goToSchools();
        },
        error: function (error) {
            alert("Error: " + JSON.parse(error));
        }
    });
}


function goToSchools() {
    window.location = 'school.php';
}
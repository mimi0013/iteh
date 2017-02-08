function addSchool() {
    var name = $('#name').val();
    var address = $('#address').val();
    var numberOfStudents = $('#numberOfStudents').val();

    $.ajax({
        type: "POST",
        url: 'school/add',
        data: {
            name: name,
            address: address,
            numberOfStudents: numberOfStudents,
        },
        success: function (response) {
            window.location.href = 'school.php';
        },
        error: function (error) {
            alert("Error: " + error);
        }
    });
}
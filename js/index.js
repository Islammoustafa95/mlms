$(document).ready(function () {
    $('.loginForm').submit(function (event) {
        event.preventDefault();
        var myFormData = new FormData();
        $.each($(this).serializeArray(), function (i, field) {
            myFormData.append(field.name, field.value);
        });
        $.ajax({
                url: 'php/action_login.php',
                type: 'POST',
                processData: false, // important
                contentType: false, // important
                dataType: 'json',
                data: myFormData,
            })
            .done(function (response) {
                switch (response.result) {
                    case 200:
                        Swal.fire({
                            icon: 'success',
                            title: 'Congratulations!',
                            text: 'Logged In Successfully!',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            window.location = "dashboard.php";
                        });
                        break;
                    case 1:
                        $("#username").removeClass('good');
                        $("#username").addClass('bad');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.msg
                        });
                        break;
                    case 2:
                        $("#username").removeClass('bad');
                        $("#username").addClass('good');
                        $("#password").removeClass('good');
                        $("#password").addClass('bad');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.msg
                        });
                        break;
                    default:
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.msg
                        });
                        break;
                }
            })
            .fail(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                });
            });
    });
    $("#username").keydown(function () {
        $(this).removeClass('good');
        $(this).removeClass('bad');
    });
    $("#password").keydown(function () {
        $(this).removeClass('good');
        $(this).removeClass('bad');
    });
});

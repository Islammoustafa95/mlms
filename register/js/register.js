$(document).ready(function () {
    $('.registerForm').submit(function (event) {
        event.preventDefault();
        var myFormData = new FormData();
        $.each($(this).serializeArray(), function (i, field) {
            myFormData.append(field.name, field.value);
        });
        $.ajax({
                url: 'php/action_register.php',
                type: 'POST',
                processData: false, // important
                contentType: false, // important
                dataType: 'json',
                data: myFormData,
            })
            .done(function (response) {
                if (response.result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Congratulations!',
                        text: 'You have successfully created an account!',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function () {
                        window.location = "../";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.msg
                    });
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
    $('#name').keyup(function () {
        if ($(this).val()) {
            $(this).removeClass('bad');
            $(this).addClass('good');
        } else {
            $(this).removeClass('good');
            $(this).addClass('bad');
        }
    });
    $('#username').keyup(function () {
        let el = $(this);
        if (el.val().length >= 3) {
            var myFormData = new FormData();
            myFormData.append('username', el.val());
            $.ajax({
                    url: '../php/check_username_availability.php',
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    dataType: 'json',
                    data: myFormData,
                })
                .done(function (response) {
                    if (response.result == 1) {
                        el.removeClass('bad');
                        el.addClass('good');
                    } else {
                        el.removeClass('good');
                        el.addClass('bad');
                    }
                })
                .fail(function () {
                    el.removeClass('good');
                    el.addClass('bad');
                });
        } else {
            el.removeClass('good');
            el.addClass('bad');
        }
    });
    $('#password').keyup(function () {
        if ($(this).val().length >= 4) {
            $(this).removeClass('bad');
            $(this).addClass('good');
        } else {
            $(this).removeClass('good');
            $(this).addClass('bad');
        }
    });
    $('#rPassword').keyup(function () {
        if ($(this).val().length >= 4 && $(this).val() == $('#password').val()) {
            $(this).removeClass('bad');
            $(this).addClass('good');
        } else {
            $(this).removeClass('good');
            $(this).addClass('bad');
        }
    });
    $('#upline').keyup(function () {
        let el = $(this);
        if (el.val().length >= 3) {
            var myFormData = new FormData();
            myFormData.append('username', el.val());
            $.ajax({
                    url: '../php/check_username_availability.php',
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    dataType: 'json',
                    data: myFormData,
                })
                .done(function (response) {
                    if (response.result == 1) {
                        el.removeClass('good');
                        el.addClass('bad');
                    } else {
                        el.removeClass('bad');
                        el.addClass('good');
                    }
                })
                .fail(function () {
                    el.removeClass('good');
                    el.addClass('bad');
                });
        } else {
            el.removeClass('good');
            el.addClass('bad');
        }
    });
});

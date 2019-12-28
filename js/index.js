$(document).ready(function(){
	$('a[href^="#register"]').click(function() {
		$('#login').fadeOut('fast',function(){
			$.each($('#register input'),function(index, el) {
				$(el).val('');
			});
			$('#register').fadeIn('fast');
		});
	});
	$('a[href^="#login"]').click(function() {
		$('#register').fadeOut('fast',function(){
			$.each($('#login input'),function(index, el) {
				$(el).val('');
			});
			$('#login').fadeIn('fast');
		});
	});

	$('#login').submit(function(event) {
		event.preventDefault();
		var myFormData = new FormData();
		$.each($(this).serializeArray(), function(i, field) {
		    myFormData.append(field.name,field.value);
		});
		$.ajax({
			url: 'php/action_login.php',
			type: 'POST',
			processData: false, // important
			contentType: false, // important
			dataType: 'json',
			data: myFormData,
		})
		.done(function(response) {
			if(response.result == 1){
				window.location.href = "choose.php?loggedIn";
			}else{
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: response.msg
				});
			}
		})
		.fail(function() {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Something went wrong!'
			});
		});
	});

	$('#register').submit(function(event) {
		event.preventDefault();
		var myFormData = new FormData();
		$.each($(this).serializeArray(), function(i, field) {
		    myFormData.append(field.name,field.value);
		});
		$.ajax({
			url: 'php/action_register.php',
			type: 'POST',
			processData: false, // important
			contentType: false, // important
			dataType: 'json',
			data: myFormData,
		})
		.done(function(response) {
			if(response.result == 1){
				Swal.fire({
					icon: 'success',
					title: 'Congratulations!',
					text: 'You have successfully created an account!'
				});
				$('#register').fadeOut('fast',function(){
					$.each($('#login input'),function(index, el) {
						$(el).val('');
					});
					$('#login').fadeIn('fast');
				});
			}else{
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: response.msg
				});
			}
		})
		.fail(function() {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Something went wrong!'
			});
		});
	});
});
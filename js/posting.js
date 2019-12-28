$(document).ready(function(){
	$('#createJobForm').submit(function(event) {
		event.preventDefault();
		var myFormData = new FormData();
		$.each($(this).serializeArray(), function(i, field) {
		    myFormData.append(field.name,field.value);
		});
		$.ajax({
			url: 'php/action_post.php',
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
					text: 'The job has been posted!'
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
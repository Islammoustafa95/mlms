<?php
	$response = array();
	$response['result'] = 0;
	require_once('db.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$req_params = array('name','email','password','r_password');
		$is_params_valid = true;
		foreach($req_params as $value){
			if(!isset($_POST[$value])) {
				$is_params_valid = false;
				$response["msg"] = "invalid params";
			}
		}
		if($is_params_valid){
			$name = mysqli_real_escape_string($db,$_POST['name']);
			$email = mysqli_real_escape_string($db,$_POST['email']);
			$password = mysqli_real_escape_string($db,$_POST['password']);
			$r_password = mysqli_real_escape_string($db,$_POST['r_password']);
			if($password == $r_password){
				$query = "INSERT INTO users (name,email,password) VALUES('$name','$email',PASSWORD('$password'))";
				$result = mysqli_query($db,$query);
				if(mysqli_affected_rows($db) == 1){
					$response['result'] = 1;
				}else{
					$response['msg'] = 'E-mail already exists in our server';
				}
			}else{
				$response["msg"] = "Passwords did not match";
			}
		}
	}else{
		$response['msg'] = 'Invalid Request';
	}
	die(json_encode($response));
?>
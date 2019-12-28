<?php
	$response = array();
	$response['result'] = 0;
	require_once('db.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$req_params = array('email','password');
		$is_params_valid = true;
		foreach($req_params as $value){
			if(!isset($_POST[$value])) {
				$is_params_valid = false;
				$response["msg"] = "invalid params";
			}
		}
		if($is_params_valid){
			$email = mysqli_real_escape_string($db,$_POST['email']);
			$password = mysqli_real_escape_string($db,$_POST['password']);
			$query = "SELECT id FROM users WHERE email = '$email' AND password = PASSWORD('$password')";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) == 1){
				$response['result'] = 1;
				$user = mysqli_fetch_assoc($result);
				setcookie('user',$user["id"],time() + (86400 * 30),"/");
			}else{
				$response['msg'] = 'Invalid Username or Password';
			}
		}
	}else{
		$response['msg'] = 'Invalid Request';
	}
	die(json_encode($response));
?>
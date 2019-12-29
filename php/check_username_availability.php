<?php
	$response = array();
	$response['result'] = 0;
	require_once('db.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$req_params = array('username');
		$is_params_valid = true;
		foreach($req_params as $value){
			if(!isset($_POST[$value])) {
				$is_params_valid = false;
				$response["msg"] = "invalid params";
			}
		}
		if($is_params_valid){
			$username = mysqli_real_escape_string($db,$_POST['username']);
			$query = "SELECT id FROM users WHERE username = '$username'";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) == 0){
				$response['result'] = 1;
			}else{
				$response['msg'] = 'Username is already taken.';
			}
		}
	}else{
		$response['msg'] = 'Invalid Request';
	}
	die(json_encode($response));
?>
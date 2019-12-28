<?php
	$response = array();
	$response['result'] = 0;
	require_once('db.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$req_params = array('title','company_name','description','location');
		$is_params_valid = true;
		if(!isset($_COOKIE['user'])) {
			$is_params_valid = false;
			$response["msg"] = "Login first before creating a post.";
		}
		foreach($req_params as $value){
			if(!isset($_POST[$value])) {
				$is_params_valid = false;
				$response["msg"] = "invalid params";
			}
		}
		if($is_params_valid){
			$title = mysqli_real_escape_string($db,$_POST['title']);
			$company_name = mysqli_real_escape_string($db,$_POST['company_name']);
			$description = mysqli_real_escape_string($db,$_POST['description']);
			$location = mysqli_real_escape_string($db,$_POST['location']);
			$employer = mysqli_real_escape_string($db,$_COOKIE['user']);
			$query = "INSERT INTO jobs (employer,title,company_name,description,location)
						VALUES('$employer','$title','$company_name','$description','$location')";
			$result = mysqli_query($db,$query);
			if(mysqli_affected_rows($db) == 1){
				$response['result'] = 1;
			}else{
				$response['msg'] = 'Something went wrong';
			}
		}
	}else{
		$response['msg'] = 'Invalid Request';
	}
	die(json_encode($response));
?>
<?php
	$response = array();
	$response['result'] = 0;
    require_once($_SERVER['DOCUMENT_ROOT'].'/mlms/php/db.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$req_params = array('name','username','password','rPassword','upline');
		$is_params_valid = true;
		foreach($req_params as $value){
			if(!isset($_POST[$value])) {
				$is_params_valid = false;
				$response["msg"] = "Data fields are incomplete.";
			}
		}
		if($is_params_valid){
			$name = mysqli_real_escape_string($db,$_POST['name']);
			$username = mysqli_real_escape_string($db,$_POST['username']);
			$password = mysqli_real_escape_string($db,$_POST['password']);
			$rPassword = mysqli_real_escape_string($db,$_POST['rPassword']);
			$upline = mysqli_real_escape_string($db,$_POST['upline']);
			if($password == $rPassword){
                $query = "SELECT id FROM users WHERE username = '$username'";
                $result = mysqli_query($db,$query);
                if(mysqli_num_rows($result)>0){
				    $response["msg"] = "Username already exists in our server.";
                }else{
                    $query = "SELECT id FROM users WHERE username = '$upline'";
                    $result = mysqli_query($db,$query);
                    if(mysqli_num_rows($result)==1){
                        $uplineID = mysqli_fetch_assoc($result)["id"];
                        $query = "INSERT INTO users (name,username,password,upline) VALUES('$name','$username',PASSWORD('$password'),'$uplineID')";
                        $result = mysqli_query($db,$query);
                        if(mysqli_affected_rows($db) == 1){
                            $response['result'] = 1;
                        }else{
                            $response['msg'] = mysqli_error($db);
                        }
                    }else{
				        $response["msg"] = "Upline doesn't exist.";
                    }
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

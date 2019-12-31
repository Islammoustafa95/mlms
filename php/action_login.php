<?php
	$response = array();
	$response['result'] = 0;
	require_once('db.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$req_params = array('username','password');
		$is_params_valid = true;
		foreach($req_params as $value){
			if(!isset($_POST[$value])) {
				$is_params_valid = false;
				$response["msg"] = "invalid params";
			}
		}
		if($is_params_valid){
			$username = mysqli_real_escape_string($db,$_POST['username']);
			$password = mysqli_real_escape_string($db,$_POST['password']);
            $remember = "false";
            if(isset($_POST["remember"])) $remember = $_POST["remember"];
            
			$query = "SELECT id FROM users WHERE username = '$username'";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) == 1){
                $query = "SELECT id FROM users WHERE username = '$username' AND password = PASSWORD('$password')";
                $result = mysqli_query($db,$query);
                if(mysqli_num_rows($result) == 1){
                    $response['result'] = 200;
                    $duid = uniqid();
                    if($remember == "true"){
                        $id = mysqli_fetch_assoc($result)["id"];
                        setcookie('duid',$duid,time() + (86400 * 30),"/");
                        $query = "UPDATE users SET device_id = '$duid' WHERE id = '$id'";
                        mysqli_query($db,$query);
                    }else{
                        session_start();
                        $_SESSION["duid"] = $duid;
                        $id = mysqli_fetch_assoc($result)["id"];
                        $query = "UPDATE users SET device_id = '$duid' WHERE id = '$id'";
                        mysqli_query($db,$query);
                    }
                }else{
                    $response['result'] = 2;
                    $response['msg'] = 'Password is Incorrect';
                }
			}else{
                $response['result'] = 1;
				$response['msg'] = "Username doesn't exist in the server.";
			}
		}
	}else{
		$response['msg'] = 'Invalid Request';
	}
	die(json_encode($response));
?>

<?php
    session_start();
	$response = array();
	$response['result'] = 0;
	require_once('db.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_COOKIE['duid']) || isset($_SESSION['duid'])){
            if(isset($_COOKIE['duid'])){
			 $duid = mysqli_real_escape_string($db,$_COOKIE['duid']);
            }else{
			 $duid = mysqli_real_escape_string($db,$_SESSION['duid']);
            }
			$query = "SELECT 
                    user_theme.primaryColor,
                    user_theme.secondaryColor,
                    user_theme.backgroundColor,
                    user_theme.textColor
                    FROM users
                    INNER JOIN user_theme ON users.id = user_theme.user_id
                    WHERE users.device_id = '$duid'";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) == 1){
                $response['result'] = 1;
                $themeData = mysqli_fetch_assoc($result);
                $response['themeData'] = $themeData;
                setcookie('themeData',json_encode($themeData),time() + (86400 * 30),"/");
			}else{
				$response['msg'] = "Theme doesn't exist.";
			}
		}else{
		  $response['msg'] = 'Please log in first.';
        }
	}else{
		$response['msg'] = 'Invalid Request';
	}
	die(json_encode($response));
?>

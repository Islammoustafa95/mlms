<?php
    session_start();
	$response = array();
	$response['result'] = 0;
	require_once('db.php');
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$req_params = array('primaryColor','secondaryColor','backgroundColor','textColor');
		$is_params_valid = true;
        $is_empty = true;
		foreach($req_params as $value){
			if(!isset($_POST[$value])) {
				$is_params_valid = false;
				$response["msg"] = "invalid params";
			}
            if(isset($_POST[$value]) && trim($_POST[$value]) != ""){
                $is_empty = false;
            }
		}
		if($is_params_valid && !$is_empty){
            if(isset($_COOKIE['duid']) || isset($_SESSION['duid'])){
                if(isset($_COOKIE['duid'])){
                 $duid = mysqli_real_escape_string($db,$_COOKIE['duid']);
                }else{
                 $duid = mysqli_real_escape_string($db,$_SESSION['duid']);
                }
                $query = "SELECT id
                        FROM users
                        WHERE device_id = '$duid'";
                $result = mysqli_query($db,$query);
                if(mysqli_num_rows($result) == 1){
                    $user_id = mysqli_fetch_assoc($result)["id"];
                    $updateQuery = " ON DUPLICATE KEY UPDATE ";
                    $user_theme = "";
                    $values = "";
                    $first = true;
                    foreach($req_params as $value){
                        if(trim($_POST[$value]) != "") {
                            if($first){
                                $updateQuery .= "$value = '" . $_POST[$value] . "'";
                                $first = false;
                            }else{
                                $updateQuery .= ", $value = '" . $_POST[$value] . "'";
                            }
                            $user_theme .= ",$value";
                            $values .= ",'".$_POST[$value]."'";
                        }
                    }
                    $query = "INSERT INTO user_theme(user_id" . $user_theme . ") VALUES('$user_id'" . $values . ")";
                    $query .= $updateQuery;
                    $result = mysqli_query($db,$query);
                    if(mysqli_affected_rows($db) > 0){
                        $response["result"] = 1;
                        $response["msg"] = "Theme updated successfully.";
                    }else{
                        if(mysqli_error($db)!=null){
                            $response["msg"] = mysqli_error($db);
                            $response["quqery"] = $query;
                        }else{
                            $response["msg"] = "No changes has been saved.";
                        }
                    }
                }else{
                    $response['msg'] = "Please Logout and Login again.";
                }
            }else{
              $response['msg'] = 'Please log in first.';
            }
		}else{
            if($is_empty){
                $response["msg"] = "Please set at least 1 value";
            }else{
		      $response['msg'] = 'Invalid Params';
            }
        }
	}else{
		$response['msg'] = 'Invalid Request';
	}
	die(json_encode($response));
?>

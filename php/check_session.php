<?php
    session_start();
	if(isset($_COOKIE['duid'])){
		require_once('php/db.php');
		$duid = $_COOKIE['duid'];
		$query = "SELECT id FROM users WHERE device_id = '$duid'";
		$result = mysqli_query($db,$query);
		if(mysqli_num_rows($result) == 1){
            $duid = uniqid();
            $id = mysqli_fetch_assoc($result)["id"];
            setcookie('duid',$duid,time() + (86400 * 30),"/");
            $query = "UPDATE users SET device_id = '$duid' WHERE id = '$id'";
            mysqli_query($db,$query);
			header("location: dashboard.php");
		}
	}else if(isset($_SESSION['duid'])){
        require_once('php/db.php');
        $duid = $_SESSION['duid'];
        $query = "SELECT id FROM users WHERE device_id = '$duid'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result) == 1){
            header("location: dashboard.php");
        }
    }
?>

<?php
	if(isset($_COOKIE['duid'])){
		require_once('php/db.php');
		$duid = $_COOKIE['duid'];
		$query = "UPDATE users SET device_id = '' WHERE device_id = '$duid'";
		$result = mysqli_query($db,$query);
        setcookie('duid','',time() - 3600,"/");
	}
    session_start();
    session_destroy();
    header("location: index.php");
?>

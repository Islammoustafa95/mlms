<?php 
    require_once('php/check_session.php');
    if($isSessionActive){
        header("location: dashboard");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>MLMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include_once("login.php") ?>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/sweetalert2/sweetalert.min.js"></script>
    <script src="index.js"></script>
</body>

</html>

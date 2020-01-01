<?php 
    require_once('../php/check_session.php');
    if(!$isSessionActive){
        header("location: ../");
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>MLMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="d-flex">
        <div class="nav">
            <?php include_once("../components/nav.php") ?>
        </div>
        <div class="main">
            <h2>Dashboard</h2>
            <?php include_once("components/referrals.php") ?>
        </div>
    </div>
    <script src="../lib/jquery/jquery.min.js"></script>
</body>

</html>

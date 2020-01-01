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
            <h2>Settings</h2>
            <div class="settingsBlk">
                <form class="themeForm" method="POST">
                    <div class="primaryColorBlk">
                        <label for="primaryColor">Primary Color</label>
                        <input type="text" class="form-control" id="primaryColor" name="primaryColor" placeholder="red,white, RGBA(255,0,0,1)">
                    </div>
                    <div class="secondaryColorBlk">
                        <label for="secondaryColor">Secondary Color</label>
                        <input type="text" class="form-control" id="secondaryColor" name="secondaryColor" placeholder="red,white, RGBA(255,0,0,1)">
                    </div>
                    <div class="backgroundColorBlk">
                        <label for="backgroundColor">Background Color</label>
                        <input type="text" class="form-control" id="backgroundColor" name="backgroundColor" placeholder="red,white, RGBA(255,0,0,1)">
                    </div>
                    <div class="textColorBlk">
                        <label for="textColor">Text Color</label>
                        <input type="text" class="form-control" id="textColor" name="textColor" placeholder="red,white, RGBA(255,0,0,1)">
                    </div>
                    <button class="btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/sweetalert2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            if (themeData != null) {
                $("#primaryColor").val(themeData.primaryColor);
                $("#secondaryColor").val(themeData.secondaryColor);
                $("#backgroundColor").val(themeData.backgroundColor);
                $("#textColor").val(themeData.textColor);
            }


            $(".themeForm").submit(function(event) {
                event.preventDefault();
                var myFormData = new FormData();
                $.each($(this).serializeArray(), function(i, field) {
                    myFormData.append(field.name, field.value);
                });
                $.ajax({
                    url: 'php/action_update_theme.php',
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    dataType: 'json',
                    data: myFormData,
                }).done(function(response) {
                    console.log(response);
                    if (response.result == 1) {
                        updateTheme();
                        Swal.fire({
                            icon: 'success',
                            title: 'Nice!',
                            text: 'Theme is updated Successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        if (response.msg == "No changes has been saved.") {
                            Swal.fire({
                                icon: 'info',
                                title: 'Notice',
                                text: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                });
            });
        });

    </script>
</body>

</html>

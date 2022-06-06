<?php
    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        if (($_POST['username'] == "admin") && ($_POST['password'] == 12345))
        {
            $_SESSION["admin_access"] = 1;
            header("location: admin_access.php");
        }
        else if(($_POST['username'] != "admin") || ($_POST['password'] != 12345))
        {
            echo'<br><br><br><br><center><img src="AdminLoginWrong.png"><br><br>
            <a href="mode.php">
                <img src="ReturnButton.png">
            ';
        }
    }   

?>

<!DOCTYPE html>
<html>
<head>
  <title>Computer Engineering Contact Tracing</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

</body>
</html>
<?php

    if (($_POST['username'] == "admin") && ($_POST['password'] == 12345))
    {
        header("location: admin_access.php");
    }
    else if(($_POST['username'] != "admin") && ($_POST['password'] != 12345))
    {
        echo "Either the password or username is wrong. Please try again.";
    }
    else if ($_POST['username'] != "admin")
    {
        echo "Either the password or username is wrong. Please try again.";
    }
    else if ($_POST['password'] != "12345")
    {
        echo "Either the password or username is wrong. Please try again.";
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
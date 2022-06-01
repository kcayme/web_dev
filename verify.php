<?php
    // verifies id number input if it is registered
    include('server.php');
    unset($_SERVER["type"]);
    if (isset($_POST['s_submit'])) {  
        $IDnum = mysqli_real_escape_string($db, $_POST['id']);
        $_SESSION["id"] = $IDnum;
        $_SERVER["type"] = "Student";
        // check if input id number is registered in database
        $idnum_check_query = "SELECT * FROM students WHERE id_number='$IDnum' LIMIT 1";
        $result = mysqli_query($db, $idnum_check_query);
        $match = mysqli_fetch_assoc($result);

        if ($match) { // if id number exists or has an id number match
            if ($match['id_number'] === $IDnum) {
                echo "VALID ID";
                $name = $match['name'];
                $province = $match['province'];
                $citytown = $match['citytown'];
                $barangay = $match['barangay'];
                $contact = $match['number'];
                $email = $match['email'];
                $prev_timein = $match['time_in'];
                echo "<p>
                <b>Student ID: </b>$IDnum<br>
                <b>Name: </b>$name<br>
                <b>Province: </b>$province<br>
                <b>City or Town: </b>$province<br>
                <b>Barangay: </b>$barangay<br>
                <b>Contact: </b>$contact<br>
                <b>Email: </b>$email<br>
                <b>Previous Time In: </b>$prev_timein<br>
                </p>";
            }
        }
    }
    else if (isset($_POST['f_submit'])) {
        $IDnum = mysqli_real_escape_string($db, $_POST['id']);
        $_SESSION["id"] = $IDnum;
        $_SERVER["type"] = "Faculty/Staff";
        // check if input id number is registered in database
        $idnum_check_query = "SELECT * FROM faculty WHERE id_number='$IDnum' LIMIT 1";
    }
    $result = mysqli_query($db, $idnum_check_query);
    $match = mysqli_fetch_assoc($result);
    if ($match) { // if id number exists or has an id number match
        if ($match['id_number'] === $IDnum) {
            $_SESSION["isRegistered"] = true;
            $name = $match['name'];
            $province = $match['province'];
            $citytown = $match['citytown'];
            $barangay = $match['barangay'];
            $contact = $match['number'];
            $email = $match['email'];
            $prev_timein = $match['time_in'];
        }
    }
    else{
        $_SESSION["isRegistered"] = false;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2><?php echo $_SERVER["type"] ?> Login Verification</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if ($_SESSION["isRegistered"] == false) : ?>
      <div class="error" >
      	<h3>
          <?php 
          	echo "ID Number <u>".$IDnum."</u> is not registered!<br>Please register to login."; 
          ?>
      	</h3>
      </div>
      <center><button class="cancelbtn"><a class="returnbtn" href="mode.php">Return</a></button></center>
  	<?php endif ?>
      
    <!-- logged in user information -->
    <?php  if ($_SESSION["isRegistered"] == true) : ?>
        <form action="server.php" class="login-form" method="post">
            <center><strong><p class="success">Attempting to Log-in as 
                <?php 
                    echo $IDnum."</center></strong><br>";
                    echo "Name: ".$name."<br>";
                    echo "Province: ".$province."<br>";
                    echo "City or Town: ".$citytown."<br>";
                    echo "Barangay: ".$barangay."<br>";
                    echo "Contact: ".$contact."<br>";
                    echo "Email: ".$email."<br>";
                    echo "Previous Time-In: ".$prev_timein."<br><br>";
                ?>
            </p>
            <div class="btn-group">
                <button type="submit" class="cancelbtn" name="cancel_log">Cancel</button>
                <button type="submit" class="loginbtn" 
                    name=<?php if($_SERVER["type"] == "Student"){
                        echo "stu_log";
                    }
                    else if($_SERVER["type"] == "Faculty/Staff"){
                        echo "fac_log";
                    }?>>Login
                </button>
            </div>
        </form>
    <?php endif ?>	
</div>
		
</body>
</html>

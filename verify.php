<?php
    // verifies id number input if it is registered
    include('server.php');
    unset($_SERVER["type"]);
    if(!isset($_POST['s_submit']) && !isset($_POST['f_submit'])){
        session_destroy();
        header("location: mode.php");
    }
    else if (isset($_POST['s_submit'])) {  
        $IDnum = mysqli_real_escape_string($db, $_POST['id']);
        $_SESSION["id"] = $IDnum;
        $_SERVER["type"] = "Student";
        // check if input id number is registered in database
        $idnum_check_query = "SELECT * FROM students WHERE id_number='$IDnum' LIMIT 1";
        
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
            $name = $match['name'];
            $province = $match['province'];
            $citytown = $match['citytown'];
            $barangay = $match['barangay'];
            $contact = $match['number'];
            $email = $match['email'];
            $prev_timein = $match['time_in'];
            $_SESSION["isRegistered"] = true;
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
                <?php echo $IDnum."</strong>";?>
                <div class="verification">
                    <div class="labels">
                        <strong>
                        Name: <br>
                        Province: <br>
                        City or Town: <br>
                        Barangay: <br>
                        Contact: <br>
                        Email: <br>
                        Previous Time-In: <br><br></strong>
                    </div>
                    <div class="details">
                        <?php
                            echo $name."<br>";
                            echo $province."<br>";
                            echo $citytown."<br>";
                            echo $barangay."<br>";
                            echo $contact."<br>";
                            echo $email."<br>";
                            echo $prev_timein."<br><br>";
                        ?>
                    </div>
                </div>
            </p>
            <br>
            <div class="btn-group">
                <button type="submit" class="loginbtn" 
                    name=<?php if($_SERVER["type"] == "Student"){
                        echo "stu_log";
                    }
                    else if($_SERVER["type"] == "Faculty/Staff"){
                        echo "fac_log";
                    }?>>Login
                </button>
                <button type="submit" class="cancelbtn" name="cancel_log">Cancel</button>
            </div>
        </form>
    <?php endif ?>	
</div>
		
</body>
</html>

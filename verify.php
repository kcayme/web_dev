<?php
    // verifies id number input if it is registered
    include('server.php');
    unset($_SERVER["type"]);
    if (isset($_POST['s_submit'])) {
        $IDnum = $_POST["id"];
        $_SERVER["type"] = "Student";
        // check if input id number is registered in database
        $idnum_check_query = "SELECT * FROM students WHERE id_number='$IDnum' LIMIT 1";
    }
    else if (isset($_POST['f_submit'])) {
        $IDnum = $_POST["id"];
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
          	echo "ID Number ".$IDnum." not registered! Please register to login."; 
          	unset($_SESSION["isRegistered"]);
          ?>
      	</h3>
      </div>
      <center><button class="cancelbtn"><a href="mode.php">Return</a></button></center>
  	<?php endif ?>
      
    <!-- logged in user information -->
    <?php  if ($_SESSION["isRegistered"] == true) : ?>
    	<center><p class="success">Welcome 
			<?php 
				echo $IDnum."!"."</center><br>";
                echo "Name: ".$name."<br>";
                echo "Province: ".$province."<br>";
                echo "City or Town: ".$citytown."<br>";
                echo "Barangay: ".$barangay."<br>";
                echo "Contact: ".$contact."<br>";
                echo "Email: ".$email."<br>";
                echo "Previous Time-In: ".$prev_timein."<br>";
			?>
		</strong></p>
        
    	<button type="submit" class="cancelbtn"><a href="index.php?logout='1'">Cancel</a></button>
        <button type="submit" name="loginbtn"><a href="index.php?logout='1'">Login</a></button>
    <?php endif ?>	
</div>
		
</body>
</html>

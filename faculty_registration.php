<?php 
	session_start();
	if(isset($_SESSION['status'])){
		$status = $_SESSION['status'];
		$error_msg = "";
		if($status == "fac_id_exist"){
			echo "<script>alert('Faculty Registration Failed! ID already exists.')</script>";
		}
		else if($status == "fac_reg_failed"){
			echo "<script>alert('Faculty Registration Failed! Unsuccessful update to database.')</script>";
		}
		unset($_SESSION['status']);
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Computer Engineering Contact Tracing</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Faculty Registration</h2>
  </div>
	
  <form method="post" action="server.php">
	<div class="input-group">
  	  <label>ID Number</label>
  	  <input type="text" name="id" value="" required>
  	</div>

  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="" required>
  	</div>

  	<div class="input-group">
  	  <label>Province</label>
  	  <input type="text"  name="province" value="" required>
  	</div>

	<div class="input-group">
	<label>City or Town</label>
	<input type="text"  name="citytown" value="" required>
  	</div>

	<div class="input-group">
	<label>Barangay</label>
	<input type="text"  name="barangay" value="" required>
  	</div>

  	<div class="input-group">
  	  <label>Contact Number</label>
  	  <input type="text" name="contact" required>
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" required>
  	</div>
	  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="fac_reg">Register</button>
  	</div>
  	<p>
  		Already a member? <a class="signin" href="mode.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
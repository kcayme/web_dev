<?php 
	session_start();
	if(isset($_SESSION['status'])){
		echo "<script>document.getElementByID('error-modal').style.display = 'block';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Computer Engineering Contact Tracing</title>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
	<div class="fac-form">
		<div class="header">
			<h2>Faculty Registration</h2>
		</div>
		<div class="reg-form" id="reg-form">
		<form method="post" action="server.php">
			<div class="input-group">
			<label>ID Number</label>
			<input type="text" name="id" value="" placeholder="Faculty ID Number" pattern="^[0-9]+$" required>
			</div>

			<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="" placeholder="Faculty Name" pattern="([^0-9]*)$"required>
			</div>

			<div class="input-group">
			<label>Province</label>
			<input type="text"  name="province" placeholder="Province" value="" required>
			</div>

			<div class="input-group">
			<label>City or Town</label>
			<input type="text"  name="citytown" value=""placeholder="City or Town" required>
			</div>

			<div class="input-group">
			<label>Barangay</label>
			<input type="text"  name="barangay" value="" placeholder="Barangay" required>
			</div>

			<div class="input-group">
			<label>Contact Number</label>
			<input type="text" name="contact" pattern="^[0-9]+$" placeholder="Contact Number" required>
			</div>

			<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" placeholder="Email Address" required>
			</div><br>
			<center><div class="input-group">
			<button type="submit" class="btn" name="fac_reg" id="reg-btn">Register</button>
			</div>
			<br>
			<p style="font-size:15px">
				Already a member? <a class="signin" href="mode.php">Sign in</a>
			</p></center>
		</form>
		</div>
	</div>

	<?php if(isset($_SESSION['status'])) : ?>
		<div class="error-modal" id="error-modal">
			<img class="reg-img" src="alert.png" width="44" height="38" />
				<span class="title">Registration Failed!</span>
				<p class="reg-mod-msg">
				<?php 
				if(isset($_SESSION['status'])){
					$status = $_SESSION['status'];
					if($status == "fac_id_exist"){
						echo "Attempted ID Number to register already exists.";
					}
					else if($status == "fac_reg_failed"){
						echo "Unsuccessful registration to database.";
					}
				}
				?>
				</p>
				<div class="reg-btn" onclick="hideModal()">Try Again</div>
		</div>
		
	<?php endif ?>
	<script>
	function hideModal(){
        var element = document.getElementById("error-modal");
		document.getElementById('reg-btn').style.backgroundColor='#5F9EA0';
		document.getElementById("reg-btn").disabled = false;
        element.style.display = "none";
    }
	<?php // echo a js function to disable registration button while error notif modal is visible
		if (isset($_SESSION['status'])){ 
			echo "document.getElementById('reg-btn').style.backgroundColor='#808080';";
			echo "document.getElementById('reg-btn').disabled = true;";
			unset($_SESSION['status']);
		} 
	?>
	</script>
</body>
</html>
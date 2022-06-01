<?php 
  session_start(); 

  if (!isset($_SESSION['success'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: mode.php');
  }
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: mode.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success'];
			echo "<br><br>Current Time-In: ".$_SESSION['current_time_in'];
			unset($_SESSION['current_time_in']);
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
	<center><p class="welcome">Logged in as 
		<b>
		<?php 
			if(!empty($_SESSION['type'])){
				 
				echo $_SESSION['type']."  ";
				unset($_SESSION['type']);
			}
		?>
		</b>
		</p>

	<button type="submit" class="signoutbtn"><a class="signoutbtn" href="index.php?logout='1'">Sign Out</a></button></center>
</div>
		
</body>
</html>
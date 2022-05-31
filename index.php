<?php 
  session_start(); 

  if (!isset($_SESSION['name'])) {
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
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['name'])) : ?>
    	<center><p class="welcome">Welcome 
			<?php 
				$type = $_SESSION['type'];
				if(!empty($type)){
					echo $type."  ";
					unset($_SESSION['type']);
				}
				echo "<strong>".$_SESSION['name']; 
			?>
		</strong></p>
		
    	<button type="submit" class="signoutbtn" name="new_reg"><a href="index.php?logout='1'">Sign Out</a></button></center>
    <?php endif ?>
</div>
		
</body>
</html>
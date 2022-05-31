<!DOCTYPE html>
<html>
<head>
  <title>Computer Engineering Contact Tracing</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="server.php">
	<div class="input-group">
  	  <label>ID Number</label>
  	  <input type="text" name="id" value="">
  	</div>

  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="">
  	</div>

  	<div class="input-group">
  	  <label>Province</label>
  	  <input type="text"  name="province" value="">
  	</div>

	<div class="input-group">
	<label>City or Town</label>
	<input type="text"  name="citytown" value="">
  	</div>

	<div class="input-group">
	<label>Barangay</label>
	<input type="text"  name="barangay" value="">
  	</div>

  	<div class="input-group">
  	  <label>Contact Number</label>
  	  <input type="text" name="contact">
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
	  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="new_reg">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="mode.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
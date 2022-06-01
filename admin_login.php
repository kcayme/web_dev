<!DOCTYPE html>
<html>
<head>
  <title>Computer Engineering Contact Tracing</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Administration</h2>
  </div>
    <form method="post" action="admin_verify.php">
        <div class="input-group">
        <label>Username</label>
        <input type="text" id="username" name="username" required>
        </div>

        <div class="input-group">
        <label>Password</label>
        <input type="password" id="password" name="password" required>
        </div>
        <div class="input-group">
        <button type="submit" class="btn" name="fac_reg">Login</button>
        </div>
    </form>
</body>
</html>
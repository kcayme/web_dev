<?php 
	session_start();
	if(isset($_SESSION['status'])){
		$status = $_SESSION['status'];
		$error_msg = "";
		if($status == "fac_log_failed"){
			echo "<script>alert('Faculty Log-In Failed!')</script>";
		}
		else if($status == "stu_log_failed"){
			echo "<script>alert('Student Log-In Failed!')</script>";
		}
		unset($_SESSION['status']);
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(Contact_Tracing_Animated.gif);
  background-size: cover;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type='email']{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 10px;
}

.title{
  font-family: 'Bebas Neue', cursive;
  font-size: 85px;
  line-height: 40px;
  color: #009096;
  -webkit-text-fill-color: #009096; /* Will override color (regardless of order) */
  -webkit-text-stroke: 0.5px white;
}
/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 10% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
  border-radius: 20px 20px;
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}
a{
  text-decoration: none;
  color: #3c763d; 
}
a:hover {
  color: #04AA6D;
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.buttonContainers{

  display:flex;

}
.zoomb1{

  transition: transform .2s;
  flex-grow:1;

}
.zoomb2{

  transition: transform .2s;
  flex-grow:1;

}
.zoomb3{

  transition: transform .2s;
  flex-grow:1;

}
.zoomb1:hover {
  transform: scale(1.2);
  cursor: pointer;
  
}
.zoomb2:hover {

  transform: scale(1.2);
  cursor: pointer; 
  
}
.zoomb3:hover {

  transform: scale(1.2);
  cursor: pointer;
  
}
</style>
</head>
<body>



<center><h2 class="title"><br><br>Contact Tracing Application</h2><br>
<div class = "buttonContainers">
  <div class = "zoomb1">
    <img src="StudentLogin.png" onclick="document.getElementById('id01').style.display='block'" style="width:75%;" />
  </div>
  <div class = "zoomb2">
    <img src="FacultyLogin.png" onclick="document.getElementById('id02').style.display='block'" style="width:75%;" />
  </div>
  <div class = "zoomb3">
    <img src="GuestLogin.png" onclick="document.getElementById('id03').style.display='block'" style="width:75%;" /></center>
  </div>
</div>

<div id="id01" class="modal">
  
  <! -- Student Login Form -->
  <form class="modal-content animate" method="post" action="verify.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Student.png" alt="Student" class="avatar" style="width:90px; height:90px;">
    </div>

    <div class="container">
    <label for="snumber"><b>Enter Student Number: </b></label>
    <input type="text" placeholder="Enter Student ID Number" name="id" pattern="^[0-9]+$" required><br>
    
    <button type="submit" onclick="myFunction()" name="s_submit">Verify</button>

  </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">New User?&nbsp;<a href="student_registration.php">Register Account</a></span>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="verify.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Faculty.png" alt="Faculty" class="avatar" style="width:90px; height:90px;">
    </div>
	
    <div class="container">
    <label for="fnumber"><b>Enter Faculty ID Number: </b></label>
    <input type="text" placeholder="Enter ID Number" name="id" pattern="^[0-9]+$" required>

    <button type="submit" onclick="myFunction()" name="f_submit">Verify</button>
   
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">New User?&nbsp;<a href="faculty_registration.php">Register Account</a><br>
      Admin?&nbsp;&emsp;&ensp;<a href="admin_login.php">Login here</a></span>
    </div>
  </form>
</div>

<div id="id03" class="modal">
  
  <form class="modal-content animate" action="server.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Guest.png" alt="Guest" class="avatar" style="width:90px; height:90px;">
    </div>
    <div>
  	  <center><h2>Guest Registration</h2></center>
    </div>
    <div class="container">
      <label for="gname"><b> Name: </b></label>
      <input type="text" placeholder="Guest Name" name="gname" pattern="([^0-9]*)$" required>

      <label for="gprovince"><b>Province: </b></label>
      <input type="text" placeholder="Province" name="gprovince" required>

      <label for="gcitytown"><b>City or Town: </b></label>
      <input type="text" placeholder="City or Town" name="gcitytown" required>

      <label for="gbarangay"><b>Barangay: </b></label>
      <input type="text" placeholder="Barangay" name="gbarangay" required>

      <label for="gcontact"><b>Contact Number: </b></label>
      <input type="text" placeholder="Contact Number" name="gcontact" pattern="^[0-9]+$" required>

      <label for="gemail"><b>Email Address: </b></label><br>
      <input type="email" placeholder="Email Address" name="gemail" required>
      
      <button type="submit" onclick="myFunction()" name="guest_in">Log In</button>
    </div>
  </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>

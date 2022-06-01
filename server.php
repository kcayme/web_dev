<?php
session_start();

// initializing variables
$IDnum = "";
$name  = "";
$province = "";
$citytown = "";
$barangay = "";
$contact = "";
$email = "";
$timein = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'contactdb');

// student registration
if (isset($_POST['stu_reg'])) {
  // receive all input values from the form
  $IDnum = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $province = mysqli_real_escape_string($db, $_POST['province']);
  $citytown = mysqli_real_escape_string($db, $_POST['citytown']);
  $barangay = mysqli_real_escape_string($db, $_POST['barangay']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $email = mysqli_real_escape_string($db, $_POST['email']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($IDnum)) { array_push($errors, "Username is required"); }
  if (empty($name)) { array_push($errors, "Email is required"); }
  if (empty($province)) { array_push($province, "Province is required"); }
  if (empty($citytown)) { array_push($citytown, "City/Town is required"); }
  if (empty($barangay)) { array_push($barangay, "Barangay is required"); }
  if (empty($contact)) { array_push($errors, "Contact is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $idnum_check_query = "SELECT * FROM students WHERE id_number='$IDnum' LIMIT 1";
  $result = mysqli_query($db, $idnum_check_query);
  $match = mysqli_fetch_assoc($result);
  
  if ($match) { // if id number exists or has an id number match
    if ($match['id_number'] === $IDnum) {
      array_push($errors, "ID number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    // get time in on this registration (format: YYYY-MM-DD HH:MM:SS)
    date_default_timezone_set('Asia/Manila');
    $timein = date('Y-m-d H:i:s');
    // a
  	$query = "INSERT INTO students (id_number, name, province, citytown, barangay, number, email, time_in) 
  			  VALUES('$IDnum', '$name', '$province','$citytown','$barangay', '$contact', '$email', '$timein')";
  	if(mysqli_query($db, $query)){
      $firstname = strtok($name, " ");
      $_SESSION['current_time_in'] = $timein;
      $_SESSION['type'] = "Student";
  	  $_SESSION['success'] = "Welcome, ".$firstname."!";
  	  header('location: index.php');
    }
  	else{
      array_push($errors, "registration failed!");
    }
  }
}
// faculty registration
else if (isset($_POST['fac_reg'])) {
  // receive all input values from the form
  $IDnum = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $province = mysqli_real_escape_string($db, $_POST['province']);
  $citytown = mysqli_real_escape_string($db, $_POST['citytown']);
  $barangay = mysqli_real_escape_string($db, $_POST['barangay']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $email = mysqli_real_escape_string($db, $_POST['email']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($IDnum)) { array_push($errors, "Username is required"); }
  if (empty($name)) { array_push($errors, "Email is required"); }
  if (empty($province)) { array_push($province, "Province is required"); }
  if (empty($citytown)) { array_push($citytown, "City/Town is required"); }
  if (empty($barangay)) { array_push($barangay, "Barangay is required"); }
  if (empty($contact)) { array_push($errors, "Contact is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $idnum_check_query = "SELECT * FROM faculty WHERE id_number='$IDnum' LIMIT 1";
  $result = mysqli_query($db, $idnum_check_query);
  $match = mysqli_fetch_assoc($result);
  
  if ($match) { // if id number exists or has an id number match
    if ($match['id_number'] === $IDnum) {
      array_push($errors, "ID number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    // get time in on this registration (format: YYYY-MM-DD HH:MM:SS)
    date_default_timezone_set('Asia/Manila');
    $timein = date('Y-m-d H:i:s');
    // a
  	$query = "INSERT INTO faculty (id_number, name, province, citytown, barangay, number, email, time_in) 
  			  VALUES('$IDnum', '$name', '$province','$citytown','$barangay', '$contact', '$email', '$timein')";
  	if(mysqli_query($db, $query)){
      $firstname = strtok($name, " ");
      $_SESSION['current_time_in'] = $timein;
      $_SESSION['type'] = "Faculty/Staff";
  	  $_SESSION['success'] = "Welcome, ".$firstname."!.";
  	  header('location: index.php');
    }
  	else{
      array_push($errors, "registration failed!");
    }
  }
}
// if login option is selected
else if (isset($_POST['stu_log'])) {
  $IDlog = $_SESSION["id"];
  echo $IDlog;
  $IDnum = mysqli_real_escape_string($db, $IDlog);
  // get name based on ID
  $idnum_check_query = "SELECT * FROM students WHERE id_number='$IDnum' LIMIT 1";
  $result = mysqli_query($db, $idnum_check_query);
  $match = mysqli_fetch_assoc($result);
  $name = $match["name"];
  date_default_timezone_set('Asia/Manila');
  $timein = date('Y-m-d H:i:s');
  // update time in in database
  $query = "UPDATE students SET time_in='$timein' WHERE id_number='$IDnum'";
  if(mysqli_query($db, $query)){
    $firstname = strtok($name, " ");
    $_SESSION['current_time_in'] = $timein;
    $_SESSION['type'] = "Student";
    $_SESSION['success'] = "Welcome back, ".$firstname."! You are now logged in.";
    header('location: index.php');
  }
  else{
    array_push($errors, "login failed!");
  }
  /*
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
  */
}
// if faculty login is selected
else if (isset($_POST['fac_log'])) {
  $IDlog = $_SESSION["id"];
  echo $IDlog;
  $IDnum = mysqli_real_escape_string($db, $IDlog);
  // get name based on ID
  $idnum_check_query = "SELECT * FROM faculty WHERE id_number='$IDnum' LIMIT 1";
  $result = mysqli_query($db, $idnum_check_query);
  $match = mysqli_fetch_assoc($result);
  $name = $match["name"];
  date_default_timezone_set('Asia/Manila');
  $timein = date('Y-m-d H:i:s');
  // update time in in database
  $query = "UPDATE faculty SET time_in='$timein' WHERE id_number='$IDnum'";
  if(mysqli_query($db, $query)){
    $firstname = strtok($name, " ");
    $_SESSION['current_time_in'] = $timein;
    $_SESSION['type'] = "Faculty/Staff";
    $_SESSION['success'] = "Welcome back, ".$firstname."!";
    header('location: index.php');
  }
  else{
    array_push($errors, "login failed!");
  }
  /*
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
  */
}
// if guest registration
else if (isset($_POST['guest_in'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['gname']);
  $province = mysqli_real_escape_string($db, $_POST['gprovince']);
  $citytown = mysqli_real_escape_string($db, $_POST['gcitytown']);
  $barangay = mysqli_real_escape_string($db, $_POST['gbarangay']);
  $contact = mysqli_real_escape_string($db, $_POST['gcontact']);
  $email = mysqli_real_escape_string($db, $_POST['gemail']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Email is required"); }
  if (empty($province)) { array_push($province, "Province is required"); }
  if (empty($citytown)) { array_push($citytown, "City/Town is required"); }
  if (empty($barangay)) { array_push($barangay, "Barangay is required"); }
  if (empty($contact)) { array_push($errors, "Contact is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    // get time in on this registration (format: YYYY-MM-DD HH:MM:SS)
    date_default_timezone_set('Asia/Manila');
    $timein = date('Y-m-d H:i:s');
    // a
  	$query = "INSERT INTO guest (name, province, citytown, barangay, number, email, time_in) 
  			  VALUES('$name', '$province','$citytown','$barangay', '$contact', '$email', '$timein')";
  	if(mysqli_query($db, $query)){
      $_SESSION['type'] = "Guest";
      $_SESSION['name'] = $name;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
    }
  	else{
      array_push($errors, "Guest Login Failed!");
    }
  }
}
// if cancel is pressed during verification stage
else if (isset($_POST['cancel_log'])){
  session_destroy();
  header("location: mode.php");
}
// else if server.php is not accessed from verify.php, go to mode.php
else if (!isset($_POST['s_submit']) && !isset($_POST['f_submit'])){
  session_destroy();
  header("location: mode.php");
}
?>
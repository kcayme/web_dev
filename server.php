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

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $idnum_check_query = "SELECT * FROM students WHERE id_number='$IDnum' LIMIT 1";
  $result = mysqli_query($db, $idnum_check_query);
  $match = mysqli_fetch_assoc($result);
  
  if ($match) { // if id number exists or has an id number match
    if ($match['id_number'] === $IDnum) {
      $_SESSION['status'] = "stu_id_exist";
      header('location: student_registration.php');
    }
  }

  // Finally, register user if there are no errors in the form
  else {
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
      $_SESSION['status'] = "stu_reg_failed";
      header('location: student_registration.php');
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

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $idnum_check_query = "SELECT * FROM faculty WHERE id_number='$IDnum' LIMIT 1";
  $result = mysqli_query($db, $idnum_check_query);
  $match = mysqli_fetch_assoc($result);
  
  if ($match) { // if id number exists or has an id number match
    if ($match['id_number'] === $IDnum) {
      $_SESSION['status'] = "fac_id_exist";
      header('location: faculty_registration.php');
    }
  }
  // Finally, register user if there are no errors in the form
  else {
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
      $_SESSION['status'] = "fac_reg_failed";
      header('location: faculty_registration.php');
    }
  }
}
// if login option is selected
else if (isset($_POST['stu_log'])) {
  unset($_SESSION["isRegistered"]);
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
    $_SESSION['status'] = "stu_log_failed";
    header('location: mode.php');
  }
}
// if faculty login is selected
else if (isset($_POST['fac_log'])) {
  unset($_SESSION["isRegistered"]);
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
    $_SESSION['status'] = "fac_log_failed";
    header('location: mode.php');
  }
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

  // get time in on this registration (format: YYYY-MM-DD HH:MM:SS)
  date_default_timezone_set('Asia/Manila');
  $timein = date('Y-m-d H:i:s');
  // 
  $query = "INSERT INTO guest (name, province, citytown, barangay, number, email, time_in) 
        VALUES('$name', '$province','$citytown','$barangay', '$contact', '$email', '$timein')";
  if(mysqli_query($db, $query)){
    $_SESSION['type'] = "Guest";
    $_SESSION['name'] = $name;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
  else{
    echo "Guest Login Failed!";
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
<?php
session_start();

// initializing variables
$IDnum = "";
$name  = "";
$address = "";
$contact = "";
$email = "";
$timein = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'contactdb');

// REGISTER USER
if (isset($_POST['new_reg'])) {
  // receive all input values from the form
  $IDnum = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $email = mysqli_real_escape_string($db, $_POST['email']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($IDnum)) { array_push($errors, "Username is required"); }
  if (empty($name)) { array_push($errors, "Email is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($contact)) { array_push($errors, "Contact is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $idnum_check_query = "SELECT * FROM info WHERE id_number='$IDnum' LIMIT 1";
  $result = mysqli_query($db, $idnum_check_query);
  $match = mysqli_fetch_assoc($result);
  
  if ($match) { // if id number exists or has an id number match
    if ($match['id_number'] === $IDnum) {
      array_push($errors, "ID number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database
    // get time in on this registration (format: YYYY-MM-DD HH:MM:SS)
    $timein = date('Y-m-d H:i:s');
    // a
  	$query = "INSERT INTO info (id_number, name, address, number, email, time_in) 
  			  VALUES('$IDnum', '$name', '$address', '$contact', '$email', '$timein')";
  	if(mysqli_query($db, $query)){
      $_SESSION['name'] = $name;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
    }
  	else{
      array_push($errors, "registration failed!");
    }
  }
}
// if login option is selected
if (isset($_POST['login_user'])) {
  $IDnum = mysqli_real_escape_string($db, $_POST['id']);

  if (empty($IDnum)) {
  	array_push($errors, "ID Number is required");
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

?>
<?php include('server.php') ?>
<?php
session_start();

$mysqli = new mysqli ('localhost','root','','3222') or die(mysqli_error($mysqli));

$LogIn=false;

$id='';	
$fname=''; 
$Mname='';
$lname='';	
$brgy='';
$city='';	
$province='';  
$number='';
$email='';	


if(isset($_POST['SignIn']))
	{
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$Mname = $_POST['Mname'];
		$lname = $_POST['lname'];
		$brgy = $_POST['brgy'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		
		
		
		$_SESSION['message'] ="Record has been saved!";
		$_SESSION['msg_type'] ="Sucess";
		
		header("location: mode.php");

	$mysqli->query("INSERT INTO info (id,fname,Mname,lname,brgy,city,province,number,email) VALUES('$id','$fname','$Mname','$lname','$brgy','$city','$province','$number','$email')") or
		die($mysqli->error); 
	}
?>
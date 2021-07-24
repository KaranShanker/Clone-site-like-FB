<?php
include 'database.php';
if(isset($_POST['update']))
{
	
	$id = $_GET['id'];
	$fullname = $_POST['fullname']; 
	$username = $_POST['username'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$gender = $_POST['gender'];
	
	$update = "update users SET fullname = '$fullname',
	username = '$username', email = '$email', number = '$number', gender = '$gender'
	WHERE id = '$id'";
	$sql = mysqli_query($conn, $update);
	if($sql)
	{
		 echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		header("location:profile-edit");
	}
	else
	{
		ECHO"NO";
	}
}

?>
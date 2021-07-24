<?php  
include("database.php");//make connection here
 
if(isset($_POST['login']))  
{  
    $username=$_POST['username'];
    $password=$_POST['password'];  
	$check_email_query="select * from users WHERE username='$username'";  
    $result=mysqli_query($conn, $check_email_query);
	
    $row=mysqli_fetch_assoc($result);
	$count=mysqli_num_rows($result);
	if($count==1 && password_verify($password, $row['password']))
	{ 
		$_SESSION['user']=$row;
		header("location: home");   
	}  
	else
	{
		echo "<script>alert('Wrong Login Details X')</script>";
		echo"<script>window.open('login','_self')</script>";
	}
		
}
?> 
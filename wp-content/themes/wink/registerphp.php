<?php  
  
//session_start();
include("database.php");//make connection here  
if(isset($_POST['register']))  
{  
	$fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$token = $_POST['token'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	if($_FILES['files']['name']){
		move_uploaded_file($_FILES['files']['tmp_name'], "userimages/".$_FILES['files']['name']);
		$img="userimages/".$_FILES['files']['name'];
	}
	
    $insert="insert into users(fullname, username, password, gender, email, image, number, token) 
	values('$fullname','$username','$hashed_password','$gender','$email','$img','$number','$token')";  
    $result=mysqli_query($conn, $insert); 

	if($result)
	{
		header("location:login");
	}	
  
}
?> 
<script>
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php
<?php
require_once "database.php";
// Get user enter email via $.ajax() method
if(isset($_POST['uemail']))	
{
	echo"YES";
	$email = strip_tags($_POST["uemail"]);	

	// Select email from the user table 
	$select_stmt=$db->prepare("SELECT * FROM users WHERE email=:user_email");  
	$select_stmt->execute(array(":user_email"=>$email));	
	$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
			
	if($select_stmt->rowCount() > 0)	
	{
		// If email present in the table, then sends email to user mailbox / junk box
		if($email==$row["email"]) 
		{
			$dbusername = $row["username"]; 
			$dbtoken = $row["token"];
		}
		
	}
}
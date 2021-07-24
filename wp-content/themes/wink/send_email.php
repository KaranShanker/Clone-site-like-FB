<?php
require_once "database.php";

// Get user enter email via $.ajax() method
if(isset($_POST['uemail']))	
{
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

			// They can click on this link to reset the password with the token. 
			$reset_link = "Hi, $dbusername. Click the link to reset your password
			http://localhost/wordpress/wp-content/themes/wink/reset_password.php?username=$dbusername?token=$dbtoken";
					
			// Send email code
			require_once('smtp/PHPMailerAutoload.php');
					
			$mail=new PHPMailer(true);
			$mail->isSMTP();
			$mail->Host="smtp.gmail.com";
			$mail->Port=587;
			$mail->SMTPSecure="tls";
			$mail->SMTPAuth=true;
			$mail->Username="karan.inext98@gmail.com"; //Enter your gmail id
			$mail->Password="Karan_Shanker98"; //Enter your gmail password
			//$mail->SetFrom("test@gmail.com"); //Enter your gmail id
			$mail->addAddress($email);
			$mail->IsHTML(true);
			$mail->Subject="Reset Password";
			$mail->Body = ($reset_link);
			$mail->SMTPOptions=array('ssl'=>array(
						'verify_peer'=>false,
						'verify_peer_name'=>false,
						'allow_self_signed'=>false
					));
			if($mail->send())
			{
				echo"email send check your mail box";
				header("location:login");
			}
			else
			{
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}
		else
		{
			$_SESSION["errorMsg"]="email not found";
			header("location:reset-password");
		}
	}
	else
	{
		$_SESSION["errorMsg"]="wrong email";
		header("location:reset-password");
	}			
}
?>
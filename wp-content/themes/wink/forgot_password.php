<?php
/**
Template Name: reset password
**/
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	
    <link rel="icon" href="<?= get_template_directory_uri() ?>/images/logo1.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/main.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/style.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/color.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/responsive.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</head>

	<body>
	
	
	<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
							<span><img src="<?= get_template_directory_uri() ?>/images/logo1.png" alt=""></span>
					</div>	
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
		
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<h2 class="log-title">Forget Password ?</h2>
							<p>
								<b>Don’t worry&nbsp;!</b>&nbsp;<br>Enter the Email which you registered on <b>WINK</b>
							</p>
						<form method="post" class="form-horizontal">
					
				<div class="form-group">
				<div class="col-sm-6">
				<input type="text" id="txt_email" name="email" class="form-control" placeholder="Enter Email" />
				</div>
				</div>	
				
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit" id="btn_send" class="btn btn-success" value="Send Mail">
				</div>
				</div>
					
			</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
										
	</body>
	
	<script type="text/javascript">	
		$(document).ready(function(){
			$(document).on("click", "#btn_send", function(e){	
					
				var email = $("#txt_email").val();
				//var email = $("#txt_password").val();
				var atpos = email.indexOf("@");
				var dotpos = email.lastIndexOf(".com");
				
				if(email == ""){
					alert("Please Enter Email Address"); 
				}
				else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){
					alert("Please Enter Valid Email Address !"); 
				}
				else{
					$.ajax({
						url: "<?= get_template_directory_uri() ?>/send_email.php",
						method: "post",
						data: {uemail:email},
						success: function(response){
							sweetAlert("Mail Sent");
						}
					});	
				}	
			});		
		});
	</script>
</html>

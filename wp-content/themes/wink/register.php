<?php 
/**
Template Name: Register
**/
?>
<html>
	<title>Register | Wink</title>
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

</head>
<body>
<!--<div class="se-pre-con"></div>-->
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
						<h2 class="log-title">Register</h2>
						<form method="POST" action="<?= get_template_directory_uri() ?>/registerphp.php" enctype="multipart/form-data">
							<div class="form-group">	
	  <input type="text" required="required" name="fullname">
	  <label class="control-label" for="input">First & Last Name</label><i class="mtrl-select"></i>
	</div>
	<div class="form-group">	
	  <input type="text" required="required" name="username">
	  <label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
	</div>
	<div class="form-group">	
	  <input type="text" required="required" name="email">
	  <label class="control-label" for="input">E-Mail</label><i class="mtrl-select"></i>
	</div>
	<div class="form-group">	
	  <input type="number" required="required" name="number">
	  <label class="control-label" for="input">Ph. Number</label><i class="mtrl-select"></i>
	</div>
	<div class="form-group">	
	  <input type="password" required="required" name="password" id="pass">
	  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
	</div>
	<div class="show" style="float:left;">
	<input type="checkbox" onclick="show()"><b style="font-size: 15px;">&nbsp;Show
	</div>
	<br><br>
	<div class="form-radio">
	  <div class="radio">
		<label>
		  <input type="radio" name="gender" value="male"><i class="check-box"></i>Male
		</label>
	  </div>
	  <div class="radio">
		<label>
		  <input type="radio" name="gender" value="female"><i class="check-box"></i>Female
		</label>
	  </div>
	</div>
	<div class="form-group">	
	  <input type="file" name="files"/>
	  <label class="control-label" for="input"><b>Make a Profile Pic</b></label><i class="mtrl-select"></i>
	</div>
	<div class="form-group">	
	  <input type="text" name="token" value="<?= bin2hex(random_bytes(10)); ?>" hidden />
	</div>
	<a href="login" title="" class="already-have">Already have an account !</a>
	<div class="submit-btns">
		<input type="submit" name="register" value="Register">
	</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script src="js/script.js"></script>
	<script>
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

function show() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
	</script>

</body>	

</html>

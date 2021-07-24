<?php 
/**
Template Name: login
**/
?>
<html>
	<title>Login | Wink</title>
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
						<h2 class="log-title">Login</h2>
							<p>
								Don’t use Winku Yet?&nbsp;<a href="<?= get_template_directory_uri() ?>/new-user" title="">Join Now</a>
							</p>
						<form method="POST" action="<?= get_template_directory_uri() ?>/loginphp.php">
							<div class="form-group">	
							  <input type="text" id="input" name="username" id="user">
							  <label class="control-label" for="input" name="username">Username</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" name="password" id="pass" >
							  <label class="control-label" for="input" name="password">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="show" style="float:left;">
							<input type="checkbox" onclick="show()"><b style="font-size: 15px;">&nbsp;Show
							</div>
							<br><br>
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked"/><i class="check-box"></i>Always Remember Me.
							  </label>
							</div>
							<input type="hidden" value="login" name="action">
							<a href="reset-password" target="_blank" class="forgot-pwd">Forgot Password?</a>
							<div class="submit-btns">
								<input type="submit" name="login" value="Login" onclick="check()">
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

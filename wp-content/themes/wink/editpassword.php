<?php  
/**
Template Name: Edit password
**/
include 'database.php'; 
$select = "SELECT * FROM posts where user_id = {$_SESSION['user']['id']} order by id DESC";
$sql = mysqli_query($conn, $select);
if(empty($_SESSION['user']))
{
header("location:login");
}
else
{
if (isset($_POST['change'])) {
	$password = $_POST['password'];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$select = "SELECT * from users WHERE id={$_SESSION['user']['id']}";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
	
	if(password_verify($password,$hash)){
		$update = "UPDATE users set password = '$hash' WHERE id={$_SESSION['user']['id']}";
		$sql = mysqli_query($conn, $update);
        $success = "Password Changed";
    } else{
        $error = "Either Current password is incorrect or New Password is Mismatched*";
		}
}
get_header();
?>
<html>
<title><?= settings ?> | Wink</title>
<head>
<style>
.blinking{
	float: right;
	color: red;
	animation: blinkingText 1.5s infinite;
	}
@keyframes blinkingText{
0%{opacity: 0;}
25%{opacity: .2;}
50%{opacity: .5;}
75%{opacity: .7;}
100%{opacity: 1;}
}
</style>
</head>

<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
<section>
<div class="feature-photo">
<figure><img src="<?= get_template_directory_uri()?>/images/cover.jpg" alt=""></figure>
<form class="edit-phto">
<i class="fa fa-camera-retro"></i>
<label class="fileContainer">
Edit Cover Photo
<input type="file" name="files" multiple/>
</label>
</form>
<div class="container-fluid">
<div class="row merged">
<div class="col-lg-2 col-sm-3">
<div class="user-avatar">
<figure>
<img src="<?= get_template_directory_uri()."/".$_SESSION['user']['image']; ?>" style="height:230px; width:100%">
<form class="edit-phto">
<i class="fa fa-camera-retro"></i>
<label class="fileContainer">
Edit Display Photo
<input type="file"/>
</label>
</form>
</figure>
</div>
</div>
<div class="col-lg-10 col-sm-9">
<div class="timeline-info">
<ul>
<li class="admin-name">
<h5><?php print_r($_SESSION['user']['fullname']); ?></h5>
</li>
<li>
<a class="" href="timeline" title="" data-ripple=""><?= TIMELINE ?></a>
<a class="" href="#" title="" data-ripple=""><?= photos ?></a>
<a class="" href="#l" title="" data-ripple=""><?= friends ?></a>
<a class="" href="profile-edit" title="" data-ripple=""><?= about ?></a>
<a class="active" href="edit-password" title="" data-ripple=""><?= settings ?></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section><!-- top area -->

<section>
<div class="gap gray-bg">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="row" id="page-contents">
<div class="col-lg-3">
<aside class="sidebar static">
<div class="widget">
<?php get_sidebar(); ?>
</div>
<!-- settings widget -->										
</aside>
</div><!-- sidebar -->
<div class="col-lg-8">
<div class="central-meta">
<div class="editing-info">
<p class="error" style="color:red;"><?php if(isset($error)) { echo $error; } ?></p>
<h5 class="f-title"><i class="ti-lock"></i><?= change_password ?></h5>
<span class="blinking"><?= confidential ?>&nbsp;&nbsp;<b><i class="ti-info-alt"></i></b></span>
<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">

<div class="form-group">	
  <input type="password" name="password" id="currentPassword" class="required"/>
  <label class="control-label" for="input"><?= current_password ?></label><i class="mtrl-select"></i>
</div>
<div class="form-group">	
  <input type="password" id="input"  name="password" id="newPassword" class="required"/>
  <label class="control-label" for="input"><?= new_password ?></label><i class="mtrl-select"></i>
</div>
<div class="form-group">	
  <input type="password" name="password" id="confirmPassword" class="required"/>
  <label class="control-label" for="input"><?= confirm_password ?></label><i class="mtrl-select"></i>
</div>
<p class="success" style="color:green;"><?php if(isset($success)) { echo $success; } ?></p>
<a class="forgot-pwd underline" target="_blank" href="reset-password"><?= forgot_password ?>?</a>
<div class="submit-btns">
	<input type="submit" value="<?= change ?>" name="change">
</div>

</form>

</div>
</div>	
</div><!-- centerl meta -->

</div>	
</div>
</div>
</div>
</div>	
</section>

<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>

</body>	
</html>
<?php } get_footer(); ?>
<?php 
/**
Template Name: edit profile
**/
include 'database.php';
if(empty($_SESSION['user']))
{
header("location:login");
}
else
{
get_header();
?>
<html>
<title><?= about ?> | Wink</title>
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
				<input type="file"/>
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
			  <h5><?= $_SESSION['user']['fullname']; ?></h5>
			</li>
			<li>
			<a class="" href="timeline" title="" data-ripple=""><?= TIMELINE ?></a>
			<a class="" href="#" title="" data-ripple=""><?= photos ?></a>
			<a class="" href="#l" title="" data-ripple=""><?= friends ?></a>
			<a class="active" href="profile-edit" title="" data-ripple=""><?= about ?></a>
			<a class="" href="edit-password" title="" data-ripple=""><?= settings ?></a>
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
						<?php get_sidebar() ?>
					</div>
														
				</aside>
			</div><!-- sidebar -->
			<div class="col-lg-8">
			<div class="central-meta">
			<div class="editing-info">
					
			<h5 class="f-title"><?= personal_info ?></h5>
			<span class="blinking"><?= confidential ?>&nbsp;&nbsp;<b><i class="ti-info-alt"></i></b></span>
<form method="POST" action="<?= get_template_directory_uri() ?>/editprofilephp.php?id=<?= $_SESSION['user']['id'] ?>"> 
	<div class="form-group half">	
	  <input type="text" id="input" required="required" name="fullname" value="<?= $_SESSION['user']['fullname']; ?>"/>
	  <label class="control-label" for="input"><?= fullname ?></label><i class="mtrl-select"></i>
	</div>
	<div class="form-group half">	
	  <input type="text" required="required" name="username" value="<?= $_SESSION['user']['username']; ?>"/>
	  <label class="control-label" for="input"><?= username ?></label><i class="mtrl-select"></i>
	</div>
	<div class="form-group">	
	  <input type="text" required="required" name="email" value="<?= $_SESSION['user']['email']; ?>"/>
	  <label class="control-label" for="input"><?= email ?></label><i class="mtrl-select"></i>
	</div>
	<div class="form-group">	
	  <input type="text" required="required" name="number" value="<?= $_SESSION['user']['number']; ?>"/>
	  <label class="control-label" for="input"><?= number ?></label><i class="mtrl-select"></i>
	</div>
	<div class="form-radio">
	  <div class="radio">
		<label>
		  <input type="radio" name="gender" value="male" <?php if($_SESSION['user']['gender']=="male")echo"checked";?>>
		  <i class="check-box"></i><?= male ?>
		</label>
	  </div>
	  <div class="radio">
		<label>
		  <input type="radio" name="gender" value="female" <?php if($_SESSION['user']['gender']=="female")echo "checked";?>>
		  <i class="check-box"></i><?= female ?>
		</label>
	  </div>
	</div>
	<div class="submit-btns">
		<input type="submit" name="update" value="<?= update ?>">
	</div>
	</form>
	</div>

</div>
</div>	
</div><!-- centerl meta -->
</div>	
</div>
</div>
</div>
</div>	
	</section>
</body>	
</html>
<?php } get_footer(); ?>
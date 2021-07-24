<?php  
/**
Template Name: Timelinephotos
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
get_header();
?>
<html lang="en">
<title><?= TIMELINE ?> | Wink</title>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
<section>
<div class="feature-photo">
<figure><img src="<?= get_template_directory_uri()?>/images/cover.jpg" alt=""></figure>
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
<a class="active" href="timeline" title="" data-ripple=""><?= TIMELINE ?></a>
<a class="" href="#" title="" data-ripple=""><?= photos ?></a>
<a class="" href="#l" title="" data-ripple=""><?= friends ?></a>
<a class="" href="profile-edit" title="" data-ripple=""><?= about ?></a>
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
<?php get_sidebar(); ?>
</div>
</aside>
</div>


<div class="col-lg-6">
<div class="central-meta">

<ul class="photos">
<?php   										
while($row = mysqli_fetch_assoc($sql))
{										
?>
<li>
<a class="strip" href="<?= get_template_directory_uri()."/".$row['images']; ?>" data-strip-group="mygroup" data-strip-group-options="loop: false">
<img src="<?= get_template_directory_uri()."/".$row['images']; ?>" style="height:210px; width:100%"></a>
</li>
<?php } ?>
</ul>
</div><!-- photos -->
</div>

<div class="col-lg-3">
<aside class="sidebar static">
<div class="widget">
<h4 class="widget-title"><?= personal_info ?></h4>
<ul class="short-profile">

<li>
<span><?= about ?>:-</span>
<p><?= $_SESSION['user']['username']; ?></p>
</li>
<li>
<span><?= note ?> :-</span>
<p style="color: red;">This is your personal profile and contain your *Confidentional Information*</p>
</li>

</ul>
</div>
</aside>
</div>

</div>	
</div>
</div>
</div>
</div>	
</section>
</body>	
</html>
<?php } get_footer(); ?>
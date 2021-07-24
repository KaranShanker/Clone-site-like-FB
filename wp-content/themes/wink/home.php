<?php  
/**
Template Name: Home
**/
include 'database.php'; 
if(empty($_SESSION['user']))
{
	header("location:login");
}
else
{
get_header();

$limit = 4; 
$page = isset($_GET["page"])? $_GET["page"]: 1; 
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM posts where user_id != {$_SESSION['user']['id']} 
ORDER BY id DESC LIMIT $start_from, $limit");

?>
<html>
<title><?= HOME ?> | Wink</title>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
		
<section>
<div class="gap gray-bg">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="row" id="page-contents">
	<div class="col-lg-3">
		<aside class="sidebar static">
			<?php get_sidebar(); ?>
		</aside>
	</div><!-- sidebar -->
<div class="col-lg-6">
<div class="central-meta">
	<div class="new-postbox">
		<figure>
			<img src="<?= get_template_directory_uri()."/".$_SESSION['user']['image']; ?>" style="height:44px; width:45px;">
		</figure>
		<div class="newpst-input">
			<form method="POST" action="<?= get_template_directory_uri() ?>/newpost.php" enctype="multipart/form-data">
			<input type="hidden" name="username" value="<?php print_r($_SESSION['user']['username']); ?>">
		<textarea rows="2" name="description" placeholder="<?= write_something ?>" required></textarea>
		<input type="hidden" name="date">
		<div class="attachments">
			<ul>
				<li>
					<i class="fa fa-image"></i>
					<label class="fileContainer">
					<input type="file" name="files[]" multiple/>
					</label>
				</li>
				<input type="submit" name="post" value="<?= post ?>">
			</ul>
			
		</div>
				
			</form>
			<?php

?>
		</div>
	</div>
</div><!-- add post new box -->

<div class="loadMore">
<div class="central-meta item">
<?php  											
while($row = mysqli_fetch_array($result))
{	
?>
	<div class="user-post">
	<div class="friend-info">
<div class="friend-name">
	<ins><?= $row['description']; ?></ins>
	<span><?= published_on ?> - <?php print_r($row['date']); ?></span>
</div>
<div class="post-meta">
<img src="<?= get_template_directory_uri()."/".$row['images']; ?>">
	<div class="we-video-info">
		<ul>
			<li>
				<span class="views" data-toggle="tooltip" title="views">
					<i class="fa fa-eye"></i>
					<ins>1.2k</ins>
				</span>
			</li>
			<li>
				<span class="comment" data-toggle="tooltip" title="Comments">
					<i class="fa fa-comments-o"></i>
					<ins>52</ins>
				</span>
			</li>
			<li>
				<span class="like" data-toggle="tooltip" title="like">
					<i class="ti-heart"></i>
					<ins>2.2k</ins>
				</span>
			</li>
			<li>
				<span class="dislike" data-toggle="tooltip" title="dislike">
					<i class="ti-heart-broken"></i>
					<ins>200</ins>
				</span>
			</li>
			<li class="social-media">
				<div class="menu">
				  <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
				  
				  <div class="rotater">
					<div class="btn btn-icon"><a href="https://www.facebook.com/" title=""><i class="fa fa-facebook"></i></a></div>
				  </div>
				  
				  <div class="rotater">
					<div class="btn btn-icon"><a href="https://twitter.com/login?lang=en" title=""><i class="fa fa-twitter"></i></a></div>
				  </div>
				  
				  <div class="rotater">
					<div class="btn btn-icon"><a href="https://www.instagram.com/accounts/login/" title=""><i class="fa fa-instagram"></i></a>
					</div>
				  </div>
					<div class="rotater">
					<div class="btn btn-icon"><a href="https://web.whatsapp.com/" title=""><i class="fa fa-whatsapp"></i></a>
					</div>
				  </div>

				</div>
				</li>
				<li style="float: right;">
				<p><?= posted_by ?> :-<b style="color:#088dcd;"><?= $row['username']; ?></b></p>
				</li>
				</ul>
			</div>

			</div>
		</div>
		<br><br>
	</div>
 <?php } ?>	
</div>	
<?php  

$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM posts"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 

$pagLink = "<ul class='pagination'>"; 
for ($i=1; $i<=$total_pages; $i++) 
{
	
    $pagLink .= "<li class='page-item'><a class='page-link' href='".site_url()."?page=".$i."'>"." ".$i." "."</a></li>";	
}
echo $pagLink."</ul>";

?>
</div>
</div>	
												
<div class="col-lg-3">
<div class="widget">

<h4 class="widget-title"><?= WELCOME ?>&nbsp;<b style="color: #088dcd;"><?= $_SESSION['user']['username']?></b>!</h4>
<p><?= tell_the_world_about_your_activities_by_posting_something_new_and_share_as_much_as_you_can ?> :)</p>
<p><?= dont_worry_your_information_is_safe_with_us ?></p>
<ul class="recent-photos">
<a class="strip" href="<?= get_template_directory_uri()."/".$_SESSION['user']['image'] ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
<img src="<?= get_template_directory_uri()."/".$_SESSION['user']['image'] ?>" alt="">
</a>

</ul>

</div>
</div>
</div>
</div>
</div>
	</div>
	</div>
	</div>	
	</section>

</body>	
</html>
<?php
get_footer(); 
}  
?>
<!--
<video width="100%" height="auto" controls disabled>
	<source src="<? //get_template_directory_uri()."/".$row['videos']; ?>" disabled>
</video>

-->
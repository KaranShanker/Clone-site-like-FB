<?php
// Set Language variable
if(isset($_GET['lang']) && !empty($_GET['lang'])){
 $_SESSION['lang'] = $_GET['lang'];

 if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
  echo "<script type='text/javascript'> location.reload(); </script>";
 }
}

// Include Language file
if(isset($_SESSION['lang']))
{
	include "languages/lang_".$_SESSION['lang'].".php";
}
else
{
	include "languages/lang_en.php";
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="responsive-header">
<div class="mh-head first Sticky">
<ul class="nav navbar-nav navbar-right">
     <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	  <span class="fa fa-comments" style="font-size:18px; color:#ffff;"></span>
	  <span class="badge badge-light bg-danger count" style="border-radius:10px; color:#ffff;"></span> 
	  </a>
      <div class="dropdown-menu"></div>
     </li>
    </ul>
<span class="mh-btns-left">

<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
</span>

<span class="mh-btns-right">
<a class="fa fa-sliders" href="#shoppingbag"></a>
</span>
</div>

<nav id="shoppingbag">
<div>
<div class="">
<h4 class="panel-title"><?= account_setting ?></h4>
<form method="post">
<div class="setting-row">
<span><a href="timeline" title=""><i class="ti-user" style="color:#7a169c; font-weight: bolder; font-size: 18px;"></i>&nbsp;<?= view_profile ?></a></span><br><br>
<span><a href="<?= get_template_directory_uri() ?>/profile-edit" title=""><i class="ti-pencil-alt" style="color:#e37936; font-weight: bolder; font-size: 18px;"></i>&nbsp;<?= edit_profile ?></a</span><br><br>
<span><a href="<?= get_template_directory_uri() ?>/logout.php" name="logout"><i class="ti-power-off"  style="color: red; font-weight: bolder; font-size: 18px;"></i>&nbsp;<?= logout ?></a></span><br><br>
<span><?= delete_history ?></span>
<input type="checkbox" id="switch10" /> 
<label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
</div>
</form>
</div>
</div>
</nav>
</div>

<!-- Desktop header -->
<div class="topbar stick">

<div class="logo">
<a title="" href="<?= get_template_directory_uri() ?>/home"><img src="<?= get_template_directory_uri() ?>/images/logo1.png" alt=""></a>
</div>

<div class="top-area">
 <ul class="nav navbar-nav navbar-right">
     <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	  <span class="fa fa-comments" style="font-size:30px; color:#ffff;"></span>
	  <span class="badge badge-light bg-danger count" style="border-radius:10px; color:#ffff;"></span> 
	  </a>
      <div class="dropdown-menu"></div>
     </li>
    </ul>
<ul class="main-menu">


	
<li>
<a href="<?= get_template_directory_uri() ?>/home" title=""><?= HOME ?>&nbsp;<i class="fa fa-home"></i></a>
</li>
<li>
<b><a href="timeline" title=""><?= TIMELINE ?>&nbsp;<i class="fa fa-calendar-o"></i></a></b>
</li>

<li>
<b style="font-size:14px;"><?= MORE ?></b>&nbsp;<i class="fa fa-arrow-down" aria-hidden="true"></i>
<ul>
<li><a href="about.html" title=""><?= about_us ?>&nbsp;<i class="fa fa-newspaper-o"></i></a></li>
<li><a href="contact.html" title=""><?= contact_us ?>&nbsp;<i class="fa fa-phone"></i></a></li>
</ul>
</li>
</ul>

<ul class="setting-area">		
<li>
<li><h6 style="color:#ffff;">Language&nbsp;<i class="fa fa-flag"></i></h6></li>
<form method='get' action='' id='desktop_lang' >
<select name='lang' onchange='changedesktopLang();' >
<option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English(UK)</option>
<option value='hn' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'hn'){ echo "selected"; } ?> >hindi(हिंदी)</option>
<option value='fr' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'fr'){ echo "selected"; } ?> >French(fr)</option>
</select>
</form>
</li>				
</ul>


<div class="user-img">
<img src="<?= get_template_directory_uri()."/".$_SESSION['user']['image']; ?>" style="height:56px; width:62px;">
<span class="status f-online"></span>

</div>
<span class="ti-menu main-menu" data-ripple="" style="color:#ffff;"></span>
</div>
</div>

<!------------ side pannel ------------->

<div class="side-panel">

<h4 class="panel-title"><?= account_setting ?></h4>
<form method="post">
<div class="setting-row">
<span><a href="timeline" title=""><i class="ti-user" style="color:#7a169c; font-weight: bolder; font-size: 18px;"></i>&nbsp;<?= view_profile ?></a></span><br><br>
<span><a href="<?= get_template_directory_uri() ?>/profile-edit" title=""><i class="ti-pencil-alt" style="color:#e37936; font-weight: bolder; font-size: 18px;"></i>&nbsp;<?= edit_profile ?></a</span><br><br>
<span><a href="<?= get_template_directory_uri() ?>/logout.php" name="logout"><i class="ti-power-off"  style="color: red; font-weight: bolder; font-size: 18px;"></i>&nbsp;<?= logout ?></a></span><br><br>
<span><?= delete_history ?></span>
<input type="checkbox" id="switch10" /> 
<label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
</div>
</form>
</div>

<nav id="menu" class="res-menu">
<ul>
<li><span><a href="<?= get_template_directory_uri() ?>/home"><b><?= HOME ?>&nbsp;<i class="fa fa-home"></i></b></a></span>
</li>
<li><span><b><?= TIMELINE ?>&nbsp;<i class="fa fa-calendar-o"></i></b></span>	
</li>

<li><a href="<?= get_template_directory_uri() ?>" title=""><b><?= about_us ?>&nbsp;<i class="fa fa-newspaper-o"></i></b></a></li>
<li><a href="<?= get_template_directory_uri() ?>" title=""><b><?= contact_us ?>&nbsp;<i class="fa fa-phone"></i></b></a></li>

<li>
		
<form method='get' action='' id='mobile_lang' >
<select name='lang' onchange='changemobileLang();' >
<option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English(UK)</option>
<option value='hn' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'hn'){ echo "selected"; } ?> >hindi(हिंदी)</option>
<option value='fr' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'fr'){ echo "selected"; } ?> >French(fr)</option>
</select>&nbsp;<i class="fa fa-flag"></i>
</form>
</li>

</ul>
</nav>

 <script>
 // Language Switcher //
  function changedesktopLang(){
  document.getElementById('desktop_lang').submit();
 }
 function changemobileLang(){
  document.getElementById('mobile_lang').submit();
 }
 // END //
 
 // AJAX of New Unseen messages //
$(document).ready(function(){
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"<?= get_template_directory_uri() ?>/notIfication.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();

$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 1000);
});
// END //
</script>
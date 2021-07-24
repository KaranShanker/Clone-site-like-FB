
<?php
/**
Template Name: Messages
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

<body>
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
<div class="widget stick-widget">
<?php get_sidebar(); ?>
</div><!-- Shortcuts -->										
</aside>
</div><!-- sidebar -->


<div class="col-lg-8">

<div class="messages">
<h5 class="f-title"><i class="ti-bell"></i><?= all_messages ?>&nbsp;<i class="fa fa-users"></i></h5>
<div class="message-box">

	<div class="peoples-mesg-box">
	
	 <!-- Load More Messages -->
		<input type="button" id="loadBtn" value="Load More...">
      <input type="hidden" id="load" value="0">
      <input type="hidden" id="postCount" value="<?= $postCount; ?>">
	  <!-- END -->
	  
		<ul class="chatting-area" id="messageboard">
		
		<?php
	  
      $count_query = "SELECT count(*) as allcount FROM messages";
      $count_result = mysqli_query($conn,$count_query);
      $count_fetch = mysqli_fetch_array($count_result);
      $postCount = $count_fetch['allcount'];
      $limit = 5;
 
      $query = "SELECT * FROM messages ORDER BY msg_id desc LIMIT 0,".$limit; 
      $result = mysqli_query($conn,$query);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){ 
		$condition = $row['user_id'] == $_SESSION['user']['id'];
		$dynamicClass = $condition ? "me" : "you";
		$dynamicTimeclass = $condition ? "me-chat-time" : "other-chat-time";
		  ?>
		<li class="<?= $dynamicClass ?>">
		   <?php if(!$condition): ?>
           <i class="fa fa-user" style="color:#088dcd;"></i>&nbsp;<b style="font-family:revert;"><?= $row['username']; ?></b><br>
		   <?php endif; ?>
		  <p><?= $row['msg']; ?></p><br>
		  <b class="<?= $dynamicTimeclass ?>"><?= $row['date']; ?></b>
		</li>
        <?php }
      } ?>
				 
		</ul>

<div class="message-text-container">

<form name="contact-form" method="POST" id="prospects_form">
<div class="row">
<input type="text" id="name" name="username" id="username" value="<?= $_SESSION['user']['username'] ?>" class="form-control" hidden>
</div>
<div class="row">
<div class="col-md-11">
<div class="md-form">
<textarea type="text" data-emoji-picker="true" id="msg" name="msg" rows="5" placeholder="<?= write_a_message ?>"
class="form-control md-textarea" required></textarea>
</div>
</div>
</div>
<br>
<div class="submit-button" align="left">
<button type="submit" class="btn btn-success" id="save" name="submit"><?= send ?>&nbsp;<i class="fa fa-paper-plane"></i></button>
</div> 
</form>


</div>
		
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

<script>
//------------- INSERT REAL TIME CHAT THROUGH AJAX -------------//	
$(document).ready(function () {

$('#prospects_form').on('submit', function(event){
 event.preventDefault();

  var form_data = $(this).serialize();
  $.ajax({
   url:"<?= get_template_directory_uri() ?>/chat/chat.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#prospects_form')[0].reset();
	
   }
  });
});


//------------- END -------------//	
	
	
//------------- LOAD MORE MESSAGE'S -------------//	
    $(document).on('click', '#loadBtn', function () {
		
      var row = Number($('#load').val());
      var count = Number($('#postCount').val());
      var limit = 5;
      row = row + limit;
      $('#load').val(row);
      $("#loadBtn").val('Loading...');
 
      $.ajax({
        type: 'POST',
        url: '<?= get_template_directory_uri()?>/chat/loadmore-data.php ?>',
        data: 'row=' + row,
        success: function (data) {
          var rowCount = row + limit;
          $('.chatting-area').append(data);
          $("#loadBtn").val('Load More');
		  
        }
      });
    });
//------------- END -------------//	
  });
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="<?= get_template_directory_uri() ?>/emojis/src/emojiPicker.js"></script>
  <script>
    (() => {
      new EmojiPicker()
    })()
  </script>
</body>	
</html>
<?php } get_footer(); ?>
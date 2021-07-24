<?php
include('database.php');
if (isset($_POST['row'])) {
  $start = $_POST['row'];
  $limit = 5;
  $query = "SELECT * FROM messages ORDER BY msg_id desc LIMIT ".$start.",".$limit;
  $result = mysqli_query($conn,$query);
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
		$condition = $row['user_id'] == $_SESSION['user']['id'];
		$dynamicClass = $condition ? "me" : "you";
		$dynamicTimeclass = $condition ? "me-chat-time" : "other-chat-time";
      ?>
		 <li class="<?= $dynamicClass ?>">
		 <?php if(!$condition): ?>
          <i class="fa fa-user"></i>&nbsp;<?= $row['username']; ?><br>
		  <?php endif; ?>
		  <p><?= $row['msg']; ?></p><br>
		  <b class="<?= $dynamicTimeclass ?>"><?= $row['date']; ?></b>
		</li>
    <?php }
  }
}
?>
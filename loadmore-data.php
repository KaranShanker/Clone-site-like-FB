
<?php
include('database.php');
if (isset($_POST['row'])) {
  $start = $_POST['row'];
  $limit = 5;
  $query = "SELECT * FROM messages ORDER BY id desc LIMIT ".$start.",".$limit;
  $result = mysqli_query($conn,$query);
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
		 <li class="you">
          <h6><?= $row['username']; ?></h6>
		  <p><?= $row['msg']; ?></p><br>
		  <b style="font-size:10px; float:right;"><?= $row['date']; ?></b>
		</li>
    <?php }
  }
}
?>

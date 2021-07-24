<?php
include('database.php');
if(isset($_POST['view'])){

if($_POST["view"] != '')
{
   $update_query = "UPDATE messages SET msg_status = 1 WHERE user_id!={$_SESSION['user']['id']} and msg_status=0";
   mysqli_query($conn, $update_query);
}
$query = "SELECT * FROM messages WHERE user_id!={$_SESSION['user']['id']} ORDER BY msg_id DESC LIMIT 3";
$result = mysqli_query($conn, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <div class="dropdown-msgs" style="background-color:#dadada; padding:4px;">
  <a href="message" style="text-decoration:none;">
  <p style="line-height:28px;"><strong style="color:#088dcd;">'.$row["username"].'</strong><br>
  <b style="color:#000; font-size:13px;">'.$row["msg"].'</b></p>
  </a>
  </div>
  ';
}
}
else{
    $output .= '<li><b>No Notification&nbsp;<i class="fa fa-times-circle"></i></b><br>
	<a href="message" style="color:#088dcd; font-size:13px;">Start Chat</a></li>';
}
$status_query = "SELECT * FROM messages WHERE user_id!={$_SESSION['user']['id']} and msg_status=0";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>
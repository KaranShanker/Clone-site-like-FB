<?php 
include 'database.php';

$username = $_SESSION['user']['username'];
$msg = $_POST['msg'];
$user_id = $_SESSION['user']['id'];
$sql = "INSERT INTO messages(username, msg, user_id) VALUES('$username','$msg','$user_id')";

$result=mysqli_query($conn, $sql);

?>
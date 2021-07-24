<?php 
include 'database.php';
if(isset($_POST['submit']))
{

$msg=$_POST['msg'];
$sql="INSERT INTO message(msg) VALUES ('$msg')";
$result=mysql_query($sql);
if($result){
echo "You have been successfully subscribed.";
}
}
?>
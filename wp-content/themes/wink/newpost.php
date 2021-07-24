<?php
include 'database.php';
 
if(isset($_POST['post']))
{
	$username = $_POST['username'];
	$description = $_POST['description'];
	$user_id = $_SESSION['user']['id'];

	//Multiple Images Upload//
    $count= count($_FILES['files']['name']);
	for ($i=0; $i <$count ; $i++) 
	{ 
    $photo = "postimages/".$_FILES['files']['name'][$i];
    $target="postimages/".basename($photo);

	$insert = "insert into posts(username, description, images, date, user_id)
			   values('$username','$description','$photo',CURRENT_TIMESTAMP(),'$user_id')";
	$sql = mysqli_query($conn, $insert);
	   
	move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target);
	  if($sql)
		{
		  header("location:home");
		}	   
	}

}
?>

<script>
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
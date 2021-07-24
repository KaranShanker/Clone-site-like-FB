<?php

if ( isset( $_POST['submit'] ) ){

    global $wpdb;
	//$wpdb->print_error();

    $tablename=$	->prefix.'post_job';

    $data=array(
        'organizationname' => $_POST['organizationname'], 
        'post' => $_POST['post'],
        'publishfrom' => $_POST['publishfrom'], 
        'publishupto' => $_POST['publishupto'],
        'qualification1' => $_POST['qualification1'],  
        'experience1' => $_POST['experience1'], 
        'experience2' => $_POST['experience2'], 
		'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) );

     $wpdb->insert($tablename, $data);
	 
}

$select = "Select * from wp_post_job";

$result = $wpdb->get_results($select);

?>


<?php
/*
Template Name: Form
*/
?>

<form action="" id="postjob" method="post">
    <table>
        <tr>
            <td><label for="organizationname">Organization Name:</label></td>
            <td><input type="text" name="organizationname" id="organizationname" value=""/></td>
        </tr>
        <tr>
            <td><label for="post">Post:</label></td>
            <td><input type="text" name="post" id="post" value="" /></td>
        </tr>
        <tr>
            <td><label for="publishfrom">Publish From:</label></td>
            <td><input type="text" name="publishfrom" id="publishfrom" /></td>
        </tr>
        <tr>
            <td><label for="publishupto">Publish Upto:</label></td>
            <td><input type="text" name="publishupto" id="publishupto" /></td>
        </tr>
        <tr>
            <td><label for="qualification">Qualification:</label></td>
            <td><input type="text" name="qualification1" id="qualification1" /></td>
        </tr>
        <tr>
            <td><label for="experience">Experience:</label></td>
            <td><input type="text" name="experience1" id="experience1"/></td>
            <td><input type="text" name="experience2" id="experience2"/></td>
        </tr>
		<tr>
            <td><label for="experience">PASSWORD:</label></td>
            <td><input type="text" name="password" id="password"/></td>
        </tr>
        <tr>
            <td><button type="submit" name="submit" id="submit">Submit</button></td>
        </tr>
    </table>
</form>

<table class="table"  border="2px">
  <thead>
    <tr>
      <th scope="col">SR. NO</th>
      <th scope="col">organizationname</th>
      <th scope="col">post</th>
      <th scope="col">publishfrom</th>
	  <th scope="col">publishupto</th>
      <th scope="col">qualification1</th>
      <th scope="col">experience1</th>
      <th scope="col">experience2</th>
	  <th scope="col">password</th>
	  <th scope="col">Action</th>
    </tr>
  </thead><?php
  foreach($result as $studentNumber){
  ?>

  <tbody>
  
    <tr>
      <th scope="row"><?= $studentNumber->id; ?></th>
      <td><?= $studentNumber->organizationname; ?></td>
	  <td><?= $studentNumber->post; ?></td>
	  <td><?= $studentNumber->publishfrom; ?></td>
	  <td><?= $studentNumber->publishupto; ?></td>
	  <td><?= $studentNumber->qualification1; ?></td>
	   <td><?= $studentNumber->experience1; ?></td>
	   <td><?= $studentNumber->experience2; ?></td>
	   <td><?= $studentNumber->password; ?></td>
	   <td><a href="<?= get_template_directory_uri() ?>/delete.php?=id" name="">Delete</a> | <a href="" name="">Update</a></td>
    </tr>
	
  

  </tbody>
  <?php } ?>
</table>

<script>

</script>
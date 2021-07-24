<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Create New Password </title>
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
</head>

	<body>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<div id="msg">
		<?php
		if(isset($_SESSION["updateMsg"]))
		{
		?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php echo $_SESSION["updateMsg"]; unset($_SESSION["updateMsg"]);?></strong>
			</div>
        <?php
		}
		?>   
		</div>
			<center><h3>Create New Password</h3></center>
			<form method="post" class="form-horizontal">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Password</label>
				<div class="col-sm-6">
				<input type="password" name="password" class="form-control" placeholder="new passowrd" />
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Confirm Password</label>
				<div class="col-sm-6">
				<input type="password" name="confirm_password" class="form-control" placeholder="confirm passowrd" />
				</div>
				</div>
				
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit" id="btn_update" class="btn btn-primary" value="Update">
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
<script>
$(document).ready(function(){
	$(document).on("click", "#btn_update", function(e){	
  $.ajax({
			url: "<?= get_template_directory_uri() ?>/update_password.php",
			method: "post",
			data: {uemail:email}
		});
	});		
});		

</script>			
	</body>
</html>
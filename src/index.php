<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>

<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app</h1>
      <p class="lead">Demo app</p>
    </div>	

	<?php
	if(isset($_SESSION['valid'])) {			
		include("config.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>				
		Welcome <?php echo $_SESSION['name'] ?> !
		<br/><br/>
		<a href='view.php'>View and Add Products</a> | <a href='logout.php'>Logout</a><br/>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>

</div>
</body>
</html>
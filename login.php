<?php 
session_start();
require_once("connection.php");?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	#container{
		width: 300px;
		margin: 0px auto;
		margin-top: 150px;
	}
	.input{
		width: 92%;
		padding: 2%;
	}
	.p
	{
		text-align: center
	}
</style>
<body>
	
	<form method="post">
	<div id="container">
		<h1 align="center">Login Form</h1> <br><br>

		<div class="row">
			<div class="col-sm-12">
				<center>
				<input type="text" class="input" placeholder="Username" name="user_name">
				</center>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-sm-12">
				<center>
				<input type="password" class="input" placeholder="Password" name="password">
				</center>
			</div>
		</div>

		<br>

		<div class="row">

			<div class="col-sm-6">
				<button class="learn-more" type="submit" name="login">LOGIN</button>
			</div>

			<div class="col-sm-6">
				<button style="float: right" class="learn-more"><a href="register.php">SIGNUP</a></button>
			</div>

		</div>

	</div>






		
			 <br><br>

			
			
			
		</form>
	</div>


	<?php
		if (isset($_POST['login'])) {
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];

			$q = 'SELECT * FROM `users` WHERE `user_name` = "'.$user_name.'" AND `password` = "'.$password.'"  ';

			$r = mysqli_query($con, $q);
			if ($r) {
				if (mysqli_num_rows($r) > 0){
					$_SESSION['username'] = $user_name;
					header("location:index.php");
				}else{
					echo '<p class="p">Your username and password do not matched<p>'; 
				}
			}else{
				echo $q; 
			}
		}
	?>

</body>
</html>
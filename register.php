<?php require_once("connection.php");?>
<!DOCTYPE html> 
<style>
	*{
		margin: 0px;
		padding: 0px;
	}
	#container{
		border: 1px solid black;
		width: 300px;
		margin: 0px auto;
	}
	.input{
		width: 92%;
		padding: 2%;
	}
</style>
<body>
	<h1 align="center">Registration Form</h1>
	<div id="container">
		<form method="post">
			<input id="user_name" onkeyup="check_user()" name="user_name" class="input" type="text" placeholder="Username" required>
			<div id="checking"></div>
			<br><br>

			

			<input name="password" class="input" type="password" placeholder="Password" required>
			<br><br>
			<input id="register" type="submit" name="register" value="register">
			<a href="login.php">Login here</a>
		</form>
	</div>
	<?php 
		if (isset($_POST['register'])) {
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
		

		$q = "INSERT INTO `users` (`id`, `user_name`, `password`) VALUES ('', '".$user_name."', '".$password."') ";
		$r = mysqli_query($con, $q);

		if ($r) {
				header("location:login.php");
		}
		else{
			echo $q;
		}
		}
	?>
	<script src="sub_file/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		document.getElementById("register").disabled = true;
		function check_user(){
			var user_name =  document.getElementById("user_name").value;

			$.post("sub_file/user_check.php",
				{
					user: user_name
				},
					function(data, status){

					if(data == '<p style="color:red">User already registered</p>') {

						document.getElementById("register").disabled = true;
					}else{
						document.getElementById("register").disabled = false;
					}

					document.getElementById("checking").innerHTML = data;
						
				}

				);
		
		}
	</script>

</body>
</html>
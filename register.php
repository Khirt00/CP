<?php require_once("connection.php");?>
<!DOCTYPE html> 
<title>ASF Register</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="img/asf.png">
<style>
	*{
		margin: 0px;
		padding: 0px;
	}
	#container{
		width: 300px;
		margin: 0px auto;
	}
	.input{
		width: 92%;
		padding: 2%;
	}
	body{
	background-color: skyblue
}
		ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: cornflowerblue;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: skyblue;
}

.active {
  background-color: darkblue;
}
.main{
	width: 350px;
	height: 390px;
	margin: 0px auto;
	margin-top: 50px;
	background-color: white;
	border: solid cornflowerblue 5px;
}
.c1,.c6{
	height: 200px;
	width: 200px;
	bottom: 0;
	margin-bottom: 20px;
}
.c1{
	left: 0;
	margin-left: 70px;
}
.c6{
	right: 0;
	margin-right: 70px;
}
.c2,.c5{
	height: 150px;
	width: 150px;
	margin-top: 190px;
}
.c2{
	left: 0;
	margin-left: 170px;
}
.c5{
	right: 0;
	margin-right: 170px;
}
.c3,.c4{
	height: 100px;
	width: 100px;
	margin-top: 70px;
}
.c3{
	left: 0;
	margin-left: 230px;
}
.c4{
	right: 0;
	margin-right: 230px;
}
.c7,.c8{
	height: 200px;
	width: 200px;
	top: 0;
	margin-top: 60px;
}
.c7{
	left: 0;
	margin-left: 10px;
}
.c8{
	right: 0;
	margin-right: 10px;
}
.c9,.c10{
	height: 100px;
	width: 100px;
	margin-top: 250px;
}
.c9{
	left: 0;
	margin-left: 30px;
}
.c10{
	right: 0;
	margin-right: 30px;
}
.c1,.c2,.c3,.c4,.c5,.c6,.c7,.c8,.c9,.c10{
	position: absolute;
	border-radius: 50%;
	border: solid cornflowerblue 5px;
}
.left{
	background-image: linear-gradient(to left bottom, white,skyblue,cornflowerblue)
}
.right{
	background-image: linear-gradient(to right bottom, white,skyblue,cornflowerblue)
}
</style>
<body>
	<div class="row">
			<div class="col-sm-12">
				<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>
			</div>
		</div> 

	<div class="c1 left"></div><div class="c2 left"></div>
		<div class="c3 left"></div><div class="c4 right"></div>
		<div class="c5 right"></div><div class="c6 right"></div>
		<div class="c7 left"></div><div class="c8 right"></div>
		<div class="c9 left"></div><div class="c10 right"></div>
	
	<form method="post">
		<div class="main"> <br>
		
			<div id="container">

				<h1 align="center">
		<img src="img/asf.png" height="70px">
	</h1> <br><br>


			<div class="row">
				<div class="col-sm-12">
					<center>
					<i class="fa fa-user" style="color: skyblue"></i>
			<input id="user_name" onkeyup="check_user()" name="user_name" class="input" type="text" placeholder="Username" required>
			
				</div>
			</center>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<i class="fa fa-key" style="color: skyblue"></i>
			<input name="password" class="input" type="password" placeholder="Password" required>
			<br><br>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<button name="register" type="submit" class="learn-more" id="register">
						SIGNUP
					</button>
					
				</div>
				<div class="col-sm-6">
					<button class="learn-more">
					<a class="learn-more"href="login.php">Login</a>
					</button>
				</div>
			</div>

			
		</form>

	</div>
	</div><br><br>
	<center>
		<div id="checking"></div>
	</center>	
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
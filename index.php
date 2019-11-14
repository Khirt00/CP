<?php
	session_start();
	if (isset($_SESSION['username'])) {
		echo 'how are you'. ' '.$_SESSION['username']. '?';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
<?php require_once("sub_file/style.php");?>
	#new-message{
		display: none;
		box-shadow:2px 10px 30px #000000;
		width: 500px;
		position: fixed;
		top: 20%;
		background: white;
		z-index: 2;
		left: 50%;
		transform: translate(-50%, 0);
		border-radius: 2px;
		overflow: auto;
	}
	.m-header, .m-footer{
		background: #233070;
		margin:0px;
		color: white;
	}
	.m-header{
		font-size: 20px;
		text-align: center;
	}
	.m-body{
		padding: 5px;
	}
	.message-input{
		width: 96%;
	}
</style>
<body>

	<div id="new-message">
		<p class="m-header">New Message</p>
		<p class="m-body">
			<form align="center" method="post">
				<input class="message-input" type="text" placeholder="user_name" name="user_name"> <br> <br>
				<textarea class="message-input" placeholder="write your message"></textarea> <br> <br>
				<input type="submit" value="send" name="send">
				<button onclick="document.getElementById('new-message').style.display='none'">Cancel</button>
			</form>
		</p>
		<p class="m-footer">Clicl send to send</p>
	</div>

	<div id="container">
		
		<div id="menu">
			<?php 

			echo $_SESSION['username'];
			echo '<a style="float:right;color:white" href="logout.php">Logout</a>';

			?>
			</div>

			<div id="left-col">
				<?php require_once("sub_file/left-col.php");?>
			</div>
			<div id="right-col">
				<?php require_once("sub_file/right-col.php");?>
			</div>

	</div>
</body>
</html>

<?php
	}else{
		header("location:login.php");
	}
	
?>
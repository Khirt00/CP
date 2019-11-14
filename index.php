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
</style>
<body>

	<?php require_once("sub_file/new-message.php") ?>

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
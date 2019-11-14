<div id="new-message">
		<p class="m-header">New Message</p>
		<p class="m-body">
			<form align="center" method="post">
				<input list="user" onkeyup="check_in_db()" class="message-input" type="text" placeholder="user_name" name="user_name" id="user_name">
				<datalist id="user"></datalist>

				<br><br>
				<textarea name="message" class="message-input" placeholder="write your message"></textarea> <br> <br>
				<input type="submit" value="send" id="send" name="send">
				<button onclick="document.getElementById('new-message').style.display='none'">Cancel</button>
			</form>
		</p>
		<p class="m-footer">Click send to send</p>
	</div>

	<?php 
	require_once("connection.php");
	if (isset($_POST['send'])) {
		$sender_name = $_SESSION['username'];
		$receiver_name = $_POST['user_name'];
		$message = $_POST['message'];
		$date = date("Y-m-d h:i:sa");

		$q = 'INSERT INTO `messages` (`id`, `sender_name`, `receiver_name`, `message_text`, `date_time`)
			VALUES ("", "'.$sender_name.'", "'.$receiver_name.'", "'.$message.'", "'.$date.'")';

		$r = mysqli_query($con, $q);
		if ($r) {
			header("location:index.php?user=".$receiver_name);
		}else{
				echo $q;
		}
	}

	?>

	<script src="sub_file/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">

		document.getElementById("send").disabled = true;

		function check_in_db() {
			var user_name = document.getElementById("user_name").value ;

			$.post("sub_file/check_in_db.php",
			{
				user: user_name
			},
			function(data, status){
				if (data == '<option value="no user">') {
					document.getElementById("send").disabled = true;
				}else{
					document.getElementById("send").disabled = false;
				}
			}

			);

			document.getElementById('user').innerHTML = data;
		}
	</script>
<div id="new-message">
		<p class="m-header">New Message</p>
		<p class="m-body">
			<form align="center" method="post">
				<input list="user" onkeyup="check_in_db()" class="message-input" type="text" placeholder="user_name" name="user_name" id="user_name">
				<datalist id="user"></datalist>

				<br><br>
				<textarea class="message-input" placeholder="write your message"></textarea> <br> <br>
				<input type="submit" value="send" id="send" name="send">
				<button onclick="document.getElementById('new-message').style.display='none'">Cancel</button>
			</form>
		</p>
		<p class="m-footer">Clicl send to send</p>
	</div>

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
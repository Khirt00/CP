<div id="right-col-container">
	<div id="messages-container">

		<?php 
		if (isset($_GET['user'])) {
			$_GET['user'] = $_GET['user'];
		}else{
			$q = 'SELECT `sender_name`, `receiver_name` FROM `messages` WHERE `sender_name`="'.$_SESSION['username'].'" or `receiver_name`= "'.$_SESSION['username'].'" ORDER BY `date_time` DESC LIMIT 1';
			$r = mysqli_query($con, $q);
		if ($r) {
				if (mysqli_num_rows($r) > 0) {
					while($row = mysqli_fetch_assoc($r)){
						$sender_name = $row['sender_name'];
						$receiver_name = $row['receiver_name'];
						if ($_SESSION['username'] == $sender_name) {
							$_GET['user'] = $receiver_name;
						}else{
							$_GET['user'] = $sender_name;
						}
					}
				}else{
					echo 'no message from you';
				}
			}	
		}
		// else{
			// echo $q;
		// }

		$q = 'SELECT * FROM `messages` WHERE `sender_name`="'.$_SESSION['username'].'" AND `receiver_name`="'.$_GET['user'].'" OR `sender_name`= "'.$_GET['user'].'" And `receiver_name`= "'.$_SESSION['username'].'" ';

		$r = mysqli_query ($con, $q);

		if ($r) {
			while ($row = mysqli_fetch_assoc($r)) {
				$sender_name = $row['sender_name'];
				$receiver_name = $row['receiver_name'];
				$message = $row['message_text'];
				if ($sender_name == $_SESSION['username']) {
					?>
						<div class="grey-message">
							<a href="#">Me</a>
							<p><?php echo $message; ?></p>
						</div>
					<?php
				}else{

					?> 

					<div class="white-message">
						<a href="#"><?php echo $sender_name; ?></a>
						<p><?php echo $message; ?></p>
					</div>

					<?php

				}
			}
		}else{
			echo $q;
		}

		?>


	
	</div>
		
	
	<textarea id="message_text" class="textarea" placeholder="Write your message"></textarea>
</div>

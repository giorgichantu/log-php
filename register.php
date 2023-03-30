<?php 
	include "conn.php";
	$email =  $_GET['email'];
	$pass  =  $_GET['password'];
	$new_p = md5($pass);
	var_dump($new_p);
	$check_email = "SELECT * FROM `registered_users`  WHERE email = '$email'";
	$check_res = mysqli_query($conn, $check_email);
	if ($check_res) {
		if (mysqli_num_rows($check_res) > 0) {
			echo  $email . "  უკვე დაკავებულია!!";
		}else{

			$sql = "INSERT INTO `registered_users`  (`email`, `password`) 
					VALUES ('$email', '$new_p')";
			$result  = mysqli_query($conn, $sql);
			if ($result) {
				?>
				<p class="success">
					yes 				
				</p>
				<?php
			}else{
				echo mysqli_error($conn);
				?>
				<p class="error">
				no
				</p>
				<?php
			} 
		}
	}
 ?>
	
	<p class="success">
		<a href="index.php"> go</a>
	</p>

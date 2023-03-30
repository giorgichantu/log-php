<?php 
	session_start();
 ?>
<link rel="stylesheet" href="style.css">
<?php 
	include "conn.php";

	$email =  $_GET['email'];    
	$pass  =  $_GET['password']; 
	$new_password=md5($pass);

	$check_email = "SELECT * FROM `registered_users`  WHERE email = '$email' OR username ='$email'";
	$check_res = mysqli_query($conn, $check_email);
	if ($check_res) {
		if (mysqli_num_rows($check_res)  == 1 ) {
		$check_data = "SELECT * FROM `registered_users`  WHERE (email = '$email' OR username ='$email') AND password = '$new_password'";
		$check_data = mysqli_query($conn, $check_email);
		if ($check_data) {
			if (mysqli_num_rows($check_data) == 1 ){
				$user = mysqli_fetch_assoc($check_data);
				print_r($user);

				$_SESSION['user_name'] = $user['username'];
			}
		}
		}else{
			echo mysqli_error($conn);
		}

	}

?>

	<p class="success">
		<a href="index.php"> მთავარ გვერძე დაბრუნება</a>
	</p>


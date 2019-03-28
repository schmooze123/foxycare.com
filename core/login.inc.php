<?php
	error_reporting(0);
	
	include 'connectdb.php';
	
	ob_start();
	// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 14400);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(14400);

session_start(); // ready to go!
	session_start();
	if(isset($_POST['emailid']) && isset($_POST['password'])){
		$emaild = mysql_real_escape_string(htmlentities($_POST['emailid']));
		$password = mysql_real_escape_string(htmlentities($_POST['password']));
		$password_enc = md5(md5($password));
		if(!empty($emaild) && !empty($password)){
			$query = mysql_query("SELECT `id` FROM `users` WHERE `email`='$emaild' AND `md5pass`='$password_enc'");
			if($query){
				$query_rows = mysql_num_rows($query);
				if($query_rows == 0){
						echo "login_failed";
						exit();
				
				
				}else if(mysql_num_rows($query) == 1){
					 $id = mysql_result($query, 0, 'users_id');
					 	$query_run = mysql_query("SELECT *  FROM `users` WHERE `email`='$emaild' AND `md5pass`='$password_enc'");
					 	$row = mysql_fetch_assoc($query_run);
							$id = $row['id'];
							$username = $row['username'];  
								$firstname = $row['fstnm'];
							 $lastname = $row['lstnm'];
							 $image_thumb = $row['profilepic'];
							 $cover = $row['coverpic'];
							 $msgpass = $row['msgpass'];
							 $pass = $row['md5pass'];
							 $email = $row['email'];
								$_SESSION['id'] = $id;
								
								
								 $ip = $_SERVER['REMOTE_ADDR'];
								$sql = mysql_query("UPDATE  `foxycare`.`users` SET  `ip` =  '$ip',
`login` =  now() WHERE  `users`.`id` ='".$id."'");
								
				}
					
			}
			}else
			
			echo "login_failed";
			exit();
			
	
}
	

	
?>
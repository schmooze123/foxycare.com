<?php
	error_reporting(0);
	
	
	
	ob_start();
	session_start();
	if(isset($_POST['emailid']) && isset($_POST['password'])){
		$emaild = $_POST['emailid'];
		$password = $_POST['password'];
		$password_enc = md5(md5($password));
		if(!empty($emaild) && !empty($password)){
			include 'connectdb.php';
			$query = mysql_query("SELECT `id` FROM `users` WHERE `email`='$emaild' AND `md5pass`='$password_enc'");
			if($query){
				$query_rows = mysql_num_rows($query);
				if($query_rows == 0){
						echo "login_failed";
						exit();
					// $error_login = '<div style="height:auto; width:30%; border:1px solid #F00; float:right; margin-top:20px; background:; box-shadow:rgba(153,153,153,1) 0 0 10px; background:url(images/red.png);"><h3>Please enter correct Email id Or <u>Sign Up</u> For New</h3> 
					//The email you entered does not belong to any account.<br/>

//You can log in using any email address associated with your account. Make sure that it is typed correctly.</div>
					//';
					//header('Location: login?login_attempt=1');
				 
				}else if(mysql_num_rows($query) == 1){
					 $id = mysql_result($query, 0, 'id');
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
								$_SESSION['fstnm'] = $firstname;
								$_SESSION['lstnm'] = $lastname;
								$_SESSION['email'] = $email;
								$_SESSION['md5pass'] = $pass;
								//setcookie("id", $id, strtotime('+30 days'), "/", "", "", TRUE);
								//setcookie("email", $email, strtotime('+30 days'), "/", "", "", TRUE);
								//setcookie("pass", $pass, strtotime('+30 days'), "/", "", "", TRUE);
								 $ip = $_SERVER['REMOTE_ADDR'];
								$sql = mysql_query("UPDATE  `schmooze`.`users` SET  `login_ip` =  '$ip',
`last_login` =  now() WHERE  `users`.`id` ='".$id."'");
								//$_SESSION['profilepic'] = $image_thumb;
								//$_SESSION['coverpic'] = $cover;
								//$_SESSION['msgpass'] = $msgpass;
					//header('Location: ../home');
				}//else
					
			}
			}else
			//header('Location: login.php?login_attempt=1');
			echo "login_failed";
			exit();
			 //$error_login = '<div style="height:auto; width:30%; border:1px solid #F00; float:right; margin-top:20px; background:; box-shadow:rgba(153,153,153,1) 0 0 10px; background:url(images/red.png);">Please Enter emalid/Password</div>';
	
}
	

	
?>
<?php
if(isset($_POST['fstnm']) || isset($_POST['lstnm']) || isset($_POST['email']) & isset($_POST['pass']) & isset($_POST['gender'])){
	 $firstnm = $_POST['fstnm'];
	 $lastnm = $_POST['lstnm'];
	 $email = $_POST['email'];
	 $pass = $_POST['pass'];
	 $gender = $_POST['gender'];
	 
	 $activate = 0;
	 //$username = $firstnm,'.',$lastnm,'.',substr(uniqid(), 10, 15);
	// $username = strtolower($firstnm.".".$lastnm.".".substr(uniqid(), 10, 15));
	 $ip = $_SERVER['REMOTE_ADDR'];
	 $date = date("F j, Y, g:i a");
	
	
			 if(!empty($firstnm)){
				 if(!empty($lastnm)){
			
				if(!empty($email)){
					if(!empty($pass)){
						if((strlen($email) >=10) && (strstr($email, "@")) && (strstr($email, "."))){
							include 'connectdb.php';	
							$query = mysql_query("SELECT * FROM `users` WHERE `email` = '$email'");
							$num_rows = mysql_num_rows($query);
							if($num_rows == 0){
								$pass = $_POST['pass'];
								if(strlen($pass) >= 5){
											$md5pass = md5(md5($pass));
											$activation = rand(time() ,1000);
											
											$insert_query = mysql_query("INSERT INTO `schmooze`.`users` (`id`, `username`, `fstnm`, `lstnm`, `hide_post_array`, `news_subscribe`, `friends_array`, `coursebk_array`, `fav_bk_array`, `talk_array`, `following`, `followed`, `coin`, `mood`, `email`, `pass`, `md5pass`, `favpost_array`, `status`, `activation`, `activate`, `profilepic`, `coverpic`, `login_ip`, `last_login`, `ip`, `date`) VALUES (NULL, '', '$firstnm', '$lastnm','1', '1', '1', '1', '1', '1', '1', '1', '100', '23', '$email', '$pass', '$md5pass', '', '', '$activation', '0', 'images/Man-Brown-icon.png', '', '', '', '$ip', '$date')");
											
//$insert_query = mysql_query("INSERT INTO `schmooze`.`users` (`id`, `username`, `fstnm`, `lstnm`, `dob`, `hide_post_array`, `news_subscribe`, `chat_array`, `recent_chat_array`, `recent_msg_array`, `friends_array`, `fav_photo_array`, `recently_used_shops`, `shopping_cart`, `follow_shop`, `coursebk_array`, `fav_bk_array`, `talk_array`, `following`, `followed`, `coin`, `mood`, `email`, `pass`, `md5pass`, `favpost_array`, `status`, `activation`, `activate`, `profilepic`, `coverpic`, `login_ip`, `last_login`, `ip`, `date`) VALUES (NULL, '', '$firstnm', '$lastnm', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0' '0', '0', '0', '100', '23', '$email', '$pass', '$md5pass', '0', '', '$activation', '0', 'images/Man-Brown-icon.png', '', '', '', '$ip', '$date')");
									
									$uid = mysql_insert_id(); 
									if(!file_exists("../users/$uid")){
										mkdir("../users/$uid", 0755);
									}
									$query_run = mysql_query("SELECT *  FROM `users` WHERE `id`='".$uid."'");
					 					$row = mysql_fetch_assoc($query_run);
										$id = $row['id'];
										$_SESSION['id'] = $id;
										
									$to = "$email";
									$from = "schmooze@schmooze.co.in";
									$subject = 'Schmooze Account Activation';
									
									$message = '<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schmooze Activation Message</title>
</head>

<body style="margin:0px; font-family:Georgia, Times New Roman, Times, serif;">
<div style="padding:10px; background:#000; font-size:24px; color:#FFF;">SCHMOOZE</div>
<div style="padding:24px; font-size:20px;">Hello '.$firstnm.' '.$lastnm.',<br /><br />Activation Code: '.$activation.' <br /><br />  Click the link Below to activate your account when ready:<br /><br /><a href="http://schmooze.co.in/activate.php?uid='.$uid.'">Click Here to activate your account now</a><br /><br />Login after successful activation using your:<br /> <br />E-mail Address: '.$email.'<br /></div> 
</body>
</html>';
								$headers = "From: $from\n";
								$headers .= "MIMI-Version: 1.0\n";
								$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
								
								mail($to, $subject, $message, $headers);
									
									echo $uid;
							
								}else
							echo 		 $error =  'more_strong_pass';
							}else
						echo 	 	 $error ='email_taken';
						}else
						echo 	 $error = 'valid_email';
					}else
					echo 	 $error = 'enter_pass';
				}else
			echo 	 $error = 'enter_email';
			
			
		}else
			echo 	 $error =  'enter_fstnm';
					
		}else
				echo  $error =  'enter_lstnm';
					

		
}


?>
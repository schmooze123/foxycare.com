<?php
if(isset($_POST['fstnm']) || isset($_POST['lstnm']) || isset($_POST['email']) & isset($_POST['pass']) ){
	include 'connectdb.php';
	 $firstnm = mysql_real_escape_string(htmlentities(ucfirst(strtolower($_POST['fstnm']))));
	$lstnm = mysql_real_escape_string(htmlentities(ucfirst(strtolower($_POST['lstnm']))));
	 $email = mysql_real_escape_string(htmlentities($_POST['email']));
	 $pass = mysql_real_escape_string(htmlentities($_POST['pass']));
	
	 
	 $activate = 0;
	 //$username = $firstnm,'.',$lastnm,'.',substr(uniqid(), 10, 15);
	// $username = strtolower($firstnm.".".$lastnm.".".substr(uniqid(), 10, 15));
	 $ip = $_SERVER['REMOTE_ADDR'];
	 $date = date("F j, Y, g:i a");
	
	
			 if(!empty($firstnm)){
				 
			 if(!empty($lstnm)){
				if(!empty($email)){
					if(!empty($pass)){
						if((strlen($email) >=10) && (strstr($email, "@")) && (strstr($email, "."))){
								
							$query = mysql_query("SELECT * FROM `users` WHERE `email` = '$email'");
							$num_rows = mysql_num_rows($query);
							if($num_rows == 0){
								$pass = $_POST['pass'];
								if(strlen($pass) >= 5){
											$md5pass = md5(md5($pass));
											
											
											$insert_query = mysql_query("INSERT INTO `foxycare`.`users` (`id`, `name`, `lastnm`, `email`, `md5pass`, `login`, `ip`) VALUES (NULL, '$firstnm', '$lstnm', '$email', '$md5pass', '$date', '$ip');");
											

									
									$uid = mysql_insert_id(); 
									if(!file_exists("../users/$uid")){
										mkdir("../users/$uid", 0755);
									}
									echo $uid;
									$query_run = mysql_query("SELECT *  FROM `users` WHERE `id`='".$uid."'");
					 					$row = mysql_fetch_assoc($query_run);
										$id = $row['id'];
										$name = $row['name'];
										$lastnm = $row['lastnm'];
										$_SESSION['id'] = $id;
										
									$to = "$email";
									$from = "foxycare00@gmail.com";
									$subject = 'Welcome to FoxyCare.Com Newest and Updated Online Guide for Your Health and Beauty .';
									
									$message = '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to FoxyCare.Com Newest and Updated Online Guide for Your Health and Beauty .</title>
</head>

<body style="margin:0px; font-family:Georgia, Times New Roman, Times, serif;">
<div style="padding:10px;">
<h3 style="color:#333; font-family:Roboto,trebuchet ms,serif !important; font-size:28px;">Welcome to <a href="http://foxycare.com/">FOXYCARE.COM</a></h3>

<p style="line-height:30px;">

<b>Hello</b><br> 
Welcome '.$name.'&nbsp;'.$lastnm.'<br>
You have successfully completed your sign up.<br>
By using user name or email, you can login your account. <br>
By login Account<br>
&nbsp;&nbsp;-	Save Favourite post<br>
&nbsp;&nbsp;-	Create your own QUESTION<br>
&nbsp;&nbsp;-	Reply to any QUESTION (if you interested) <br>
Much more …………………….!<br>
Thanks for being here<br>
<a href="http://foxycare.com/">WWW.FOXYCARE.COM</a><br>
</p>

</div> 
</body>
</html>';
								$headers = "From: $from\n";
								$headers .= "MIMI-Version: 1.0\n";
								$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
								
								mail($to, $subject, $message, $headers);
									
									
									
							
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
			 }
			else
			echo 	 $error =  'enter_lstnm';
					
		
		}else
			echo 	 $error =  'enter_fstnm';
					
		}


?>
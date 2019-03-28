<?php
	error_reporting(0);
 				//session_start();
				
			
			if(isset($_POST['id'])){
				
				include 'core/login.inc.php';
				include 'core/reg.inc.php';
				include 'core/connectdb.php';
				$id = mysql_real_escape_string(htmlentities($_POST['id']));
				$passcode = rand(0, 99999);
				$sql1 = mysql_query("INSERT INTO `foxycare`.`forgotten_pass` (`id`, `uid`, `passcode`) VALUES (NULL, '".$id."', '$passcode')");
					
					$querys = mysql_query("SELECT *  FROM `users` WHERE `id`='".$id."'");
					 					$rowz = mysql_fetch_assoc($querys);
										$id = $rowz['id'];
										
										$fstnm = $rowz['name'];
										$lstnm = $rowz['lastnm'];
										$email = $rowz['email'];
										
										
									$to = "$email";
									$from = "foxycare00@gmail.com";
									$subject = 'Foxycare Password Recovery';
									
									$message = '<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Foxycare Recover Password Message</title>
</head>

<body style="margin:0px; font-family:Georgia, Times New Roman, Times, serif;">
<div style="padding:10px; font-size:24px;">FoxyCare</div>
<div style="padding:24px; font-size:20px;">Hello '.$fstnm.' '.$lstnm.',<br /><br />Recovery Code: '.$passcode.' <br /><br />  </div> 
</body>
</html>';
								$headers = "From: $from\n";
								$headers .= "MIMI-Version: 1.0\n";
								$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
								
								mail($to, $subject, $message, $headers);
				
				
				
				
				echo $id;
				
				
			}

?>
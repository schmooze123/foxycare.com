<?php
	error_reporting(0);
 				//session_start();recoverCode
				
			
			if(isset($_POST['id']) || isset($_POST['recoverpass']) || isset($_POST['repass'])  ){
				
				include 'core/login.inc.php';
				include 'core/reg.inc.php';
				include 'core/connectdb.php';
				$id = mysql_real_escape_string(htmlentities($_POST['id']));
				$recoverpass = mysql_real_escape_string(htmlentities($_POST['recoverpass']));
				$repass = mysql_real_escape_string(htmlentities($_POST['repass']));
				$new_password = md5(md5($repass));
				
				$sql1 = mysql_query("SELECT * FROM `forgotten_pass` WHERE `uid`='".$id."' ORDER BY `id` DESC");
				$rows = mysql_fetch_assoc($sql1);
				$uid = $rows['uid'];
				$code = $rows['passcode'];
				$ids = $rows['id'];
				if($recoverpass == $repass){
					
					$sql2 = mysql_query("UPDATE  `foxycare`.`users` SET   `md5pass`= '".$new_password."' WHERE `id` ='".$uid."';");
			$sql2 = mysql_query("DELETE FROM  `foxycare`.`forgotten_pass`  WHERE `id` ='".$ids."';");
					echo "1";
				}else{
					echo '2';	
				}
				
			}

?>
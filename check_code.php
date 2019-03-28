<?php
	error_reporting(0);
 				//session_start();recoverCode
				
			
			if(isset($_POST['id']) || isset($_POST['recoverCode'])  ){
				include 'core/login.inc.php';
				include 'core/reg.inc.php';
				include 'core/connectdb.php';
				$id = mysql_real_escape_string(htmlentities($_POST['id']));
				$recoverCode = mysql_real_escape_string(htmlentities($_POST['recoverCode']));
				
				$sql1 = mysql_query("SELECT * FROM `forgotten_pass` WHERE `uid`='".$id."' ORDER BY `id` DESC");
				$rows = mysql_fetch_assoc($sql1);
				$uid = $rows['uid'];
				$code = $rows['passcode'];
				
				if($recoverCode == $code){
					echo '1';
				}else{
					echo '';	
				}
				
			}

?>
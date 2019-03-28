<?php
if(isset($_POST['act'])){
							$act = $_POST['act'];
							include("connectdb.php");
						include("login.inc.php");	
							
							$query = mysql_query("SELECT * FROM `users` WHERE `id`='".$_SESSION['id']."'");
							$fetch = mysql_fetch_assoc($query);
							
							$activation  =  $fetch['activation'];
							$activate = $fetch['activate'];
							if($act === $activation){
								$sql1 = mysql_query("UPDATE  `schmooze`.`users` SET  `activate` =  '1' WHERE  `users`.`id` ='".$_SESSION['id']."';");
								echo 'update_desk.php';
							}else{
								echo 'Wrong_key';	
							}
							
							
}
?>
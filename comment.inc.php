<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if(isset($_POST['cat']) ||  isset($_POST['quest'])  ){
		
		
		 $category = mysql_real_escape_string(htmlentities($_POST['cat']));
		 $quest = mysql_real_escape_string(htmlentities($_POST['quest']));
		
		 $date = date("F j, Y, g:i a");
		if(!empty($quest)  ){
			$sql = mysql_query("INSERT INTO `foxycare`.`comment` (`id`, `uid`, `pid`, `comment`, `datetime`) VALUES (NULL, '".$_SESSION['id']."', '".$category."', '".$quest."', '".$date."')");
			$rid = mysql_insert_id();
			
			
			
				$sql1 = mysql_query("SELECT * FROM `comment` WHERE `id`='".$rid."' ");
		$fetchu = mysql_fetch_assoc($sql1);
		$id = $fetchu['id'];
		
		$uid = $fetchu['uid'];
		$ans = $fetchu['comment'];
		
		$datetime = $fetchu['datetime'];
		
		$sql2 = mysql_query('SELECT * FROM `users` WHERE  `id`="'.$uid.'" ');
		$rows = mysql_fetch_assoc($sql2);
		

			echo '<div class="entrys" id="'.$id.'">
						
						
						<div class="cnt">
						<h4 style="font-size:16px; font-family:Roboto,trebuchet ms,serif !important; padding-top:10px;">'.$rows['name'].' '.$rows['lastnm'].'</h4>
							<p style="padding-bottom:0; color:#333; padding-top:0px; font-family:Roboto,trebuchet ms,serif !important; font-size:14px; line-height:30px;"><b>Ans.</b> '.$ans.'</p>
							
							
						</div>
					</div>';
					
		
				
		}else{
			echo 'Something went wrong! ';	
		}
		
		
	}
?>
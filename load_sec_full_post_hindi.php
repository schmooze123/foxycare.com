

<?php
include 'core/connectdb.php';
$last_msg_id=$_GET['last_msg_id'];



	                    
$sql = mysql_query("SELECT * FROM `posts` WHERE id < '$last_msg_id' AND `lang`='2' ORDER BY `id`  DESC LIMIT 5");
		
		while($fetchu = mysql_fetch_assoc($sql)){
		$id = $fetchu['id'];
		$station_id = $fetchu['station_id'];
		$uid = $fetchu['uid'];
		$headline = $fetchu['headline'];
		$category = $fetchu['category'];
		$desc = $fetchu['desc'];
		$datetime = $fetchu['datetime'];
		$words  = array_slice(explode(' ', $desc), 0, 35);
		  
$sql2 = mysql_query("SELECT * FROM `category` WHERE `id` = '".$category."'");
$fetch1 = mysql_fetch_assoc($sql2);
		


		
		$sql2 = mysql_query('SELECT `thumb_img` FROM `fullnews` WHERE  `thumb_img` != "" && `newid`="'.$id.'" ');
		$rows = mysql_fetch_assoc($sql2);
		
$output = implode(' ', $words);
			echo '<div class="entry" id="'.$id.'"  style="clear:both; padding-bottom:0; padding-top:25px;">
						<a href="post.php?post='.$id.'"><div class="date">
						<img src="'.$rows['thumb_img'].'" height="100%" width="100%">
						</div></a>
						
						<div class="cnt">
							<a href="post.php?post='.$id.'"><h4>'.$headline.'</h4></a>
							<p>Category : <b>'.$fetch1['name'].'</b><br>
'.$output.'... </p>
							<a href="post.php?post='.$id.'" class="dot">View More</a>
						</div>
					</div>';
					
					
				
		}
	
?>

	
 

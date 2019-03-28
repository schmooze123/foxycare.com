<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if( isset($_POST['newsid']) ||   isset($_POST['ldesc']) || isset($_POST['embed']) || isset($_POST['title']) ){
		
		
		$newsid = mysql_real_escape_string(htmlentities($_POST['newsid']));
		$long_desc = mysql_real_escape_string(htmlentities($_POST['ldesc']));
		$embed = mysql_real_escape_string(htmlentities($_POST['embed']));
	 	$title = mysql_real_escape_string(htmlentities($_POST['title']));
		
		 $date = date("F j, Y, g:i a");
		if( !empty($newsid)  ){
			
			$sql = mysql_query("INSERT INTO `foxycare`.`fullnews` (`id`, `station_id`, `newid`, `uid`, `title`, `texts`, `image`, `thumb_img`, `video`, `datetime`) VALUES (NULL, '0', '$newsid', '0', '$title', '$long_desc', '', '', '$embed', '$date')");
			$fid  = mysql_insert_id();
			
			
			echo ' <div class="pin" id="'.$fid.'" style="clear:both;">
       <center> 
	
			<input onclick="deletecontent('.$fid.')" type="image" src="css/images/close.png" style="float:right; height:13px; margin-left:5px;  margin-top:5px;" />
			'; 
			if(!empty($title)){
			echo '<h3 align="left" style="line-height:30px;" >'.$title.'</h3>';
			
			}
			
		if(!empty($embed)){
		echo '<center><iframe width="100%" height="400" src="https://www.youtube.com/embed/'.$embed.'" frameborder="0" allowfullscreen></iframe></center>';
		}
		if(!empty($long_desc)){
			echo '
	 <p id="textID'.$fid.'" align="left" style="font-size:16px; color:#333; font-family:Roboto,trebuchet ms,serif !important; line-height:25px; margin-top:0px; padding-top:0; margin-bottom:5px;  ">'.$long_desc.'</p>';}
	 echo '
      </div>';
		
		}else{
			echo 'error_msg';	
		}
		
		
	}
?>
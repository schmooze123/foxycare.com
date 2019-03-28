<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if(isset($_POST['p']) ){
		
		$id = mysql_real_escape_string(htmlentities($_POST['p']));
		$date = date("F j, Y, g:i a");
		
		
		
			$sql = mysql_query("UPDATE  `foxycare`.`posts` SET  `lang` =  '1' WHERE  `posts`.`id` ='".$id."' ");
	echo '<button id="slider" onClick="addtoenglish('.$id.');"  style="height:40px; width:150px; float:left; margin-right:5px; margin-top:5px; background:#ff9031;  border:1px solid #ff9031;  font-family:Roboto,trebuchet ms,serif !important;  color:#FFF;">In English</button>';
		
		
		
	}
?>
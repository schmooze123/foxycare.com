<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if(isset($_POST['p']) ){
		
		$id = mysql_real_escape_string(htmlentities($_POST['p']));
		$date = date("F j, Y, g:i a");
		
		$sql = mysql_query("SELECT * FROM `favourite` WHERE `session_id`='".$_SESSION['id']."' AND `post_id`='".$id."' ");
		if(mysql_num_rows($sql) == 1){
			$sql = mysql_query("DELETE FROM `foxycare`.`favourite` WHERE `session_id`='".$_SESSION['id']."' AND `post_id`='".$id."' ");
	echo ' <button id="addtofav" onClick="FavPost('.$id.');" style="height:40px; width:150px; background:#ff9031; border:1px solid #ff9031; color:#FFF; margin-bottom:10px;  font-family:Roboto,trebuchet ms,serif !important; margin-top:5px;">Add to favourite</button>';
		
		}
		
	}
?>
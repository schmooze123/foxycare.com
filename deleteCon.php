<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if(isset($_POST['x']) ){
		
		$id = mysql_real_escape_string(htmlentities($_POST['x']));
		
			$sql = mysql_query("DELETE FROM `foxycare`.`fullnews` WHERE `fullnews`.`id`='$id'");
	
		
	
		
	}
?>
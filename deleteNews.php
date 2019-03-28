<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if(isset($_POST['p']) ){
		
		$id = mysql_real_escape_string(htmlentities($_POST['p']));
		
			$sql = mysql_query("DELETE FROM `foxycare`.`posts` WHERE `posts`.`id`='$id'");
	echo '1';
		exit();
	
		
	}
?>
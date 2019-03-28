<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if(isset($_POST['ID']) || isset($_POST['text'])){
		
		$id = mysql_real_escape_string(htmlentities($_POST['ID']));
		$text = mysql_real_escape_string(htmlentities($_POST['text']));
			$sql = mysql_query("UPDATE  `foxycare`.`fullnews` SET  `texts` =  '$text' WHERE  `fullnews`.`id` ='$id';");
	echo $text;
		
	
		
	}
?>
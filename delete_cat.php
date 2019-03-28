<?
include('core/connectdb.php');
	include("core/login.inc.php");
	
	if(isset($_POST['x'])){
		$cname = mysql_real_escape_string(htmlentities($_POST['x']));
		if(!empty($cname)){
		$sql = mysql_query("DELETE FROM `foxycare`.`category` WHERE `id` = '".$cname."'");
	}
	}
?>
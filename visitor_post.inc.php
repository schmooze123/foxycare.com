<?
if($_POST["request"] === "countVisitor"){
	include("core/connectdb.php");
	include("core/login.inc.php");
	

	$newsid = mysql_real_escape_string(htmlentities($_POST['newsid']));
	$ip = $_SERVER['REMOTE_ADDR'];
	$sql0 = mysql_query("SELECT * FROM `visitors` WHERE `post_id`= '".$newsid."' AND `ip`='".$ip."'");
	$num_row = mysql_num_rows($sql0);
	if($num_row == 0){
	$sql1 = mysql_query("INSERT INTO `foxycare`.`visitors` (`id`, `post_id`,  `ip`) VALUES (NULL,  '".$newsid."', '".$ip."')");
	}
}
?>
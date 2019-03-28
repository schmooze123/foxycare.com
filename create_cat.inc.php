<?
include('core/connectdb.php');
	include("core/login.inc.php");
	
	if(isset($_POST['cname'])){
		$cname = mysql_real_escape_string(htmlentities($_POST['cname']));
		if(!empty($cname)){
			
		$sql = mysql_query("INSERT INTO `category` (id , name) VALUE (NULL, '".$cname."')");
		$rid = mysql_insert_id();
		echo '<P  class="cat" style="color:#333; font-family:Roboto,trebuchet ms,serif !important; font-size:16px;" id="'.$rid.'">'.$cname, ' <img src="css/images/close.png" onClick="deleteCat('.$rid.')" style="cursor:pointer;" height="10"></p> ';	
	}
	}
?>
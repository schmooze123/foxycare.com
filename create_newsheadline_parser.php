<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if(isset($_POST['name']) ||  isset($_POST['links']) ||  isset($_POST['category']) || isset($_POST['ldesc']) ){
		
		$headline = mysql_real_escape_string(htmlentities($_POST['name']));
		$links = mysql_real_escape_string(htmlentities($_POST['links']));
		$category = mysql_real_escape_string(htmlentities($_POST['category']));
		$desc = mysql_real_escape_string(htmlentities($_POST['ldesc']));
		
		 $date = date("F j, Y, g:i a");
		if(!empty($headline)  ){
			$sql = mysql_query("INSERT INTO `foxycare`.`posts` (`id`, `headline`, `links`, `category`, `desc`, `slider`, `datetime`) VALUES (NULL, '$headline', '$links', '$category', '$desc', '0', '$date')");
			$fid  = mysql_insert_id();
			if(!file_exists("post/$fid")){
										mkdir("post/$fid", 0755);
									}
			echo $fid;
		}else{
			echo 'error_msg';	
		}
		
		
	}
?>
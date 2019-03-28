<?
	include("core/connectdb.php");
	include("core/login.inc.php");
	
	if(isset($_POST['cat']) ||  isset($_POST['quest'])  ){
		
		
		 $category = mysql_real_escape_string(htmlentities($_POST['cat']));
		$quest = mysql_real_escape_string(htmlentities($_POST['quest']));
		
		 $date = date("F j, Y, g:i a");
		if(!empty($quest)  ){
			$sql = mysql_query("INSERT INTO `foxycare`.`question` (`id`, `uid`, `question`, `cat`, `datetime`) VALUES (NULL, '".$_SESSION['id']."', '".$quest."', '".$category."', '$date');");
			$fid  = mysql_insert_id();
			
			$sql1 = mysql_query("INSERT INTO `foxycare`.`follow_ques` (`id`, `uid`, `ques_id`) VALUES (NULL, '".$_SESSION['id']."', '".$fid."')");
			
			echo '<a href="answers.php?ans='.$fid.'">Click here</a> to view your question';
		}else{
			echo 'Something went wrong! ';	
		}
		
		
	}
?>